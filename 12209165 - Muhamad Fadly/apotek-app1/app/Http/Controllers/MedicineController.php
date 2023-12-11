<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;

class MedicineController extends  Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil data yang mau di tampilkan 
        $medicines = medicine::orderBy('name', 'ASC')->simplePaginate(5);

        //html yang di munculkan di index.balde.php folder medicine, lalu kirim data yang di ambil malalui (isi compact dengan nama variabel)
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
        //'nama_diinput_select' => 'validasi|validasi2'
        //required->wajib di isi inputnya
        //main->minimal karakter
        //mumeric -> tipe isian datanya number
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);


        //proses mengirim data ke database 
        //medicine mana label
        //'nama_culomn_migration' => $request->name_diinput_select
        medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,

        ]);

        return redirect()->back()->with('success', 'Berasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = medicine::find($id);
        return response()->json($medicine, 200);
    }


    
    public function updateStock(request $request, $id)
    
    {
        //ambil validate
        $request->validate([
            'stock' => 'required|numeric',
        ]);

        //ambil data yang di update ,di ambil sebemlum di update karna di perlukan untuk mengecek stock sebelumnya
        $medicine= medicine::find($id);

        //kalau yang di input stock nya <= stock dari data yang di ambil berdasrkan id tadi
        if ($request->stock <= $medicine->stock) {
            return response()->json(["message" => "stock tidak boleh kurang atau sama dengan stock sebelumnya!"],400);
            //400 : error
            //200 : succes
            //500 : server error
            //419 : token csrf
            
        }
        //update data
        $medicine->update(["stock" => $request->stock]);
        //mengambil status success
        return response()->json("berhasil update data", 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = medicine::where('id',$id)->first();
        //atau bisa dengan medicine::find($id) kalau yang di cari itu berdasarkan id nya

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


        medicine::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            

        ]);
        //redirect route akan mengembalikan halaman ke route dengan nama yang terkait
        return redirect()->route('medicine.index')->with('success','berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        medicine::where('id',$id)->delete();
        return redirect()->back()->with('deleted', 'Berasil menghapus data!');
    }

    public function stockData(){
        $medicines = medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $medicine = order::where('created_at', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('order.admin.index', compact('medicine'));
    }


}
