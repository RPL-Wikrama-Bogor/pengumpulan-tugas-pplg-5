<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\PDF;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->simplePaginate(10);
        return view('order.kasir.index', compact('orders'));
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