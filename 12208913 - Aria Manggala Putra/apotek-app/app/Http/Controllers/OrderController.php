<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
use Excel;
use App\Exports\OrdersExport;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.kasir.index", compact('orders'));
    }
    public function data()
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view("order.admin.index", compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view("order.kasir.create", compact('medicines'));
    }
    public function searchOrders(Request $request)
{
    $searchDate = $request->input('searchDate');

    $orders = Order::whereDate('created_at', $searchDate)->get();

    return view('kasir.orders.index', compact('orders'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $request->validate([
            'nama_customer' => 'required',
            'medicines' => 'required',
        ]);

        $arr = [];
        //distinct array
        //array_count_values menghitung jumlah item duplikat dari array
        $medicines = array_count_values($request->medicines);
        //foreach request medicine yang sudah di hitung duplikasinya
        foreach ($medicines as $idValueSelect => $countDuplicate) {
            //elqount model search berdasarkan id
            $medicine = Medicine::find($idValueSelect);
            $formatAssoc = [
                "id" => $idValueSelect,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                //qty diambil dari item hasil distinct array_count_values yang di deklarasikan di foreach nya
                "qty" => $countDuplicate,
                "sub_price" => $countDuplicate * $medicine['price'],

            ];
            array_push($arr, $formatAssoc);
                };
            //hitung total bayar
            $totalBayar = 0;
            foreach ($arr as $itemAssoc) {
                $totalBayar += (int)$itemAssoc
                ['sub_price'];
            }
            //total bayar baru setelah ditambahkan ppn 10% 
            $totalBayarPPN = $totalBayar;
            $totalBayar += ($totalBayar*0.1);
            //insert data ke databse
            $proses = Order::create([
                "user_id" => Auth::user()->id,
                "medicanes" => $arr,
                "total_price" => $totalBayar,
                "total_price_ppn" => $totalBayarPPN,
                "nama_customer" => $request->nama_customer,

            ]);
            //redirect setelah proses
            if ($proses){
                // arahkan ke tampilan struk dengan mengirim data id dari pemesanan agar yang ditampilkan pada struk merupakan data pembelian yang baru dilakukan
                return redirect()->route('kasir.order.print', $proses['id']);
            }else {
                return redirect()->back()->with('failed', 'Proses pembelian gagal silahkan coba lagi');
            }
        }

        public function print($id)
        {
            $order = Order::find($id);
            return view("order.kasir.print", compact('order'));
        }

        public function downloadPDF($id)
        {
            $order = Order::find($id)->toArray();
            view()->share('order', $order);
            $pdf = PDF::loadView('order.kasir.download', $order);
            return $pdf->download('Bukti Pembelian.pdf');
        }

        public function exportExcel()
        {
            // pas download name file nya mau aoa
            // jika mau csv : .csv jika mau xlsx : .xlsx
            $file_name = 'data_pembelian'.'.xlsx';
            // panggil package excel lakuin proses download, logic export nya ada di OrdersExport dengan nama file yang telah ditentukan di $file_name
            return Excel::download(new OrdersExport, $file_name);
        }

       // Di dalam fungsi controller, misalnya pada OrderController
public function search(Request $request)
{
    // Memeriksa apakah parameter pencarian tanggal tersedia
    $date = $request->input('search_date');
    $orders = Order::where('created_at','like','%'.$date .'%')->simplepaginate(5);
    return view('order.kasir.index',['orders' => $orders]);
    

}
public function cari(Request $request)
{
    // Memeriksa apakah parameter pencarian tanggal tersedia
    $date = $request->input('cari');
    $orders = Order::where('created_at','like','%'.$date .'%')->simplepaginate(5);
    return view('order.admin.index',['orders' => $orders]);
    

}
        


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
