<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\rombels;

class rombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $datarombel = rombels::all();
            return view('rombels.index',compact('datarombel'));   
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('rombels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'rombel'=>'required',
        ]);

        rombels::create([
            'rombel'=>$request->rombel,
        ]);
        return redirect()->back()->with('status',"berhasil menambah rombel");


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
        $datarombel = rombels::find($id);
        return view('rombels.edit',compact('datarombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'rombel'=>'required',
        ]);
        rombels::where('id',$id)->update([
            'rombel'=>$request->rombel,
        ]);

        return redirect()->route('rombels.index')->with('status','berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        //
        rombels::where('id',$id)->delete();

        return redirect()->back()->with('hapus','berhasil menghapus');
    }
}
