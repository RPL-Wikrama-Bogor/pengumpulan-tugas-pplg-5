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
        //panggil data yang ingin ditampilkan 
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        //HTML yang dimunculkan di index.blade.php folder medicine, lalu kirim data yang diambil melalui compact (isi compact sama dengan nama variabel)
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
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

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

    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        //atau bisa dengan Medicine::find($id) kalau yang dicari itu berdasarkan id nya
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

        Medicine::where ('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

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
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }

    public function updateStock(request $request, $id)
    {
        $request->validate([
            'stock' => 'required|numeric',
        ]);
        $medicine = Medicine::find($id);
        if($request->stock <= $medicine->stock){
            return response()->json(["message" => "Stock tidak boleh kurang atau sama dengan stock sebelumnya!"], 400);
        }
        $medicine->update(["stock" => $request->stock]);
        return response()->json("Berhasil update data stock", 200);
    }
}
