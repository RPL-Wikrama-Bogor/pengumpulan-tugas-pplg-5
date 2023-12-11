<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginAuth(Request $request)
    {
        // validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // ambil value dari input dan simpan di sebuah variable
        $user = $request->only(['email', 'password']);
        // $user = array(
        //     "email" => $request->email,
        //     "password" => $request->password,
        // );
        // dd(Auth::attempt($user));
        // auth::attempt -> memasukkan data user yang dinput ke fitur Auth Laravel (konfirmasi proses authentication)
        if (Auth::attempt($user)) {
            // kalau akun sesuai maka berhasil
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('failed', 'Email / Password salah, silahkan  coba lagi');
        }
    }

    public function logout()
    {
        // menghapus session
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        // $user = User::all();
        $user = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.index', compact('user'));
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

        return redirect()->back()->with('success', 'Berhasil menambahkan data!');
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
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,kasir',
        ]);

        $defaultPassword = Str::substr($request->email, 0, 3) . Str::substr($request->name, 0, 3);

        $id->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => bcrypt($defaultPassword)
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
