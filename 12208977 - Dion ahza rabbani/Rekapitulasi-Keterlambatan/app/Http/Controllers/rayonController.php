<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\rayons;
use App\models\User;

class rayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datarayon=rayons::all();
        return view('rayons.index',compact('datarayon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datarayon = User::where('role','ps')->get();
        return view('rayons.create',compact('datarayon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'rayon'=>'required',
            'user_id'=>'required',
        ]);

        rayons::create([
            'rayon'=>$request->rayon,
            'user_id'=>$request->user_id,
        ]);

        return redirect()->route('rayons.index')->with('success','Berhasil Menambahkan data');
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
    public function edit($id)
    {
        //
        $datarayon = rayons::find($id);
        return view('rayons.edit',compact('datarayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'rayon'=>'required',
            'user_id'=>'required'
        ]);

        rayons::where('id',$id)->update([
            'rayon'=>$request->rayon,
            'user_id'=>$request->user_id,
        ]);

        return redirect()->route('rayons.index')->with('success','berhasil mengubah data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        //
        rayons::where('id',$id)->delete();

        return redirect()->back()->with('hapus','berhasil menghapus data');
    }
}
