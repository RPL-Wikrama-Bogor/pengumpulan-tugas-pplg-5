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
        // with berfungsi untuk mengambil hasil relasi dari PK dan FKnya. Valuenya == nama func hasMany/belongsTo yg ada di model
        // $orders = Order::with('user')->simplePaginate(5);
        // return view("order.kasir.index", compact('orders'));

        $query = $request->input('query');

        $orders = Order::when($query, function($query) use($request) {
            return $query->orWhereDate('created_at', '=', $request->input('query'));
        })->simplePaginate(5);
        return view("order.kasir.index", ['orders' => $orders]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
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
        //sediakan array untuk menyimpan data data dengan format json
        $arr = [];
        //distinct array
        //array_count_values => menghitung jumlah item duplikat dari array
        $medicines = array_count_values($request->medicines);
        foreach ($medicines as $idValueSelect => $countDuplicate) {
            //eloquent model search berdasarkan id
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                // qyt diambil dr item hasil distinct array_count_values yg di deklarasikan sebagai $countDuplicate di foreach nya
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price'],

            ];
            //memasukan data kedalah variable array
            array_push($arr, $formatAssoc);
        }

        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        // total bayar setelah ppn
        $totalBayar += ($totalBayar * 0.1);
        //insert data ke db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request ->name_customer,
        ]);
        if ($proses) {
            return redirect()->route('kasir.order.print', $proses["id"]);
        } else {
            return redirect()->back()->with('failed', 'Proses pembelian gagal, silahkan coba lagi');
        }
    }

    public function print($id) 
    {
        $order = Order::find($id);
        return view("order.kasir.print", compact('order'));
    }

    public function downloadPDF($id)
    {
        //ambil data yang akan di tampilkan di pdf
        //kalau datanya akan dikirim ke file yang akan dijadikan pdf harus diubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        //var yg akan dipanggil di blade file pdfnya
        view()->share('order',$order);
        //panggil view blade yang akan di cetak pdfnya serta data yang akan digunakan (menetapkan file blade mana yang akan di download)
        $pdf = PDF::loadview('order.kasir.download', $order);
        //download pdf file dengan nama tertentu (mengubah file blade menjadi pdf lalu mendowloadnya)
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function simpanPDF($id)
    {
        //ambil data yang akan di tampilkan di pdf
        //kalau datanya akan dikirim ke file yang akan dijadikan pdf harus diubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        //var yg akan dipanggil di blade file pdfnya
        view()->share('order',$order);
        //panggil view blade yang akan di cetak pdfnya serta data yang akan digunakan (menetapkan file blade mana yang akan di download)
        $pdf = PDF::loadview('order.admin.simpan', $order);
        //download pdf file dengan nama tertentu (mengubah file blade menjadi pdf lalu mendowloadnya)
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function data(Request $request)
    {
        // with berfungsi untuk mengambil hasil relasi dari PK dan FKnya. Valuenya == nama func hasMany/belongsTo yg ada di model
        $query = $request->input('query');

        $orders = Order::when($query, function($query) use($request) {
            return $query->orWhereDate('created_at', '=', $request->input('query'));
        })->simplePaginate(5);
        // ->get();
        return view("order.admin.index", ['orders' => $orders]);
    }

    public function exportExcel()
    {
        // pas download nama file nya mau apa
        // csv : .csv
        $file_name = 'data_pembelian'.'.xlsx';
        // panggil package excel lakuin proses download, logic export nya ada di OrderExports dengan nama file yang telah ditentukan di $file_name
        return Excel::download(new OrdersExport, $file_name);
    }

    public function cari(Request $request)
    {
        //menangkap data pencarian
        $cari = $request->search;
        $orders = Order::where('created_at', 'like', "%" . $cari . "%");
        return view('order.kasir.index', compact('orders'));
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
