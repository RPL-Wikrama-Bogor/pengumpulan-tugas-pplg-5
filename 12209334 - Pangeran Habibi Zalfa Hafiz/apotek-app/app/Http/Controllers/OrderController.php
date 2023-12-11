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
    public function index()
    {
        //with: mengambil hasil relasi dari PF FKnya. valuenya==nama func relasi hasMany/belongsTo yang ada di model
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.kasir.index", compact('orders'));
    }

    public function data()
    {
        //with: mengambil hasil relasi dari PF FKnya. valuenya==nama func relasi hasMany/belongsTo yang ada di model
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.admin.index", compact('orders'));
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
        //sediakan array untuk menyimapan data data dengan format json
        $arr = [];
        //distinct array
        //array_count_values: menghitung jumlah item dupliakat dari array
        //
        $medicines = array_count_values($request->medicines);
        
        //
        foreach ($medicines as $idValueSelect => $countDuplicate) {
            //eloquent model search berdasarkan id
            $medicines = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicines['name'],
                "price" => $medicines['price'],
                //qty diambil dari item hasil distinct arrau_counte_values yang di deklarasikan senbagai $countDupicate di foreach nya
                "qty" => $countDuplicate,
                //harga dari duplikat item select. harga satuan obat
                "sub_price" => $countDuplicate * $medicines['price'],
            ];
            //masukin ke array kosong
            array_push($arr, $formatAssoc);
        }
        //hitung total bayar
        $totalBayar = 0;
        foreach ($arr as $itemAssoc){
            //menambahkan value dari totalBayar yanh lama di tambah dari arrAssoc sebelumnya
            //
            $totalBayar += (int)$itemAssoc['sub_price'];
        }
        //insert data ke db
        $proses =  Order::create([
            "user_id" => Auth::user()->id,
            //isi column medicines di db di ambil yang sudan berformat json/assoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer"=> $request->name_customer,
        ]);
        //redirect setelah proses
        if ($proses) {
            //arahkan ke tampilan struk dengan mengirimkan data id dari pemesanan agar yang di tampilkan pada struk merupakan data pembelian yang baru dilakukan
           return redirect()->route('cashier.order.print', $proses['id']);
        }else{
            return redirecr()->back()->with('failed', 'Proses pembelian gagal. silahkan cobalagi');
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
        //kalau data nya yang akan dikirin ke file yang akan di jadikan pdf harus di ubah menjadi bentuk array
        $order= Order::find($id)->toArray();
        //var yang akan di panggil di blade file pdfnya
        view()->share('order', $order);
        //panggil view blade yang akan di cetak pdf serta data yang akan di gunakan
        $pdf = PDF::loadView('order.kasir.download', $order);
        //download pdf file dengan nama tertentu    
        return $pdf->download('Bukti pembelian.pdf');
    }

    public function exportExcel()
    {
        //pas download nama filenya mau apa
        //csv: .csv
        $file_name = 'data_pembelian'.'.xlsx';
        // panggil package excel lakuin proses download, logic export nya ada di-
        return Excel::download(new OrdersExport, $file_name);
    }

    // app/Http/Controllers/Cashier/OrderController.php

public function search(Request $request)
{
    $searchDate = $request->input('search_date');

    $orders = Order::whereDate('created_at', $searchDate)
                   ->orderBy('created_at', 'desc')
                   ->paginate(10);

    return view('order.kasir.index', compact('orders'));
}

public function search2(Request $request)
{
    $searchDate = $request->input('search_date');

    $orders = Order::whereDate('created_at', $searchDate)
                   ->orderBy('created_at', 'desc')
                   ->paginate(10);

    return view('order.admin.index', compact('orders'));
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
