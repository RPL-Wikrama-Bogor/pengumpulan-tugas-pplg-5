<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\OrdersExport;
use Excel;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
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

        return view('order.kasir.index', compact('medicines', 'orders'));
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

        return view('order.admin.index', compact('medicines', 'orders'));
    }
    // public function index()
    // {
    //     //with:mengambil hasil relasi dari pk dan fk nya,valuenya == nama func
    //     $orders = Order::with('user')->simplePaginate(5);
    //     return view("order.kasir.index",compact('orders'));
    // }
    // public function data()
    // {
    //     //with:mengambil hasil relasi dari pk dan fk nya,valuenya == nama func
    //     $orders = Order::with('user')->simplePaginate(5);
    //     return view("order.admin.index",compact('orders'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view("order.kasir.create", compact("medicines"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' =>'required',
            'medicines' =>'required',
        ]);

        $arr =[];

        $medicines = array_count_values($request->medicines);

        foreach ($medicines as $idValueSelect => $countDuplicate) {
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine"=> $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $countDuplicate * $medicine['price'],
                "sub_price" => $countDuplicate * $medicine["price"],
            ];
            array_push($arr, $formatAssoc);
    }
    $totalBayar = 0;
    foreach ($arr as $itemAssoc) {
        $totalBayar += $itemAssoc['sub_price'];
    }

    $totalBayar += ($totalBayar*0.01);
    $proses = Order::create([
        "user_id" =>Auth::user()->id,
        "medicines"=> $arr,
        "total_price"=> $totalBayar,
        "name_customer" => $request->name_customer
    ]);

    if ($proses) {
        return redirect()->route('kasir.order.print',$proses['id']);
    } else {
        return redirect()->back()->with ('failed','Proses pembelian gagal.silahkan coba lagi');
    }
    }

    public function print($id)
    {
        $order = Order::find($id);
        return view("order.kasir.print",compact('order'));
    }

    public function downlodPDF($id){
        $order = Order::find($id)->toArray();
        view()->share('order',$order);
        $pdf = PDF::loadView('order.kasir.downlod', $order);
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function exportExcel()
    {
        $file_name = 'data_pembelian'.'.xlsx';
        return Excel::download(new OrdersExport,$file_name);
    }

    public function searchIndex(Request $request)
    {
        $search = $request->search;

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
