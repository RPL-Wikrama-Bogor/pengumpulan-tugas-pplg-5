<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // panggil data yang mau di tampilkan
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        // html yang dimunculkan di index.blade.php folder medicine, lalu kirim data yang di ambil melalui compact(isi compact sama dengan variable)
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
        // validasi
        //'name_diinput_select' => 'validasi1|validasi2'
        // required -> wajib diisi inputnya
        // min -> minimal karakter
        // numeric -> tipe isian datanya number
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        //proses mengirim data ke database
        // medicine : nama model
        // 'nama_colomn_migration' => $request->name_diinput_select

        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        //setelah berhasil diarahkan ke
        //diarahkan kembali ke halaman sebelum proses ini dengan session pemberitahuan success
        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);

        //hasil data yang diambil diatas akan dilempar sebagai response bentuk json dengan status 200 (success/ok), dan data yang dikirim sebagai response (res) ke js nya itu data dari $medicine

        return response()->json($medicine, 200);
    }

    public function UpdateStock(Request $request, $id){
        //validasi
        $request->validate([
            'stock' => 'required|numeric',
        ]);
        // ambuk data tabg ajan di upadate, diambil sebelum ngeupdate karna di perlikan untuk pengecekan stock sebelumnya dlu
        $medicine = Medicine::find($id);
        //kalau yang di input stock nya <= stock dari data yang diambil berdasarkan id tadi
        if($request->stock <= $medicine->stock){
            // 400 : error
            // 200 : success
            // 500 : server error
            // token csrf
            return response()->json(["message" => "Stock tidak boleh sama atau kurang dari stock sebelumnya!"], 400);
        }
        // update data

        $medicine->update(["stock" => $request->stock]);
        // memanggil sesuatu yang success
        return response()->json("berhasil update data stock", 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        // atau bisa dengan Medicine::find($id) kalau yang dicari berdasarkan id nya
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
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        //redicrect route akan mengmbalikan halaman ke route dengan name terkait
        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus obat!');
    }

    public function stockData(){
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }
}
