<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\OrderExport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('order.kasir.index');
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.kasir.index", compact('orders'));
    }

    public function data()
    {
        // return view('order.kasir.index');
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.admin.index", compact('orders'));
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
            'medicines' => 'required',
        ]);
        //sediakan array untuk menyimpan data data denga format json
        $arr = [];
        //distinct array
        //array_count_values : menghitung jumlah item duplikat dari array
        //sturkture:
        $medicines = array_count_values($request->medicines);
        //foreach request medicines yang sudah di hitung duplikatnya                                
        foreach ($medicines as $idValueSelect => $countDuplicate) {
            $medicine = medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                //qty diambil dari item hasil distict array_count_values yang di deklarasikan sebagai $countDuplicate di forachnya
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine["price"],
            ];
            //masukin ke array kosong
            array_push($arr, $formatAssoc);
        }
        //hitung total bayar
        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            //menambahkan balue dari totalBayar yang lama ditambahkan dari arrAssoc sblmnya bagian sub_price
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        //total bayar baru setelah ppn 10%
        $totalBayar += ($totalBayar * 0.1);
        //insert data ke db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            //isi colum medicines di db diambil yang sudah berformat json/assoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        //redirect setelah proses
        if ($proses) {
            //arahkan ke tampilan struk dengan mengirim data id dari pesanan agar yang ditampilkan pada struk merupakan data pembelian yang baru dilakukan(satu)
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'proses pembelian gagal. Silahkan coba lagi!!');
        }
    }

    public function print($id)
    {
        $order = Order::find($id);
        return view("order.kasir.print", compact('order'));
    }

    public function downloadPDF($id)
    {
        //ambil  data yang akan di tampilkan di pdf 
        //kalau datanya akan dikirim ke file yang dijadikan pdf harus diubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        //var yang akan dipanggil di blade file pdfna
        view()->share('order', $order);
        //pnaggil view blade yang akan dicetak pdf serta data yang akan digunakan
        $pdf = PDF::loadView('order.kasir.download', $order);
        //download PDF file dengan nama tertentu
        return $pdf->download('Bukti Pembelian.pdf');
    }

    // public function downloadPDFAdmin($id)
    // {
    //     //ambil  data yang akan di tampilkan di pdf 
    //     //kalau datanya akan dikirim ke file yang dijadikan pdf harus diubah menjadi bentuk array
    //     $order = Order::find($id)->toArray();
    //     //var yang akan dipanggil di blade file pdfna
    //     view()->share('order', $order);
    //     //pnaggil view blade yang akan dicetak pdf serta data yang akan digunakan
    //     $pdf = PDF::loadView('order.kasir.download', $order);
    //     //download PDF file dengan nama tertentu
    //     return $pdf->download('Bukti Pembelian.pdf');
    // }

    public function exportExcel()
    {
        //Pas download nama filenya mau apa 
        //CSV : .CSV
        $file_name = 'data_pembelian'.'.xlsx';
        //Panggil package excel lakuin proses download, logic exportnya ada di orderExport dengan nama file yang telah ditentukan di $file_name
        return Excel::download(new OrderExport, $file_name);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        // Gunakan metode whereDate untuk mencocokkan hanya tanggal pada kolom created_at
        $orders = Order::where('created_at', 'like', '%' . $search . '%')->paginate(10);
        return view('order.kasir.index', compact('orders'));
    }

    public function searchadmin(Request $request)
    {
        $search = $request->input('search');
        // Gunakan metode whereDate untuk mencocokkan hanya tanggal pada kolom created_at
        $orders = Order::where('created_at', 'like', '%' . $search . '%')->paginate(10);
        return view('order.admin.index', compact('orders'));
    }
    
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
