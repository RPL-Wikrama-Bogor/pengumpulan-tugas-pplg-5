<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);

        if(Auth::attempt($user)) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('failed', 'Email dan Password tidak sesuai, Silahkan coba lagi!');
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'name' => 'required',
        ]);

        $defaultPassword = Str::substr($request->email, 0, 3) . Str::substr($request->name, 0, 3);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword)
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Akun!');
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
        $user = User::WHERE('id', $id)->first();
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
            'name' => 'required',
        ]);

        $password = $request->password;

        User::WHERE('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($password)
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil Mengubah Data User!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::WHERE('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil Menghapus Obat!');
    }
}
