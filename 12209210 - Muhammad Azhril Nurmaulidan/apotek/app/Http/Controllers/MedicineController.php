<?php

namespace App\Http\Controllers;

use App\Models\medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil data yang ingin ditampilkan
        $medicines =Medicine::orderBy('name','ASC')->simplePaginate(5);
//html yang dimunculkan di index.blade.php folder medicine lalu kirim data yang diambilmelalui compact (isi compact sama dengan nama variabel)
        return view('medicine.index' , compact('medicines'));
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
        //'name_diinput_select'=>
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        //proses mengirim data ke database
        //medicine : nama model
        //'nama column migration => request-> name diinput select

        Medicine::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'pricee'=>$request->price,
            'stock'=>$request->stock,
        ]);

        //setelah berhasil diarahkan ke
        //diarahkan kembali ke halaman sblm proses ini dengan pemberitahuan session succes

        return redirect()->back()->with('success','berhasil menambahkan data!');
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
        $medicine = Medicine::where('id',$id)->first();

        return view('medicine.edit',compact('medicine'));
        //
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        Medicine::where('id',$id)->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'pricee'=>$request->price,
        ]);
            //redirect route akan mengembalikan halaman ke route dengan name terkait
        return redirect()->route('medicine.index')->with('success','berhasil mengubah data obat');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Medicine::where('id',$id)->delete();

        return redirect()->back()->with('delete','berhasil menghapus data!');

    }

    public function stockData()
    {
        $medicines =Medicine::orderBy('stock','ASC')->simplePaginate(5);

        return view('medicine.stock', compact('medicines'));
    }

    public function updatestock(request $request,$id)
    {
        $request->validate([
            'stock' =>'required|numeric',
        ]);
        //ambil data yang akan di update,diambil sebelum ngeupdate karna diperlukan untuk pengecekan stock sebelumnya dulu
        
        $medicine =Medicine::find($id);
        //kalau yg diinput stock nya <= stock dari data yang diambil berdasarkan id tadi
        if($request->stock <= $medicine->stock){
            //400 = eror
            //200 = success
            //500 = server eror
            //419 = token csrf
            return response()->json(["message" => "stock tidak boleh kurang atau sama dengan stock sebelumnya"],400);
        }

        //update data
        $medicine->update(["stock" => $request->stock]);
        //mengembalikan status success 
        return response()->json("berhasil update data stock",200);
    }

    
}
