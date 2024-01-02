<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //panggil data yang mau ditampilkan
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);

        //html yang dimuncul kan di index.blade.php folder medicine, lalu kirim data yang diambil melalui compact(isi compact sama dengan nama variale)
        return view('medicine.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.create');
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
        //'name_diinput_select' =>'validasi1|validasi2'
        //required-> wajib diisi inputnya
        //min -> minimal karakter
        //numeric ->tipe isian datanya number
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        // proses mengirim data ke database
        //medicine: nama model
        //'nama_colomn_migration'=>$request->name_diinput select
        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        // setelah berhasil diarahke
        //diarahkan kembali ke halaman sebelum proses ini dengan session pemeberitahuan succes
        return redirect()->back()->with('success', 'Berhasil menambahkan data!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        return response()->json
        ($medicine, 200);
    }

    public function updateStock(Request $request, $id)
    {
        //validasi
        $request->validate([
            'stock' => 'required|numeric',
        ]);
        // ambil data yang akan diupdate, diambil sebelum ngeupdate karena diperlukan untuk pengecekan stock sebelumnya dulu
        $medicine = Medicine::find($id); 
        //kalau yang di input stock nya <= stock dari data yang diambil berdasarkan id tadi
        if ($request->stock <= $medicine->stock){
            // 400 : error 
            // 200 : success
            // 500 : server error
            // 419 : token csrf
            return response()->json(["Message" => "Stock tidak boleh kurang atau sama dengan stock sebelumnya!!"], 400);
        }

        //update data
        $medicine->update(["stock" => $request->stock]);
        //mengembalikan status success
        return response()->json("Berhasil update data stock", 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        // atau bisa dengan medicine::find($id) kalau yang dicari itu berdasarkan id nya

        return view('medicine.edit', compact('medicine',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        Medicine::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data obat !');


        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::where('id',$id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');



    }

    public function stockData()
    {
        $medicines= Medicine::orderBy('stock', 'ASC')->simplePaginate(5);
        return view('medicine.stock', compact('medicines'));
    }

}
