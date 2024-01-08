<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\students;
use App\models\User;
use App\models\rayons;
use App\models\rombels;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datasiswa = students::all();
        
        return view('siswa.index', compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datarayon = rayons::get('rayon');
        $datarombel = rombels::get('rombel');
        return view('siswa.create',compact('datarayon','datarombel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nis'=>'required',
            'name'=>'required',
            'rayon_id'=>'required',
            'rombel_id'=>'required',
        ]);
        students::create([
            'nis'=>$request->nis,
            'name'=>$request->name,
            'rayon_id'=>$request->rayon_id,
            'rombel_id'=>$request->rombel_id,
        ]);

        return redirect()->route('siswa.index')->with('success','Data berhasil ditambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        //
        students::where('id',$id)->delete();

        return redirect()->back()->with('hapus','data berhasil dihapus');

    }
}
