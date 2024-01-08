<?php

namespace App\Http\Controllers;

use App\models\user;
use Illuminate\Http\Request;
use Auth;

class userController extends Controller
{


    //
    public function login(Request $request){
        $request->validate([
            // 'name' => 
            'email'=>"required",
            'password'=>"required",
        ]);
        $user = $request->only(['email','password']);
        //auth::attempt -> memasukan data user yg diinput ke fitur auth yang ada di laravel (konfirmasi proses authefication)
        if(Auth::attempt($user)){
            return redirect('/dashboard');
        }else{
            return redirect()->back()->with('failed','Email atau Password tidak sesuai ,Silahkan coba lagi');
        }

    }

    public function akun(){
        $datauser = User::all();
        return view('user.index' , compact('datauser'));

    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
         
        $request->validate([
            'role'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        User::create([
            'role'=>$request->role,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        return redirect()->back()->with('status','berhasil membuat akun');
    }



    public function hapus($id){
        User::where('id',$id)->delete();

        return redirect()->back()->with('delete','berhasil menghapus akun');
    }

    public function edit($id){
        $datauser = User::all();
        return view('user.edit',compact('datauser'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'role'=>'required',
            'name'=>'required',
            'email'=>'required',
        ]);

        User::where('id',$id)->update([
            'role'=>$request->role,
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('user.akun')->with('status',"berhasil mengupdate");
    }
}
