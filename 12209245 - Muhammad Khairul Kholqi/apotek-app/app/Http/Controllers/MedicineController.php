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
        // panggil data yang mau di tampilkan
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);

        // html yg dimunculkan di index.blade.php folder medicine, lalu kirim data yang di ambil melalui compact(isi compact sama dengan nama variable)
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
            'stocks'=> $request->stock,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);

        // hasil data yang di ambil diatas akan
        return response()->json($medicine, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->first();
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

        // redirect route mengembalikan halaman ke route dengan name terkait
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
        $medicines = Medicine::orderBy('stocks', 'ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }

    public function updateStock(Request $request, $id) 
    {
        // validasi
        $request->validate([
            'stock' => 'required|numeric',
        ]);

        // ambil data yg akan di update, diambil seblum ngeupdate karena di perlukan untuk pengecekan stock sebelumnya dulu
        $medicine = Medicine::find($id);
        // kalau yg input stocknya <= stock dari data yg di ambil berdasarkan id tadi
        if($request->stock <= $medicine->stocks) {
            // 400: error
            // 200: success
            // 500: server error
            // 419: token csrf
            return response()->json(["message" => "Stock tidak boleh kurang / sama dengan stock sebelumnya!"], 400);
        }

        //update data
        $medicine->update(["stocks" => $request->stock]);
        // mengambil status success
        return response()->json("Berhasil update data stock", 200);
    }

    // public function search(Request $request) {
    //     $searchdata = $request->input('search');
    //     $orders = Medicine::where('created_at', 'like', '%' . $searchdata . '%')->paginate(5);
    //     return view('order.admin.index')->with(['medicines' => $orders]);
    // }
}
