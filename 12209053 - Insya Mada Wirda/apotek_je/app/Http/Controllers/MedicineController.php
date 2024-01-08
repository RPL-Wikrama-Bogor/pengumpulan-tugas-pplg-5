<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    
    public function index()
    {
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);

        return view('medicine.index', compact('medicines'));
    }

    
    public function create()
    {
        return view('medicine.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'type'=> 'required',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric',
        ]);

        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data!!!');
    }

    
    public function show($id)
    {
        $medicine = Medicine::find($id);

        return response()->json($medicine, 200);
    }

    public function updateStock(Request $request, $id)
    {
        $request->validate([
            'stock'=> 'required|numeric',
        ]);

        $medicine = Medicine::find($id);
        if ($request->stock <= $medicine->stock) {
            return response()->json(['message' => "Stock tidak boleh kurang atau sama dengan stock sebelumnya !!!"],400);
        }

        $medicine->update(['stock' => $request->stock]);
        return response()->json(['Success'], 200);
    }


    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();

        return view('medicine.edit', compact('medicine'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'type'=> 'required',
            'price'=> 'required|numeric',
        ]);

        Medicine::where('id',$id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data obat!!!');  
    }

    
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!!!');
    }

    public function stockData()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }
}