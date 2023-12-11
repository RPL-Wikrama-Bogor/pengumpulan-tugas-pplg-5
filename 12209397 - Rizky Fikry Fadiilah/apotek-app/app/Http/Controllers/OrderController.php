<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\PDF;
use PDF;
use Excel;
use App\Exports\OrdersExport;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $medicines = Medicine::all();

    //     $searchDate = $request->input('search_date');

    //     $orders = Order::when($searchDate, function ($query) use ($searchDate) {
    //         return $query->whereDate('created_at', $searchDate);
    //     })->get();

    //     return view('order.kasir.index', compact('medicines', 'orders'));
    // }    

    public function data(Request $request)
    {
        $orders = Order::with('user')->simplePaginate(10);
        $searchDate = $request->input('search_date');
        // If a search date is provided, filter orders by that date
        if ($searchDate) {
            $orders = Order::whereDate('created_at', $searchDate)->with('user')->simplePaginate(10);
        } else {
            // If no search date, get all orders with pagination
            $orders = Order::with('user')->simplePaginate(5);
        }
        return view('order.admin.index', compact('orders'));
    }

    public function index(Request $request)
    {
        $medicines = Medicine::all();
        // Get the search date from the request
        $searchDate = $request->input('search_date');
        // If a search date is provided, filter orders by that date
        if ($searchDate) {
            $orders = Order::whereDate('created_at', $searchDate)->with('user')->simplePaginate(10);
        } else {
            // If no search date, get all orders with pagination
            $orders = Order::with('user')->simplePaginate(5);
        }

        // Pass medicines and orders to the view
        return view('order.kasir.index', compact('medicines', 'orders'));
    }


    public function user()
    {
        return $this->belongsTo('User::class');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
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
        // validasi
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);

        $arr = [];
        // distinct
        $medicines = array_count_values($request->medicines);

        foreach ($medicines as $idValueSelect => $countDuplicate) {
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price'],
            ];

            array_push($arr, $formatAssoc);
        }
        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        $totalBayar += ($totalBayar * 0.01);
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            "medicine" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        if ($proses) {
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'Proses pembelian gagal.');
        }
    }

    public function print($id)
    {
        $order = Order::find($id);
        return view('order.kasir.print', compact('order'));
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
        $file_name = 'data_pembelian' . '.xlsx';
        return Excel::download(new OrdersExport, $file_name);
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
    // public function search(Request $request){
    //     $date = $request->input('filter');
    //     if ($date) {
    //         $orders = Order::whereDate('created_at', $date)->with('user')->simplePaginate(10);
    //     } else {
    //         // If no search date, get all orders with pagination
    //         $orders = Order::with('user')->simplePaginate(5);
    //     }
    // }
}
