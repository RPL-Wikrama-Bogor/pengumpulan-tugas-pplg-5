<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\OrdersExport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $orders = order::with('user')->simplePaginate(5);
        return view("order.kasir.index", compact("orders"));
    }
    public function data()
    {
        $orders = order::with('user')->simplePaginate(5);
        return view("order.admin.index", compact("orders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = medicine::all();
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
            //sediakan array untuk penyimpan data dengan format json
            $arr = [];
            //distinct arr
            $medicines = array_count_values($request->medicines);
            // lakukan foreach
            foreach ($medicines as $idValueSelet => $countDuplikate){
                $medicine = medicine::find($idValueSelet);
                $formatAssoc = [
                    "id" => $idValueSelet,
                    "name_medicine" => $medicine['name'],
                    "price" => $medicine['price'],
                    // "created_at" => $medicine['created_at'],
                    "quantity" => $countDuplikate,
                    "sub_price" => $countDuplikate*$medicine['price'],
                ];
                //masukkan ke array assosiatif
                array_push($arr,$formatAssoc);
                };
                $totalBayar = 0;
                foreach ($arr as $itemAssoc) {
                    $totalBayar += (int)$itemAssoc['sub_price'];
                };
                $totalBayar += ($totalBayar*0.1);
                $proses = order::create([
                    "user_id" => Auth::user()->id,
                    "medicines" => $arr,
                    "total_price" => $totalBayar,
                    "name_customer" => $request->name_customer,
                ]);
                if ($proses) {
                    return redirect()->route('kasir.order.print', $proses['id']);
                }else{
                    return redirect()->back()->with("failed","coba kembali");
                }
            
    }
    public function print($id)
    {
        $order = order::find($id);
        return view("order.kasir.print",compact('order'));
    }

    public function downloadPDF($id)
    {
        $order = order::find($id)->toArray();
        view()->share('order',$order);
        $pdf = PDF::loadView('order.kasir.download-pdf', $order);
        return $pdf->download('receipt.pdf');
    }
    public function downloadPDFadmin($id)
    {
        $order = order::find($id)->toArray();
        view()->share('order',$order);
        $pdf = PDF::loadView('order.admin.downloadPDFadmin', $order);
        return $pdf->download('receipt.pdf');
    }




    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $orders = order::where('created_at', 'like', '%' . $searchTerm . '%')->paginate(5);

        return view('order.kasir.index', compact('orders'));
    }

    public function searchadmin(Request $request)
    {
        $searchTerm = $request->input('search');
        $orders = order::where('created_at', 'like', '%' . $searchTerm . '%')->paginate(5);

        return view('order.admin.index')->with(['orders' => $orders]);
    }

    public function exportExcel()
    {
        //pas download nama file nya mau apa
        //bisa mengunakan csv
        $file_name = 'data_pembelian'.'.xlsx';
        //panggil pakege excel lakukan preoses download , logic export nya ada fi OrdersExport
        return Excel::download(new OrdersExport, $file_name);
        
    }


    
    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
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







