<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
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
        $medicines = Medicine::all();

        $searchDate = $request->input('search_date');

        if ($searchDate) {
            $orders = Order::whereDate('created_at', $searchDate)->with('user')->simplePaginate(10);
        } else {
            $orders = Order::with('user')->simplePaginate(5);
        }
        // with : mengambil hasil relasi dari PK dan FK nya. valuenya == nama func relasi hasMany/belongsTo yang ada di modelnya

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

    public function data()
    {
        // with : mengambil hasil relasi dari PK dan FK nya. valuenya == nama func relasi hasMany/belongsTo yang ada di modelnya
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::orderBy('name', 'asc')->simplePaginate(5);
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
        //distinc array
        //array_count_values => menghitung jumlah iteim duplikat
        $medicines = array_count_values($request->medicines);

        foreach ($medicines as $idValueSelect => $countDuplicate) {
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                'id' => $idValueSelect,
                'name_medicine' => $medicine['name'],
                "price" => $medicine['price'],

                'qty' => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price']
            ];

            array_push($arr, $formatAssoc);
        };

        // hitung total bayar
        $totalBayar = 0;

        foreach ($arr as $itemAssoc) {
            $totalBayar += (int)$itemAssoc['sub_price'];
        }

        $totalBayar += $totalBayar * 0.01;
        // dd($arr, $totalBayar, $request->name_customer);
        //insert data ke db
        $proses = Order::create([
            'user_id' => Auth::user()->id,
            'medicines' => $arr,
            'total_price' => $totalBayar,
            'name_customer' => $request->name_customer,
        ]);

        if ($proses) {
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'Proses Pembelian gagal!');
        }
    }

    public function print($id)
    {
        $order = Order::find($id);
        return view('order.kasir.print', compact('order'));
    }


    public function downloadPDF($id)
    {
        // ambil data yg akan di tampilkan di pdf
        // kalau data nya akan dikirim ke file yg akan dijadikan pdf harus diubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        //var yg akan dipanggil di blade file pdf nya
        view()->share('order', $order);
        // panggil view blade yg akan dicetak pdf serta data yg akan digunakan
        $pdf = PDF::loadView('order.kasir.download', $order);
        // download pdf file dengan nama tertentu
        return $pdf->download('Bukti-Pembelian.pdf');
    }

    public function exportExcel()
    {
        // pas download nama filenya mau apa
        // csv : .csv

        $file_name = 'data_pembelian' . '.xlsx';
        // panggil package excel lakuin proses download, logic exportnya ada di OrderExport dengan nama file yang telah ditentukan fi $file_name
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
}
