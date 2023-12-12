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
        //panngil data yang mau ditampilkan
        //all() harus di awa, jika ada proses terlebih dahulu menggunakan get()
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);

        //html yg dimuncukjan di index.blade.php folder medicine, lalu kirim data yang diambil melalui compact
        //(isi compact sama dengan nama variable)
        return view('medicine.index', compact('medicines'));
        //kalo kirim 2 compact('var1', 'var2)
        //kalo mau kirim beda nama with(['data'=> medicines])
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
        //'name_diinput_select' =>'validasi1|validasi2'
        //reqired -> wajib diisi inputnya
        // min -> minimal karakter
        // numeric -> tipe isian datanya number
        $request->validate([
            'name' => 'required|min:3',
            'type'=> 'required',
            'price' => 'required|numeric',
            'stock' =>'required|numeric',
        ]);

        //prises mengirim data ke database
        // medicine : ama model
        //'nama_column_migration' => $request->name_diinput_select
        medicine::create([
            'name' => $request->name,
            'type'=> $request-> type,
            'price' => $request->price,
            'stock' =>$request->stock,
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

        //hasil data yang diambil diatas akan dilempar sebagai reponse bentuk json dengan status 200 (success/ok), 
        //dan data yang dikirim sebagai response(res) ke js nya itu data dari $medicine
        return response()->json($medicine, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        //atau bisa dengan Medicine::find($id) kalau yang dicari berdasarkan id nya

        //compact buat kirim data ke blade
        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type'=> 'required',
            'price' => 'required|numeric',
        ]);

        medicine::where('id',$id)->update([
            'name' => $request->name,
            'type'=> $request-> type,
            'price' => $request->price,
        ]);

        //redirect route akan mengembalikan halaman ke route dengan name terkait
        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data');
    }

    public function stockData()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }

    public function updateStock(request $request, $id)
    {
        //validasi
        $request->validate([
            'stock' => 'required|numeric',
        ]);
        // ambil data yang akan diupdate, di ambil sebelum neg update karena 
        //diperlukan untuk pengecekan stock sebelumnya dulu
        $medicine = Medicine::find($id);
        //kalau yang di innput stock nya  <= stock dati data yang diambil berdasarkan id tadi
        if($request->stock <= $medicine->stock){
            //400 : error
            //200 : success
            //500 : server error
            // 419 : tokern csrf
            return response()->json(["message" => "Stock tidak boleh kurang atau sama dengan stock sebelumnya!"], 400);
        }
        //update data
        $medicine->update(["stock"=> $request->stock]);
        //mengembalikan status success
        return response()->json("Berhasil update data stock", 200);
    }
}
