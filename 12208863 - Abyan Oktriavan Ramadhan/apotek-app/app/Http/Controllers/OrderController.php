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
    public function index(Request $request)
    {
        $medicines = Medicine::all();

        $searchDate = $request->input('search_date');
        
        if($searchDate){
            $orders = Order::whereDate('created_at', $searchDate)-> with('user')->simplePaginate(10);
        }else{
            $orders = Order::with('user')->simplePaginate(5);
        }
        return view("order.kasir.index", compact('medicines', 'orders'));
    }

    public function user(){
        return $this->belongsTo('User::class');
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function data(Request $request)
    {
        $medicines = Medicine::all();

        $searchDate = $request->input('search_date');
        
        if($searchDate){
            $orders = Order::whereDate('created_at', $searchDate)-> with('user')->simplePaginate(10);
        }else{
            $orders = Order::with('user')->simplePaginate(5);
        }
    
        return view("order.admin.index", compact('medicines', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view("order.kasir.create", compact('medicines'));
    }

    public function print($id){
        $order = Order::find($id);
        return view("order.kasir.print", compact('order'));
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
        // sediakan array untuk menuimpan data dengan format json
        $arr = [];
        // distinct array
        $medicines= array_count_values($request->medicines);
        // foreach request medicines yang sudah di hitung duplikasinya
        foreach ($medicines as $idValueSelect => $counntDuplicate){
            //  eloquent model search bersasarkan id
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicines" => $medicine['name'],
                "price" => $medicine['price'],
                // qty diambil dari item hasil distinct array_count_values yang di deklarasikan sebagai $countDuplicate di foreach nya
                "qty" => $counntDuplicate,
                // harga dari duplikat item sselect * harga satuan obat
                "sub_price" => $counntDuplicate * $medicine['price'],
            ];

            // masukin array kosong
            array_push($arr, $formatAssoc);
        }
        // hitung total bayar
        $totalBayar = 0;
        foreach($arr as $itemAssoc){
            //  menambahkan value dari total bayar yang lama di tambah dari arrassoc sebrlumnya bagian sub_price
            // (int) untuk memastikan $itemAssoc ['sub_price'] berbentuk integer
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        // total bayar baru setelah ppn
        $totalBayar += ($totalBayar * 0.01);
        // insert data ke db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            // isi column medicines di db diambil yang sudah berformat json/assoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        // redirect setelah prises
        if ($proses) {
            // aragjab je tanoukab struck dengan mengirim data id dari pemesanan agar yang di tampilkan pada struck merupakan data pembelian yang baru dilakukan (satu)
            return redirect()->route('kasir.order.print', $proses['id']);
        } else{
            return redirect()->back()->with('failed', 'proses pembelian gagal, silahkan coba lagi');
        }
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

    public function downloadPDF($id){
        // ambil data yang akan di tampilkan di pdf kalau datanya akan dikirim ke file yang akan di jadikan pdf harus di unah menjadi bentuk array
        $order = Order::find($id)->toArray();
        // var yang akan di pangiil di blade file pdf nya
        view()->share('order', $order);
        // panggil view blade yang akan di cetak pdf serta data yang akan digunakan
        $pdf = PDF::loadView('order.kasir.download', $order);
        // download pdf file dengan nama tertentu
        return $pdf->download('bukti pembelian.PDF');
    }

    public function exportExcel(){
        // pas download nama filenya mau apa
        // csv : .csv
        $file_name = 'data_pengembalian'.'.xlsx';
        // panggil package excel lakuin proses download, logic export nya ada di OrdersExport dengan nama file yang telah di tentukan di $file_name
        return Excel::download(new OrderExport, $file_name);
    }
}
