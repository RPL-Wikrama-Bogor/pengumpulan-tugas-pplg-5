<?php

namespace App\Http\Controllers;

use App\models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password' => 'required'
        ]);
        //ambil value dari input dan simpan di sebuah variabel
        $user = $request->only(['email','password']);
        //auth::attempt -> memasukan data user yg diinput ke fitur auth yang ada di laravel (konfirmasi proses authefication)
        if(Auth::attempt($user)){
            return redirect('/dashboard');
        }else{
            return redirect()->back()->with('failed','Email atau Password tidak sesuai ,Silahkan coba lagi');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines =user::orderBy('name','ASC')->simplePaginate(5);
        //kelola
        return view('akun.index', compact("medicines"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //buat
        return view('akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
            
            
        ]);

        //proses mengirim data ke database
        //medicine : nama model
        //'nama column mig  ration => request-> name diinput select

        Medicine::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>$request->password,
        ]);
        return redirect()->back()->with('success','berhasil menambahkan data!');
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
    public function destroy(string $id)
    {
        //
    }
}
