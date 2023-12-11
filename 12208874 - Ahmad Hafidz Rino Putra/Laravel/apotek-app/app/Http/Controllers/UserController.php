<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('name', 'ASC')->simplePaginate(5);

        return view('user.data', compact('user'));
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
            'name'=> 'required|min:3',
            'email'=> 'required',
            'role'=> 'required',
        ]);

        $password = substr($request->name, 0, 3) . substr($request->email, 0, 3);

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($password),
        ]);

        return redirect()->route('user.data')->with('success', 'Berhasil menambahkan data pengguna !!!');
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
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        
        if ($request->has('password')) {
            User::where('id', $id)->update([
                'password' => bcrypt($request->password),
            ]);
        }
            
        User::where('id',$id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role, 
        ]);

        return redirect()->route('user.data')->with('success', 'Berhasil mengubah data pengguna !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->route('user.data')->with('deleted', 'Berhasil menghapus data!!!');
    }

    public function loginAuth(Request $request) 
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect()->route('home.page');
        } else {
            return redirect()->back()->with('failed', 'Prosess login gagal, silahkan coba kembali dengan data yang benar !');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout');
    }
}
