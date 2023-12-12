<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\OrdersExport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resourceu
     */
    public function index(Request $request)
    {
        // Check if 'query' parameter is present in the request
        $query = $request->input('query');
    
        // Use optional() to handle the case when 'query' is not present
        $orders = Order::when($query, function ($query) use ($request) {
                        return $query->orWhereDate('created_at', '=', $request->input('query'));
                    })
                    ->simplePaginate(5);
    
        return view("order.kasir.index", ['orders' => $orders]);
    }

    public function data(Request $request)
    {
        // Check if 'query' parameter is present in the request
        $query = $request->input('query');
    
        // Use optional() to handle the case when 'query' is not present
        $orders = Order::when($query, function ($query) use ($request) {
                        return $query->orWhereDate('created_at', '=', $request->input('query'));
                    })
                    ->simplePaginate(5);
    
        return view("order.admin.index", ['orders' => $orders]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view("order.kasir.create", compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required'
        ]); 
        // sediakan array untuk meyimpan data2 frormat json
        $arr = [];
        // distinc array
        // array_count_value: menghitung jumpah item duplikat dari array
        // struktur requesr yang sudah di hitung duplikasinya
        $medicines = array_count_values($request->medicines);
        // foreach request medicines yang dusah di hitung diplukasinya
        foreach($medicines as $idValueSelect => $countDuplicate) {
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                // qty diambil dari item hasil disticnt array_count_values yang di deklarasikan sebagai $countDuplicate di foreschnya
                "qty" => $countDuplicate,
                // harga dari duplikat item_select 
                "sub_price" => $countDuplicate * $medicine['price'],
            ];
            // masukin ke array kosong
            array_push($arr, $formatAssoc);
        }
        // hitung total bayar
        $totalBayar = 0;
        foreach($arr as $itemAssoc) {
            // menambahkan value dari totel bayat yang lama ditamah dari arrAssoc sbelumnyya bagains sub_price
            // (int) untuk memastikan $itemassoc['subrice'] berbentuk integer
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        // total bayar baru setelah ppn
        $totalBayar += $totalBayar * 0.1;
        // insert dat ake db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            // isi column medicines di db diambil yang sidah berformat jcon/asoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        // redirect setelah proses
        if ($proses){
            // arahkan ke tampilan struk dengan mengirim 
            // data id dari pesanan agar yang ditampilkan pada strik merupakan data pembelian yang baru dilakukan (satu)
            // ngambil name route, kalo redirect doang, ngambil path nya doang
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'Proses pembelian gagal. Silahkan coba lagi!!!');
        }
    }

    public function print($id){
        $order = Order::find($id);
        return view("order.kasir.print", compact('order'));
    }

    public function downloadPDF($id) {
        // ambil dat ayang akan dicetak pdf 
        // kalau datanya akan dikirim ke fil eyang akan dijadikan pdf ahrus diubah menjadi
        $order = Order::find($id)->toArray();
        // var g akan dipanggil di blade file pdf nya
        view()->share('order', $order);
        // panggil/menetapkan view blade yg akan dicetak pdf serta data yang akan digunakan
        $pdf = PDF::loadView('order.kasir.download', $order);
        // download PDF file dengna nama tertentu
        // mengkonfersikan blade view jadi pdf
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function unduhPDF($id) {
        // ambil dat ayang akan dicetak pdf 
        // kalau datanya akan dikirim ke fil eyang akan dijadikan pdf ahrus diubah menjadi
        $order = Order::find($id)->toArray();
        // var g akan dipanggil di blade file pdf nya
        view()->share('order', $order);
        // panggil/menetapkan view blade yg akan dicetak pdf serta data yang akan digunakan
        $pdf = PDF::loadView('order.admin.unduh', $order);
        // download PDF file dengna nama tertentu
        // mengkonfersikan blade view jadi pdf
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function exportExcel ()
    {
        // pas downloas nama file nyha mau apa
        // csv : csv
        $file_name = 'data_pembelian' . '.xlsx';
        // panggil package excel lakuin proses download, 
        // logic exortnya ada di OrderExport dengan nama file yang telah di tentukan di $file_name
        return Excel::download(new OrdersExport, $file_name);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $orders = order::orWhereDate('created_at', '=', $query) // Filter berdasarkan tanggal
    //                     ->get();
    
    //     return view("order.admin.index", ['orders' => $orders]);
    // }

    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
