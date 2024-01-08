<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
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

     //ini buat kasir
    public function index(Request $request)
    {
        $orders = Order::with('user');
        $query = $request->input('query');

        $orders = Order::when($query, function ($query) use ($request) {
            return $query->orWhereDate('created_at', '=', $request->input('query'));
        })
        ->get();
        // ->simplePaginate(5);

        //with : mengambil hasil relasi dari PK dan Fk nya. valuenya == nama func relasi has Many/belongsTo yg ada dimodelnya
        return view("order.kasir.index", compact("orders"));
    }

    //ini buat admin
    public function data(Request $request)
    {
        $orders = Order::with('user');
        $query = $request->input('query');

        $orders = Order::when($query, function ($query) use ($request) {
            return $query->orWhereDate('created_at', '=', $request->input('query'));
        })
        ->get();
        // ->simplePaginate(5);
    
        //with : mengambil hasil relasi dari PK dan Fk nya. valuenya == nama func relasi has Many/belongsTo yg ada dimodelnya
        return view("order.admin.index", compact("orders"));
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
        //sediakan array untuk menyimpan data-data dgn format json
        $arr = [];
        //distinct array
        $medicines = array_count_values($request->medicines);
        //foreach request medicines yg sudah dihtung duplikasinya
        foreach($medicines as $idValueSelect => $countDuplicate) {
            //elequent model search berdasarkan id
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                //qty diambil dari item hasi distrinct array_count_values yg dideklarasikan sebagai 
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price'],
            ];
            array_push($arr, $formatAssoc);
        }
        //hitung total bayar
        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            $totalBayar += (int)$itemAssoc['sub_price'];
            //int -> untuk merubah tipe data menjadi integer
            // += menambahkan bukan mengganti
        }
        $totalBayar +=($totalBayar*0.1);

        //insert data ke db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            //isi column medicine di diambil yg sudah berformat json/assoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        //redirect stelah proses
        if($proses) {
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'Proses Pembelian Gagal. Sialakn Coba Lagi !');
        }
    }

    public function print($id) {
        $order = Order::find($id);
        return view("order.kasir.print", compact('order'));
    }

    public function downloadPDF($id) {
        $order = Order::find($id)->toArray();
        view()->share('order', $order);
        $pdf = PDF::loadView('order.kasir.download-pdf', $order);
        //load view -> return view
        // load view menetapkan halaman cetak pdf
        return $pdf->download('Bukti Pembelian.pdf');
        // download -> konversi ke pdf
    }
    public function unduhPDF($id) {
        $order = Order::find($id)->toArray();
        view()->share('order', $order);
        $unduh = PDF::loadView('order.admin.unduh-pdf', $order);
        //load view -> return view
        // load view menetapkan halaman cetak pdf
        return $unduh->download('Bukti Pembelian.pdf');
        // download -> konversi ke pdf
    }

    public function exportExcel ()
    {
        //pas download nam file nya mau apa?
        // csv : .csv (buat ios)
        $file_name = 'data_pembelian' . '.xlsx';
        // pamggil package excel lakuin proses download, logic exportnya ada di OrdersExport dgn nama file yg telah ditentukan di $file_name
        return Excel::download(new OrdersExport, $file_name);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $orders = Order::whereDate('created_at', '=', $query)
    //                     ->get();

    //     return view("order.kasir.index", compact("orders"));
    // }



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