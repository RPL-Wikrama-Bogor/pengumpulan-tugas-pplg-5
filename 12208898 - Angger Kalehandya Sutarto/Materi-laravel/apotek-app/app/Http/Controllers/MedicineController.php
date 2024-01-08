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
        // panggil data yg mau ditampilkan
        $medicines = Medicine::all();

        // html yg dimunculkan di index.blade.php folder medicine, lalu kirim data yg diambil melalui compact (isi compat sama dengan variable)
        // compact digunakan untuk mengirim data ke database
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
        // 'name_diinput_select => 'validasi|validasi2'
        // required -> wajib diisi inputnya
        // min -> minimal
        // numeric -> tipe isinya number

        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // proses mengirim data ke database
        // medicine : nama model
        // 'nama_column_migration => $request->nama_diinput_select
        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);


        // setelah berhasil diarahkan ke
        // diarahkan kembali ke halaman sblm proses ini dengan session pemberitahuan success
        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);

        return response()->json($medicine, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        //atau bisa dengan Medicine::find($id) kalau yg dicari itu berdasarkan id nya
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

        // redirect route akan mengembalikan halaman ke route dengan name terkait
        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function stockData() {
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);
        return view('medicine.stock', compact('medicines'));
    }

    public function updateStock(Request $request, $id){
        $request->validate([
            'stock' => 'required|numeric',
        ]);

        // ambil data yang akan diupdate, diambil sblm ngeupdate karna diperlukan untuk pengecekan stock sblmnya dulu
        $medicine = Medicine::find($id);
        // kalau yang diinput stocknya <= stock dari data yg diambil berdasarkan id tadi
        if($request->stock <= $medicine->stock) {
            // 400 : error
            // 200 : success
            // 500 : server error
            // 419 : token csrf
            return response()->json(['message' => 'Stock tidak boleh kurang atau sama dengan stock sebelumnya!'], 400);
        }

        // update data
        $medicine->update(['stock' => $request->stock]);
        // mengembalikan status success
        return response()->json('Berhasil update data stock', 200);
    }
}
