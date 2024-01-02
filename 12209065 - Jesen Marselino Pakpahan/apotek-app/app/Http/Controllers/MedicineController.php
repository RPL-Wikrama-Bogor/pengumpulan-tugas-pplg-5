<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use GrahamCampbell\ResultType\Success;
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
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        
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
        // 'name_diinput_select' => 'validasi1|validasi2'
        //required -> waji diisi inputnya
        //min -> minimal karakter
        //numeric -> tipe isian datanya number
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        // proses mengirim data ke databae
        //medicine : nama model
        //'nama_column_migration' => $request-name_diinput_select
        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        //setelah berhasil diarahkan ke
        //diarakan kembali ke halaman sblm proses ini dengan session pemberitahuan succes
        return redirect()->back()->with('success','berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|min:3',
           'type' => 'required' ,
           'price' => 'required|numeric', 
           
        ]);

        Medicine::where('id',$id)->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'price'=>$request->price,
           
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->back()->with('deleted','berhasil menghapus data!');
    }
    public function stockData()
    {
        $medicines = Medicine::orderBy('stock','ASC')->simplePaginate(5);

        return view('medicine.stock', compact ('medicines'));
    }
    public function show($id)
    {
        $medicine = Medicine::find($id);
        return response()->json($medicine, 200);
    }
    public function updateStock(Request $request, $id)
{
    $request->validate([
        'stock' => 'required|numeric',
    ]);
    //ambil data yang akan diupdate, diambil sblm ngeupdate karna di perlukan untuk pengecekan stock sblmnya dulu
    $medicine = Medicine::find($id);
    // kalau yg di input stock nya <= stock dari data yang diambil berdasarkan id tdo
    if ($request->stock <= $medicine->stock){
        // 400 : error
        // 200 : success
        // 500 : server error
        // 419 : token csrf
        return response()->json(["message" => "Stock tidak boleh kurang atau sama dengan stock sebelumnya!"]
        , 400);
    }
    //update data
    $medicine->update(["stock" => $request->stock]);
    //mengembalikan status success
    return response()->json("Berhasil update data stock", 200);
}
}

    