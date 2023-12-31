<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\OrdersExport;
use PDF;
use Excel;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //with : mengambil hasil relasi dari PK dan FK nya. valuenya == nama 
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.kasir.index" , compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //membuat orderan kasir
        $Medicines = Medicine::all();
        return view("order.kasir.create", compact('Medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //menambahkan orderan

        $request
        ->validate([
            "name_customer" => "required",
            "medicines" => "required",
        ]);
        $arr = [];

        $medicines = array_count_values($request->medicines);

        foreach($medicines as $idValueSelect => $CountDuplicate){
            $medicine = Medicine::find($idValueSelect);
            $FormatAssoc = [
                "id" => $idValueSelect,
                "name_medicines" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $CountDuplicate,
                "sub_price" => $CountDuplicate * $medicine['price'],
            ];
            Array_push($arr, $FormatAssoc);
        }
        $totalbayar = 0;
        foreach($arr as $itemAssoc){
            $totalbayar += (int)$itemAssoc['sub_price'];
        
        }
        $proses = Order::create([
        "user_id" => Auth::user()->id,
        "name_customer" => $request->name_customer,
        "total_price" =>$totalbayar,
        "medicines" => $arr,
        
       
    ]);

    if($proses){
        return redirect()->route("kasir.order.print",$proses['id']);
    }else{
        return redirect()->back()->with('failed','proses pembelian gagal silahkan coba lagi');
    }

    }

    public function print($id){
        $order = Order::find($id);
        return view("order.kasir.print",compact('order'));
    }
    

    /**
     * Display the specified resource.
     */
    public function downloadPDF($id)
    {
        $order = Order::find($id)->toArray();

        view()->share('order',$order);

        $pdf = PDF::loadView('order.kasir.download', $order);
        
        return $pdf->download('Bukti Pembelian.pdf');
        //
    }

    public function data()
    {
        //with : mengambil hasil relasi dari PK dan FK nya. valuenya == nama 
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.admin.index" , compact('orders'));
    }

    public function exportExcel()
    {
        $File_name = 'data_pembelian'.'.xlsx';

        return Excel::download(new OrdersExport, $File_name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}