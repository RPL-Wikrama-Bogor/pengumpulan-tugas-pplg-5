<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\OrdersExport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medicines = Medicine::all();
        $search = $request->input('tanggal');
        if ($search) {
            $orders = Order::whereDate('created_at', $search,)->with('user')->simplePaginate(5);
        } else {
            $orders = Order::with('user')->simplePaginate(5);
        }

        return view('order.admin.index', compact('medicines', 'orders'));
    }

    public function data(Request $request)
    {
        $medicines = Medicine::all();
        $search = $request->input('tanggal');
        if ($search) {
            $orders = Order::whereDate('created_at', $search,)->with('user')->simplePaginate(5);
        } else {
            $orders = Order::with('user')->simplePaginate(5);
        }

        return view('order.kasir.index', compact('medicines', 'orders'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('order.kasir.create',compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required' ,
        ]);
        //menyediakan array untuk menampung data2 dengan format json
        $arr = [];
        //distinct array
        //array_count_values => meghitung jumlah item duplikat dari array
        //struktur => "item_arr" => jumlah_duplikat
        $medicines = array_count_values($request->medicines);

        foreach ($medicines as $idValueSelect=> $countDuplicate) {
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect ,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price'] ,
            ];
            array_push($arr, $formatAssoc);
        };
        $totalbayar = 0;
        foreach ($arr as $itemAssoc) {
            $totalbayar += (int)$itemAssoc['sub_price'];
        };

        $totalbayar += ($totalbayar*0.01);

        $proses = Order::create([
            "user_id" => Auth::user()->id,
            "medicines" => $arr ,
            "total_price" => $totalbayar,
            "name_customer" => $request -> name_customer,
        ]);

        if($proses){
            return redirect()->route('kasir.order.print' , $proses['id']) ;
        } else{
            return redirect()->back()->with('failed' , 'Proses pembelian gagal, silahkan coba lagi!');
        }
    }

    public function print($id)
    {
        $order = Order::find($id);
        return view("order.kasir.print" , compact('order')) ;
    }

    public function downloadPDF($id)
    {
        $order = Order::find($id)->toArray();
        view()->share('order', $order);
        $pdf = PDF::loadView('order.kasir.download-pdf', $order);
        return $pdf->download('receipt.pdf');
    }

    public function exportExcel()
    {
        $file_name = 'data_pembelian'.'.xlsx';  
        return Excel::download(new OrdersExport, $file_name);
    }

    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
