<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// tambahkan ini jika Authnya error
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAuth(Request $request) {
        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // ambil value dari input dan simpan disebuah variable
        $user = $request->only(['email', 'password']);
        // auth::attempt -> memasukan data user yang di input ke fitur Auth laravel (konfirmasi proses authentication)
        if(Auth::attempt($user)) {
            // kalau akun sesuai antara email & passwordnya dan proses penumpanan data ke auth nya berhasil jalan
            // redirect: ambil path routenya, redirect()->route() : ambil name route
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('failed', 'Email dan passowrd salah. Silahkan coba lagi!');
        }
    }

    public function index()
    {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => 'nullable',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data!');
    }

    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return response()->json($user, 200);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'role' => 'required',
        ]);

        if ($request->has('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = $user->password; // Menggunakan password yang ada
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password, // Menggunakan $password yang telah ditentukan
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy($id)
    {
      User::where('id', $id)->delete();

      return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function logout() {
        // menghapus session/data login (auth)
        Auth::logout();
        return redirect()->route('login');
    }
}
