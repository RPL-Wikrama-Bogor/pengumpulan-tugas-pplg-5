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
    public function index()
    {
        // with menggambil hasil 
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.kasir.index",compact('orders'));
    }

    public function data()
    {
        // with menggambil hasil relasi dari PK
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.admin.index",compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $medicines = Medicine::all();
        return view("order.kasir.create", compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_customer' => 'required',
            'medicines' => 'required',
        ]);
        //sediakan array untuk menyimpan data denngan format json
        $arr = [];
        //distinct arr
        $medicines = array_count_values($request->medicines);
        //lakukan foreach
        foreach ($medicines as $idValueSelect => $countDuplikate){
            $medicine = medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicines" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $countDuplikate,
                "sub_price" => $countDuplikate*$medicine['price'],
            ];
            //masukan ke array assosiatif
            array_push($arr,$formatAssoc);
        };
        $totalBayar = 0;
        foreach ($arr as $itemAccoc) {
            $totalBayar += (int) $itemAccoc['sub_price'];
        };
        $proses = order::create([
            "user_id" => Auth::user()->id,
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "nama_customer" => $request->nama_customer
        ]);
        if ($proses) {
            return redirect()->route('kasir.order.print', $proses['id']);
        }else{
            return redirect()->back()-with("failed","coba kembali");
        }
    }
    public function print($id)
    {
        $order = order::find($id);
        return view("order.kasir.print",compact('order'));
    }
    public function downloadPDF($id){
        // ambil data yang akan di tampilkan di pdf
        // kalau data nya akan di kirim ke file yang akan di jadikan pdf harus di ubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        // var yang akan di panggil di blade
        view()->share('order',$order);
        //panggil view blade yang akan di cetak pdf serta data yang akan di gunakan 
        $pdf = PDF::loadView('order.kasir.donwload', $order);
        //donwload pdf file nama tertentu
        return $pdf->download('BUKTI pembelian pdf');
    }
    public function exportExcel()
    {
        $file_name = 'data_pembelian'.'.xlsx';
        return Excel::download(new OrdersExport, $file_name);
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
