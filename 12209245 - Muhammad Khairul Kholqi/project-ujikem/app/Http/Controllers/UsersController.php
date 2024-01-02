<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function loginAuth(Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ]);
    $user = $request->only(['email', 'password']);
    if(Auth::attempt($user)) {
        $userRole = Auth::user()->role;

        if ($userRole === 'admin') {
            return redirect()->route('admin.home');
        } elseif ($userRole === 'ps') {
            return redirect()->route('pembimbing.dash');
        } else {
            return redirect('/dashboard');
        }
    } else {
        return redirect()->back()->with('failed', 'Incorrect email and password!');
    }
}



    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->simplePaginate(5);
        $totalUser = User::count();

        $totalAdmin = User::where('role', 'admin')->count();
        $totalPembimbing = User::where('role', 'ps')->count();
        
        return view('user.index', compact('user', 'totalUser', 'totalAdmin', 'totalPembimbing'));
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
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => bcrypt($defaultPassword)
            ]);
        
            return redirect()->back()->with('success', 'Berhasil Menambahkan Data!');
        }

    /**
     * Display the specified resource.
     */
    public function show(users $users)
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
        'email' => 'required',
        'role' => 'required',
        // 'password' => 'min:3'
    ]);

    $defaultPassword = Str::substr($request->email, 0, 3) . Str::substr($request->name, 0, 3);

    $id->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'role' => $request->input('role'),
        'password' => bcrypt($defaultPassword)
    ]);

    return redirect()->back()->with('success', 'Berhasil mengubah data pengguna!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        //
    }

    public function logout() {
    // menghapus session/data login (auth)
    Auth::logout();
    return redirect()->route('login');
}

}
