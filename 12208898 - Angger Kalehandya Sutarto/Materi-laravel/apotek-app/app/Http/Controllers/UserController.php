<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function loginAuth(Request $request) {
        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // ambil value dari input dan simpan di sebuah variable
        $user = $request->only(['email', 'password']);
        // auth::attempt -> memasukkan data user yg di input ke fitur auth laravel 
        //(konfirmasi proses authenticantion)
        if(Auth::attempt($user)) {
            // kalau akun sesuai antara email & password nyam dan proses penyimpanan data ke auth nya akan berhasil dijalani
            // redirect : ambil path routenya, redirect()->route() : ambil nama route
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('failed', 'Email dan Password tidak sesuai. Silahkan coba lagi!');
        }
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
          // panggil data yg mau ditampilkan
          $users = User::all();

          // html yg dimunculkan di index.blade.php folder medicine, lalu kirim data yg diambil melalui compact (isi compat sama dengan variable)
          // compact digunakan untuk mengirim data ke database
          return view('user.index', compact('users'));
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

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword)
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data Pegawai!');

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
        $users = User::where('id', $id)->first();
        return view('user.edit', compact('users')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
        ]);

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($defaultPassword),
        ]);
        
    
        // redirect route akan mengembalikan halaman ke route dengan name terkait
        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
