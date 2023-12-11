<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil data yang mau di tambahkan
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        //panggil data yang mau di tampilkan
        //HTML yang dimunculkan di index. blade.php folder medicine, lalu kirim data yang diambil melalui compact(isi compact )
        return view('medicine.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //validasi
    //'name_diinput_select' => 'validasi|validasi2'
    //required->wajib diisin inputnya
    //min->minimal karakter
    //numeric->tipe isian datanya number
    $request->validate([
        'name' => 'required|min:3',
        'type' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
    ]);

    //porses mengirim data ke database
    //medicine : nama model
    //'nama_column_migration' => $request->name_diinput_select
   Medicine::create([
    "name" => $request->name,
    "type" => $request->type,
    "price" => $request->price,
    "stock" => $request->stock,
   ]);
    //setelah berhasil diagram ke
   //diarahkan kemabli ke halaman sebelum di proses ini dengan session pemberitahuan success
   return redirect()->back()->with('success', 'Berhasil menambahkan data!!');

}
   
    public function show($id)
    {
       $medicine = Medicine::find($id);

       return response()->json($medicine,200);

       //hasil data yang diambil diatas, akan dilempar sebagai respose bentuk json dengan status 200 (success/ok), dan data yang dikirim sebagai 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        //atau bisa dengan medicine::find($id) kalau yang dicari itu berdasarkan id nya
        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);
    
        Medicine::where('id', $id)->update([
            "name" => $request->name,
            "type" => $request->type,
            "price" => $request->price,
           ]);

        //redirect route akan mengebamilkan halaman ke route dengan name terkait
        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function stockData()
    {
        $medicine = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact(('medicine')));
    }

    public function updateStock(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'stock' => 'required|numeric',
        ]);
    
        // Ambil data yang akan diupdate, diambil sebelum mengupdate karena diperlukan untuk mengecek stok sebelumnya.
        $medicine = Medicine::find($id);
    
        if ($request->stock <= $medicine->stock) {
            //400 : error
            //200 : success
            //500 : Server error
            //419 : token CSRF
            return response()->json(["message" => "Stok tidak boleh kurang atau sama dengan stok sebelumnya!"], 400);
        }
    
        $medicine->update(["stock" => $request->stock]);
        return response()->json("Berhasil memperbarui data stok", 200);
    }
    
    public function user(Request $request, $id)
    {

    }
    
    
}
