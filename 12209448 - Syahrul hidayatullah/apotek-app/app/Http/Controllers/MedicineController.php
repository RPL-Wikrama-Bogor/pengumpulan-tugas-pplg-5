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
        $medicines = Medicine::orderBy('name','ASC')->simplePaginate(5);
          //html yang dimunculkan index.badle folder medicine.
          //lalu kirim data yg diambil melalui compact (isi compact sama dengan variable)
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
        //validai
        // 'name_diinput_selest => 'validasi1|validasi2
        //required=>wajib diisi inputannya
        //min -> minimal karakter
        //numeric= tipe data isian number
        $request->validate([
            'name'=>'required|min:3',
            'type'=>'required',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric',
        ]);
        //proses mengirim data ke database 
        // medicine : nama model
        // nama column migrations =>$request->name diinpunt select

        Medicine::create([
            'name' =>$request->name,
            'type' =>$request->type,
            'price'=>$request->price,
            'stock'=>$request->stock,
        ]);

        //setelah berhasil diaharahkan ke 
        //diarahkan kembali ke halaman sblm proses ini dengan session pemberitahuan success

        return redirect()->back()->with('success','berhasi menambahkan data!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);


        return response()->json($medicine,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $medicine =  Medicine::where('id', $id)->first();
        //atau bisa dengan medicine::find($id) kalau yang dicari itu berdasarkan id nya

        return view('medicine.edit',compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:3',
            'type'=>'required',
            'price'=> 'required|numeric',
            
        ]);


        Medicine::where('id', $id)->update([
            'name' =>$request->name,
            'type' =>$request->type,
            'price'=>$request->price,
           
        ]);
           // redirect route akan mengembalikan halaman ke route dengan name terkait
        return redirect()->route('medicine.index')->with('success','berhasil mengubah data obat');
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
    $medicines = Medicine::orderBy('stock','ASC')->simplePaginate(5);
    return view('medicine.stock', compact('medicines'));
  }
public function updateStock(Request $request, $id)
{ // validasi
     $request->validate(
        ['stock' => 'required|numeric',]
     );
 // ambil data yang akan diupdate,diambil  sblm mengapdate karan diperlukan untuk pengecekan stock sebelummnya
     $medicine = Medicine::find($id);
     // kalau yang di input stocknya <= stock dari data yang dimabil berdasarkan id tadi 
     if($request->stock <= $medicine->stock){
        return response()->json(["message" => "Stock tidak boleh kurang atau sama dengan stock sebelumnya!"],400);
     }
     // 400 : error
     // 200 : success
     // 500 : seerver error
     // 419 : token csrf


      // update data
     $medicine->update(["stock"=> $request->stock]);
     // mengembalikan data success
return response()->json(["messsage" => "Berhasil update nambah stock"],200);
}



}
