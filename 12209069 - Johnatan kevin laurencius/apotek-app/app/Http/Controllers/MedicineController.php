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
        //panggil data yang mau ditampilkan
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);

        //html yang dimunculkan di index.blade.php folder medicine, lalu kirim data yang diambil melalui compact (isi compact sama dengan nama variable)
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
        //'name_diinput_select' => 'validasi1|validasi2'
        //required -> wajib diisi inputnya
        //min -> minimal
        //numeric -> tipe isinya number
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        //proses mengirim data ke database
        //medicine : nama model
        // 'nama_column_migration' => $request->name_diinput_select
        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // setelah berhasil diarahkan ke
        // diarahkan kembali ke halaman sebelum proses ini dengan session pemberitahuan success
        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);

        //hasil data yang diambil diatas, akan dilempar sebagai response bentuk json dengan status 200 (success/ok), dan data yang dikirims ebagai response (res) ke js nya itu data dari $medicine
        return response()->json
        ($medicine, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
        // atau bisa dengan Medicine::find($id) kalau yang diccari itu bedasarkan idnya

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
            'price' => 'required|numeric'
        ]);

        Medicine::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price
        ]);
        //redirect route akan mengembalikan halaman ke rout edengan name terkait
        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data!');
    }

    public function stockData()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }

    public function updateStock(Request $request, $id)
    {
        // validasi
        $request->validate([
            'stock' => 'required|numeric'
        ]);

        // ambil data yang akan diupdate, diambil sebelum ngeupdate karna diperlukan untuk pengecekan stock sebelumnya dulu
        $medicine = Medicine::find($id);
        // kalau yang diinput stock nya <= stock dari data yang diambil berdasarkan id tadi
        if ($request->stock <= $medicine->stock){
            return response()->json(["message" => "Stock tidak boleh kurang atau sama dengan stock sebelumnya!"], 400);
            // 400 : error
            // 200 : success
            // 500 : server errorr
            // 419 : token csrf
        }

        //update data
        $medicine->update(["stock" => $request->stock]);
        // mengembalikan status succes
        return response()->json("Berhasil update data stock", 200);
    }
}
