<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loginAuth(Request $request) // Tambahkan tipe data Request pada parameter
    {
        //validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //ambil value dari input dan simpan di sebuah variable
        $user = $request->only(['email', 'password']);

        //auth::attempt->memasukan data user yang di input ke fitur auth laravel
        // (konfirmasi proses authentication)
        if (Auth::attempt($user)) { // Perbaiki penulisan Auth
            //kalau akun sesuai antara email & passwordnya, dan proses penimpanan data ke Authnya berhasil jalanin
            //redirect : ambil path routenya, redirect()->route(): ambil name route
            return redirect('/dashboard'); // Perbaiki penulisan return dan path redirect
        } else {
            return redirect()->back()->with('failed', 'Email dan password tidak sesuai. Silahkan coba lagi!!'); // Perbaiki penulisan return dan tambahkan titik koma
        }
    }

    public function logout()
    {
        //menghapus session/data login(auth)
        Auth::logout();
        //setelah dihapus, diarahkan ke
        return redirect()->route('login');
    }

    public function index()
    {
        //panggil data yang mau ditampilkan
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        // html yang dimunculkan di index.blade.php folder medicine lalu kirim data yang diambil melalui compact
        // (isi compact sampai dengan nama variabel)
        return view('user.index', compact('users'));
    }

    public function create()
    {
        //
        return view('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'role' => 'required',
        ], [
            'email.unique' => 'Email sudah pernah terdaftar.',
        ]);

        // Mengambil 3 huruf pertama dari email sama nama
        $password = Str::substr($request->email, 0, 3)
            // Menggabungkan kedua antara email sama nama 
            . Str::substr($request->name, 0, 3);
        // hash menggunakan bcrypt
        $hashedPassword = bcrypt($password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $hashedPassword,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data pengguna dengan password: ' . $password);
    }



    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required',

            ]
        );
        User::where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]
        );

        return redirect()->route('user.index')->with('success', 'Berhasil Mengubah data User!');
    }
    public function destroy($id)
    {
        // Cari pengguna berdasarkan ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan!');
        }

        // Hapus pengguna
        $user->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data Pengguna!');
    }
}
