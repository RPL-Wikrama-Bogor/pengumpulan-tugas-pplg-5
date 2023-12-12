<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\obat;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Constraints\SeeInOrder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class OrderController extends Controller
{

    public function export(){
        // return Excel::download(new OrderExport,'data-'.Carbon::now()->timestamp.'.xlsx');
        $file_name = 'data-'.Carbon::now()->timestamp.'.xlsx';
        return (new OrderExport)->download($file_name);
    }

    public function search(Request $req){
        $date = $req->input('date');
        $nama_pembeli = $req->input('nama_pembeli');

        
        if (!empty($date)) {
            $orders = Order::where('created_at', 'like', '%' . $date . '%' )->get();
        return view("order.admin.index",compact("orders"));
        }else if(!empty($nama_pembeli)){
            $orders = Order::where('name_customer', 'like', '%' . $nama_pembeli . '%' )->get();
            return view("order.admin.index",compact("orders"));
        }else if ( !empty($nama_pembeli) && !empty($date))
        {
            $orders = Order::where('name_customer', 'like', '%' . $nama_pembeli . '%' );
            $orders->where('created_at', 'like', '%' . $date . '%' )->get();

            return view("order.admin.index",compact("orders"));
        }else{

            $orders = Order::all();

            return view("order.kasir.index",[
                "orders" => $orders,
                "error" => "error",
            ]);

        }

    }
    public function search_kasir(Request $req){
        $date = $req->input('date');
        $nama_pembeli = $req->input('nama_pembeli');
        
        if (!empty($date)) {
            $orders = Order::where('created_at', 'like', '%' . $date . '%' )->get();
        return view("order.kasir.index",compact("orders"));
        }else if(!empty($nama_pembeli)){
            $orders = Order::where('name_customer', 'like', '%' . $nama_pembeli . '%' )->get();
            return view("order.kasir.index",compact("orders"));
        }else if ( !empty($nama_pembeli) && !empty($date))
        {
            $orders = Order::where('name_customer', 'like', '%' . $nama_pembeli . '%' );
            $orders->where('created_at', 'like', '%' . $date . '%' )->get();

            return view("order.kasir.index",compact("orders"));
        }else{

            $orders = Order::all();

            return view("order.kasir.index",[
                "orders" => $orders,
                "error" => "error",
            ]);

        }

    }
    public function index()
    {
        $orders = Order::with('user')->simplePaginate(5);

        return view("order.kasir.index",compact("orders"));


    }
    public function data()
    {
        $orders = Order::with('user')->simplePaginate(5);

        return view("order.admin.index",compact("orders"));


    }
    public function dowloadPDF($id)
    {

       $order = Order::find($id)->toArray();


       view()->share('order',$order);

       $pdf = PDF::loadView('order.kasir.download',$order);

       return $pdf->download('Bukti Pembelia.pdf');

    }
    public function dowloadPDFadmin($id)
    {

       $order = Order::find($id)->toArray();


       view()->share('order',$order);

       $pdf = PDF::loadView('order.kasir.download',$order);

       return $pdf->download('Bukti Pembelia.pdf');

    }
    public function print($id)
    {
        $order = Order::find($id);
        return view("order.kasir.print", compact("order"));
    }
    public function create()
    {
        $medicines = obat::all();
        return view("order.kasir.create", ['medicines' => $medicines]);


    }
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);
        // sediakan array untuk menuimpan data dengan format json
        $arr = [];
        // distinct array
        $medicines = array_count_values($request->medicines);
        
        // foreach request medicines yang sudah di hitung duplikasinya
        foreach ($medicines as $idValueSelect => $counntDuplicate) {
            //  eloquent model search bersasarkan id
        //     return $idValueSelect;
        // die();
            $medicine = obat::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicines" => $medicine['nama_obat'],
                "price" => $medicine['harga'],
                // qty diambil dari item hasil distinct array_count_values yang di deklarasikan sebagai $countDuplicate di foreach nya
                "qty" => $counntDuplicate,
                // harga dari duplikat item sselect * harga satuan obat
                "sub_price" => $counntDuplicate * $medicine['harga'],
            ];

            // masukin array kosong
            array_push($arr, $formatAssoc);
        }
        // hitung total bayar
        $totalBayar = 0;
        foreach ($arr as $itemAssoc) {
            //  menambahkan value dari total bayar yang lama di tambah dari arrassoc sebrlumnya bagian sub_price
            // (int) untuk memastikan $itemAssoc ['sub_price'] berbentuk integer
            $totalBayar += (int) $itemAssoc['sub_price'];
        }
        // total bayar baru setelah ppn
        $totalBayar += ($totalBayar * 0.01);
        // insert data ke db
        $proses = Order::create([
            "user_id" => Auth::user()->id,
            // isi column medicines di db diambil yang sudah berformat json/assoc
            "medicines" => $arr,
            "total_price" => $totalBayar,
            "name_customer" => $request->name_customer,
        ]);
        // redirect setelah prises
        if ($proses) {
            // aragjab je tanoukab struck dengan mengirim data id dari pemesanan agar yang di tampilkan pada struck merupakan data pembelian yang baru dilakukan (satu)
            return redirect()->route('kasir.order.print', $proses['id']);
        } else {
            return redirect()->back()->with('failed', 'proses pembelian gagal, silahkan coba lagi');
        }
    }

}


