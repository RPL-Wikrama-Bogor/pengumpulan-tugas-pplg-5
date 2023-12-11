<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = $request->only(['email','password']);
        if (Auth::attempt($user)) {
            return redirect('/dashboard');
    } else{
        return redirect()->back()->with('failed', 'Email dan password tidak sesuai. silahkan coba lagi!');
    }
     }


     public function logout()
     {
        Auth::logout();
        return redirect()->route('login');
     }



    public function index()
    {
        
        $usr = User::orderBy('name','ASC')->simplePaginate(5);
        return view('user.index', compact('usr'));
    }

    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
      
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required',
            'role'=> 'required',
            // 'password'=> '',
        ]);
       
        $name = $request->name;
        $email = $request->email;

    $password = substr($name, 0, 3) . substr($email, 0, 3) ;
   
        
        

        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'role'=>$request->role,
            'password'=> Hash::make($password),
        ]);

        return redirect()->back()->with('success','berhasi menambahkan data!');
    }



    public function edit( $id)
    {
        $usr =  User::where('id', $id)->first();
        //atau bisa dengan medicine::find($id) kalau yang dicari itu berdasarkan id nya

        return view('user.edit',compact('usr'));
    }


    public function update(Request $request, $id)
    {
        

    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required',
        'role' => 'required',
    ]);

    $userData = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ];

    if ($request->has('password')) {
        // Jika password diisi, gunakan password baru
        $userData['password'] = Hash::make($request->password);
    }

    // Cek apakah pengguna ditemukan
    $user = User::find($id);

    if ($user) {
        $user->update($userData);
        return redirect()->route('user.index')->with('success', 'Berhasil mengubah data pengguna');
    } else {
        // Handle jika pengguna tidak ditemukan
        return redirect()->route('user.index')->with('error', 'Pengguna tidak ditemukan');
    }

    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();


        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

}
