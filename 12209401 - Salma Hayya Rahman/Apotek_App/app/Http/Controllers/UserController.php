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
     *
     * @return \Illuminate\Http\Response
     */

     public function loginAuth(Request $request){
        //validasi
        $request->validate([
            'email' => 'required|email:dns' ,
            'password' => 'required',
        ]);
        // mengambil value dari onput dan simpan di sebuah variable
        $user = $request->only(['email', 'password']);
        //auth::attempt->memasukan data user yg di input ke fitur auth laravel(konfir proses auth)
        if (Auth::attempt($user)) {
            return redirect()->route('index.page');
        } else{
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout' , 'Anda telah logout!');
    }

    public function index()
    {
        $user = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'email'=> 'required',
            'role'=> 'required', 
        ]);

        $password = substr($request->name , 0,3).substr($request->email, 0,3) ;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'type'=> 'required',
            'price'=> 'required|numeric',
        ]);

        User::where('id',$id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return redirect()->route('medicine.index')->with('success', 'Berhasil mengubah data obat!!!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!!!');
    }
}
