<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Http\Request;
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
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.kasir.index", compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view('order.kasir.create', compact('medicines'));
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

        $arr = [];
        $medicines = array_count_values($request->medicines);

        foreach($medicines as $idValueSelect => $countDuplicate) {
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price']
            ];

            array_push($arr, $formatAssoc);
        }

        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            $totalBayar += (int)$itemAssoc['sub_price'];
        }

        $totalBayar += ($totalBayar*0.1);

        $proses = Order::create([
            "user_id" => Auth::user()->id,
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer
        ]);

        if($proses) {
            return redirect()->route('kasir.order.print', $proses['id']);
        }else {
            return redirect()->back()->with('failed', 'Silahkan coba lagi!');
        }
    }

    public function print($id) {
        $order = Order::find($id);
        return view ("order.kasir.print", compact('order'));
    }

    public function downloadPDF($id) {
        $order = Order::find($id)->toArray();
        view()->share('order', $order);
        $pdf = PDF::loadView('order.kasir.download', $order);
        return $pdf->download('Bukti Pemgbelian.pdf');
    }

    public function data () {
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }

    public function exportExcel() {
        // pas dowload nama filenya mau apa
        // csv : .csv
        $file_name = 'data_pembelian'.'.xlsx';
        // panggil package excel lakukan proses download, logic exportnya ada di OrderExport dengan nama file yang teah di tentukan di $file_name
        return Excel::download(new OrderExport, $file_name);
    }

    public function search(Request $request) {
        $searchdata = $request->input('search');
        $orders = Order::where('created_at', 'like', '%' . $searchdata . '%')->paginate(5);
        return view('order.kasir.index')->with(['orders' => $orders]);
    }

    public function searchAdmin(Request $request) {
        $searchdata = $request->input('search');
        $orders = Order::where('created_at', 'like', '%' . $searchdata . '%')->paginate(5);
        return view('order.admin.index')->with(['orders' => $orders]);
    }

    public function downloadPDFAdmin($id) {
        $order = Order::find($id)->toArray();
        view()->share('order', $order);
        $pdf = PDF::loadView('order.admin.download', $order);
        return $pdf->download('Bukti Pemgbelian.pdf');
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
