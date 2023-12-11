<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
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
        // Arahkan
        // with : mengambil hasil relasi dari PK dan FK nya. Valuenya == nama func relasi 
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));

    }


    public function create()
    {
        $medicines = Medicine::all();
        return view('order.kasir.create', compact('medicines'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);
        
        // sediakan array untuk menyimpan data data ddengan format json
        $arr = [];
        // distinct
        // array_count_values : Menghitung jumlah
        $medicines = array_count_values($request->medicines);
        // for each request  medicines yang sudah di hitung duplicatenya
        foreach ($medicines as $idValueSelect => $countDuplicate) {
            $medicines = Medicine::find($idValueSelect);
            $formatAssoc = [
                'id' => $idValueSelect,
                'name_medicines' => $medicines['name'],
                "price" => $medicines['price'],
                // qty diambil dari item hasil disticnt  array_count_values yang di decklaration sebagai $countDuplicate
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicines["price"]
            ];
            array_push($arr, $formatAssoc);
        }
        // Hitung total bayar
        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            // menambahkan value dari total bayar yang lama ditambkan dari arrassoc bagian sub_price
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        $totalBayar = $totalBayar + ($totalBayar * 0.1);
        // Insert data ke DB
        $proses = Order::create([
            'user_id' => Auth::user()->id,
            'medicines' => $arr,
            'total_price' => $totalBayar,
            'name_customer' => $request->name_customer,
        ]);
        if ($proses) {
            // arah ke tampilan struk dengan mengiri data id  dari pesanan agar yang ditampilkan pada struk merupakan data pemebliaun yang baru dilakukan(satu)
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'proses pembelian gagal. Silahkan coba Lagi !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function print($id)
    {
        $order = Order::find($id);
        return view('order.kasir.print', compact('order'));
    }


    // PDF Kasir
    public function downloadPDF($id){
        // ambil data yanf akan ditampilkan di pdf
        // kalau datanya akan dikirim ke file yang akan dijadikan pdf harus diubah menjadi bentuk array
        $order = Order::find($id)->toArray();
        // var yang akan dipanggil di blade 
        view()->share('order', $order);
        // panggil view blade yang akan dicetak pdf serta data yang akan digunakan
        $pdf = PDF::loadView('order.kasir.download', $order);
        // download pdf file dengan nama tertentu
        return $pdf->download('Bukti-Pembelian.pdf');
    }
    

    // Dashboard Admin
    public function data()
    {
        // Arahkan
        // with : mengambil hasil relasi dari PK dan FK nya. Valuenya == nama func relasi 
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));

    }
    // EXCEL ADMIN
    public function exportExcel()
    {
        $file_name = 'data_pembelian'.'.xlsx';
        return Excel::download(new OrderExport, $file_name);
    }
    // INI Bagian Search
    public function searchAdmin(Request $request){
        $searchData = $request->input('search');
        $orders = Order::where('created_at', 'like', '%'. $searchData . '%')->paginate(5);
        return view('order.admin.index')->with(['orders' => $orders]);
    }
    public function searchKasir(Request $request){
        $searchData = $request->input('search');
        $orders = Order::where('created_at', 'like', '%'. $searchData . '%')->paginate(5);
        return view('order.kasir.index')->with(['orders' => $orders]);
    }
}
