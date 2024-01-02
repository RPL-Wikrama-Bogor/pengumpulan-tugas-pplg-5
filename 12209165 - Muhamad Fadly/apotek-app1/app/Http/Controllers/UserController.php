<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Http\str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function logout(){
        //menghapus sesion atau login (auth)
        Auth::logout();
        //setelah di hapus di arahkan ke login
        return redirect()->route('login');
    }
    
    public function loginAuth(Request $request)
    {
        //validasi
        $request->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
        //ambil value dari input dan simpan sebuah variable
        $user = $request->only(['email','password']);


        //
        if (Auth::attempt($user)) {
            return redirect('/dashborad');
        }else{
            return redirect()->back()->with('failed', 'Email dan Password tidak sesuai. silahkan coba lagi');
        }
    }

    public function index()
    {
        //panggil data yang mau di tampilkan 
        $user = user::all();

        //html yang di munculkan di index.balde.php folder user, lalu kirim data yang di ambil malalui (isi compact dengan nama variabel)
        return view('user.index', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        user::create([
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
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id); // Menggunakan Eloquent untuk mencari pengguna berdasarkan ID

        return view('user.edit', compact('user'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        $defaultPassword = substr($request->email, 0, 3) . substr($request->name, 0, 3);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($defaultPassword),
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data pengguna!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        user::where('id',$id)->delete();
        return redirect()->back()->with('deleted', 'Berasil menghapus data!');
        
    }
    
    
}
