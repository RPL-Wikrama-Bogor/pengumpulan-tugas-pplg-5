<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Concat;

class UserController extends Controller
{
    public function index()
    {

        $usr = User::orderBy('name','ASC')->simplePaginate(5);
        return view('kelola', compact('usr'));
    }

   

   


    public function edit( $id)
    {
        $usr =  User::where('id', $id)->first();
        //atau bisa dengan medicine::find($id) kalau yang dicari itu berdasarkan id nya

        return view('edituser',compact('usr'));
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
        return redirect()->route('dashboard')->with('success', 'Berhasil mengubah data pengguna');
    } else {
        // Handle jika pengguna tidak ditemukan
        return redirect()->route('dashboard')->with('error', 'Pengguna tidak ditemukan');
    }

    }
    public function destroy($id)
    {
        User::where('id', $id)->delete();


        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
}

}