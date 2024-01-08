<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAuth(Request $request){
        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //diambil value dari input dan simpan di sebuah variabel
        $user = $request->only(['email', 'password']);
        // auth::attempt -> memasukan data user yang di input ke fitur auth variabel(konfirmasi proses atuhtenatication)
        if(Auth::attempt($user)){
            // kalau akun sesuai antara email & passwordnya, dan proses penyimpanan data ke auth nya berhasil di jalanin
            // redirect : ambil path routernya, redirect()->route(): ambil name route
            return redirect('/dashboard');
        }else{
            return redirect()->back()->with('failed', 'Email dan password tidak sesuai. Silahkan coba lagi');
        }
    }

    public function logout(){
        // menghapus session/data login (auth)
        Auth::logout();
        //setelah di hapus, diarahkan ke
        return redirect()->route('login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.index',compact('users')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        $defaultPassword = Str::substr($request->email, 0, 3) . Str::substr($request->name, 0, 3);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword)
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan Akun!');
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
        $user = User::where('id', $id)->first();
        // atau bisa dengan Medicine::find($id) kalau yang dicari berdasarkan id nya
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        //redicrect route akan mengmbalikan halaman ke route dengan name terkait
        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus obat!');
    }
}
