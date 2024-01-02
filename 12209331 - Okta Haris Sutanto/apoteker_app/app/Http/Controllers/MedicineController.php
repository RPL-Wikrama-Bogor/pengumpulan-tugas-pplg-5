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
        // html yang dimunculkan di index.blade.php folder medicine lalu kirim data yang diambil melalui compact
        // (isi compact sampai dengan nama variabel)
        return view('medicine.index', compact('medicines'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //required =>  wajib di isi inputnya
        // min => minimal
        // numeric => tipe yang isinya number
        $request->validate(
            [
                "name" => "required|min:3",
                "type" => "required",
                "price" => "required|numeric",
                "stock" => "required|numeric",
            ]);

            Medicine::create(
                [
                    // proses mengirim data ke database
                    // medicine : nama model
                    // 'nama_column_migration' => request->nama, 
                    "name" => $request->name,
                    "type" => $request->type,
                    "price" => $request->price,
                    "stocks" => $request->stock,

                ]);
                // setelah berhasil di arahkan ke
                // di arahkan kembali, kehalaman sebelum proses ini dengan session pemberitahuan succes
                return redirect()->back()->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $medicine = Medicine::find($id);

        return response()->json($medicine, 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateStock(Request $request, $id) {

        $request->validate(
            [
                'stock' => 'required|numeric',
            ]);
            // ambil data yang akan di update, diambil sebelum mengupdate karna diperlukan untuk pengecekan stok sebelum dulu

            $medicine = Medicine::find($id);

            // kalau yang di input stock nya <= stock data yang di ambil berdasarkan id tadi
            if ($request->stock <= $medicine->stocks) {
                // 400 => error
                // 200 => success
                // 500 => Server error
                // 419 => Token csrf
                return response()->json(["message" => "Stock tidak boleh kurang / sama dengan stok sebelumnya"], 400);
    }
    // update data

    $medicine->update(["stocks" => $request->stock]);
    // mengembalikan status success
    return response()->json("Berhasil update data stock", 200);
}
    public function edit($id)
    {
        //
        $medicine = Medicine::where('id', $id)->first();
        // atau bisa dengan medicine::find($id) kalau yang dicari itu berdasarkan id nya

        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate(
            [
                "name" => "required|min:3",
                "type" => "required",
                "price" => "required|numeric",
                
            ]);
        Medicine::where('id', $id)->update(
            [
                "name" => $request->name,
                "type" => $request->type,
                "price" => $request->price,
            ]
        );

        return redirect()->route('medicine.index')->with('success', 'Berhasil Mengubah data Obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Medicine::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus Data!');
    }
    public function stockData()
    {
        // 
        $medicines = Medicine::orderBy('stocks', 'ASC')->simplePaginate(5);
        return view('medicine.stock', compact('medicines'));
    }
    
}
