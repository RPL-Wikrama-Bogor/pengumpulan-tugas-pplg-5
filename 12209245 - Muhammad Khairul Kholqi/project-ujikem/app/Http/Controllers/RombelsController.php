<?php

namespace App\Http\Controllers;

use App\Models\rombels;
use Illuminate\Http\Request;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = rombels::orderBy('created_at', 'desc')->simplePaginate(5);
        $totalRombel = rombels::count();

        return view('admin.rombel.index', compact('rombels', 'totalRombel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('admin.rombel.create');
    }

public function store(Request $request)
{
    $request->validate([
        'rombel' => 'required|min:3',
    ]);

    rombels::create([
        'rombel' => $request->rombel,
    ]);

    return redirect()->route('rombel.create')->with('success', 'Berhasil menambah data rombel!');
}


    /**
     * Display the specified resource.
     */
    public function show(rombels $rombels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rombels $rombels, $id)
    {
        $rombels = Rombels::where('id', $id)->first();
        return view('admin.rombel.edit', compact('rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
          //validasi data untuk data bases
          $request->validate([
            'rombel' => 'required',
        ]);

        Rombels::where('id', $id)->update([
            'rombel' => $request->rombel,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data rombel!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        // Cari pengguna berdasarkan ID
        rombels::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Pengguna!');
    }

   public function search(Request $request)
{
    $search = $request->get('search');
    $rombels = rombels::where('rombel', 'like', '%' . $search . '%')->paginate(5);
    $totalRombel = rombels::count();

    return view('admin.rombel.index', compact('rombels', 'totalRombel'));
}
}