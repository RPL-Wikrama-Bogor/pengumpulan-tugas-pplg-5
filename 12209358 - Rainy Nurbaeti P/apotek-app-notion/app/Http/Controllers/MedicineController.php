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
        //panggil data yang mau di tampilkan
        $medicines = Medicine::orderBy('name','ASC')->simplePaginate(5);

        //html yang munculkan di index
        return view('medicine.index',compact('medicines'));
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
        //'name_diinput_select' => 'validasi1|validasi2'
        //required -> wajib diisi input nya
        //min -> minimal karakter
        //numeric ->tipe isian datanya number
       $request->validate([
        'name'=> 'required|min:3',
        'type'=> 'required',
        'price'=> 'required|numeric',
        'stock'=> 'required|numeric',
       ]);
        //proses mengirim data ke data  base
        //
       Medicine::create([
        'name'=> $request -> name,
        'type'=> $request -> type,
        'price'=> $request -> price,
        'stock'=> $request -> stock,

       ]);
       return redirect()->back()->with('success','Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        //hasil data
        return response()->json($medicine, 200);
    }

    public function updateStock(Request $request,$id)
    {
       $request->validate([
        'stock'=>'required|numeric',
       ]);

    $medicine = Medicine::find($id);
    if ($request->stock <= $medicine->stock){
        return response()->json(["message" => "stock tidak boleh kurang atau sama dengan stock sebelum nya!"], 400);
    }

    $medicine->update(["stock"=> $request->stock]);
    return response()->json("berhasil update data stock");
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine =Medicine::where('id',$id)->first();
        //
        return view('medicine.edit',compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'type'=> 'required',
            'price'=> 'required|numeric',

        ]);

        Medicine::where('id',$id)->update([
            'name'=> $request -> name,
            'type'=> $request -> type,
            'price'=> $request -> price,

        ]);
        //
        return redirect()->route('medicine.index')->with('success','berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id', $id )->delete();
        return redirect()->back()->with('deleted','berhasil menghapus data!');

        //
    }

    public function stockData()
    {
        $medicines = Medicine::orderBy('stock', 'ASC' )->simplePaginate(5);
        return view('medicine.stock' , compact('medicines'));
    }
}
