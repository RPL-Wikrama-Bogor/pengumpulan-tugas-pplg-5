<?php

namespace App\Http\Controllers;

use App\Models\rayons;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = rayons::orderBy('created_at', 'desc')->simplePaginate(5);
        $totalRayon = rayons::count();

        return view('admin.rayon.index', compact('rayons', 'totalRayon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rayon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'rayon' => 'required|min:3',
        'user_id' => 'required',
    ]);

    rayons::create([
        'rayon' => $request->rayon,
        'user_id' => $request->user_id,
    ]);

    // Add a success flash message
    return redirect()->back()->with('success', 'Berhasil menambah data rayon!');
}


    /**
     * Display the specified resource.
     */
    public function show(rayons $rayons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    //find0rfail :  untuk menemukan data berdasarkan kunci utama (biasanya dari ID)
    $rayon = Rayons::findOrFail($id);

    return view('admin.rayon.edit', compact('rayon'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'rayon' => 'required|min:3',
        // 'user_id' => 'required',
    ]);

    $rayon = Rayons::findOrFail($id);

    $rayon->update([
        'rayon' => $request->rayon,
        // 'user_id' => $request->user_id,
    ]);

    return redirect()->back()->with('success', 'Berhasil ubah data rayon!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // // Cari pengguna berdasarkan ID
        Rayons::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Pengguna!');
    }

       public function search(Request $request)
{
    $search = $request->get('search');
    $rayons = rayons::where('rayon', 'like', '%' . $search . '%')->paginate(5);
    $totalRayon = rayons::count();

    return view('admin.rayon.index', compact('rayons', 'totalRayon'));
}
}