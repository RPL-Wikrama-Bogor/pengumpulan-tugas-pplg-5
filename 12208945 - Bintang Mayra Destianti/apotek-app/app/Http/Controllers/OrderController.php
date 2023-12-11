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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //with : mengambil hasil relas dari PK dan FK ny. valuenya == nama dunc relasi hasMany/belongsTo yg ad di modelny
                // $orders = Order::with('user')->simplePaginate(5);
                $search = $request->input('search');

                $orders = Order::when($search,function($search) use($request){
                                return $search->orWhereDate('created_at','=',$request->input('search'));
                })
                ->get();
                                // })->simplePaginate(5);
                return view("order.kasir.index",['orders'=>$orders]);
                }
                  

                public function data(Request $request)
                {
                    // Check if 'search' parameter is present in the request
                    $search = $request->input('search');
                
                    // Use optional() to handle the case when 'search' is not present
                    $orders = Order::when($search, function ($search) use ($request) {
                                    return $search->orWhereDate('created_at', '=', $request->input('search'));
                                })
                                ->get();
                                // ->simplePaginate(5);
                
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
        //validasi
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);
        //sediakan array untuk menyimpan data2 dgn format json
        $arr = [];

        //distinct array 
        //array_count_values : menghitung jumlah item duplikat dari arraay
        //strukturnya : "item_arr" => jumlah_duplikat
        $medicines = array_count_values($request->medicines);
        
        //foreach request 
        foreach ($medicines as $idValueSelect => $countDuplicate) {
            //eloquent model search berdasarkan id 
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                //qty diambi dari item hasil distinct array_count_values yg di deklarasikan sebagai $countDuplicate di forechnya
                "qty" => $countDuplicate,
                //harga dari duplikat item select * harga satuan alat
                "sub_price" => $countDuplicate * $medicine['price'],
            ];
            //masukin ke array kosong
            array_push($arr, $formatAssoc);
        }

        //hitung total bayar
        $totalBayar = 0;
        foreach ($arr as $itemAssoc){
            //menambahkan value dari totalBayar yg lama ditambah dari arrAssoc sblmnya bagian sub_price
            //(int) untuk memastikan $itemAssoc['sub_price'] berbentuk integer
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        //total bayar baru setlah ppn 10%
        $totalBayar += ($totalBayar*0.1);

        //insert data ke db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            //isi column medicines di db diambil yg sdh berformat json/assoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        //redirect setelah proses
        if($proses) {
            //arahan ke tampilan struk dgn maengirim data id dari pemesanan agar yg ditampilkan pada struk merupakan data pembelian yg baru dilakukan (satu)
            return redirect()->route('kasir.order.print', $proses['id']);
        }else {
            return redirect()->back()->with('failed', 'Proses pemeblian gagal. Silahkan coba lagi!');
        }
    }

    public function print($id)
    {
        $order = Order::find($id);
        return view("order.kasir.print", compact('order'));
    }

    public function downloadPDF($id) {
        //ambil data yg akan di tampilkan id pdf 
        //klu data ny akan dikirim ke file yg akan dijadikan pdf harus dubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        //var yg akan dipanggil di blade file pdf ny 
        view()->share('order', $order);
        //panggil view blade yg akan dicetak pdf serta data yg akan digunakan
        $pdf = PDF::loadview('order.kasir.download', $order);
        //download PDF file dgn nama tertentu
        return $pdf->download('Bukti Pembelian.pdf');
    }
    
    public function exportExcel()
    {
        //pas download nama file nya mau apa
        //csv : .csv untuk excel support ios
        $file_name = 'data_pembelian'.'.xlsx';
        //panggil package excel lakuin proses download, logic exportnya ada di OrderExport dgn nama file yg telah ditentukan di $file_name
        return Excel::download(new OrdersExport, $file_name);
    }
    

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $orders = Order::search($keyword);

        return view('orders.kasir.index', ['orders' => $orders]);
    }


    /**
     * Display the specified resource.
     */
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