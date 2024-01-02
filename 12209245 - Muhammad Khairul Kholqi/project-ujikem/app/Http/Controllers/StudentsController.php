<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\rombels;
use App\Models\rayons;
use App\Models\User;
use App\Models\lates;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class StudentsController extends Controller
{
    public function home() {
        $totalSiswa = students::count();
        $totalRombel = rombels::count();
        $totalRayon = rayons::count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalPembimbing = User::where('role', 'ps')->count();

        return view('admin.home', compact('totalSiswa', 'totalRombel', 'totalRayon', 'totalAdmin', 'totalPembimbing'));
    }

    public function index()
    {
        $student = students::orderBy('created_at', 'desc')->with('rombels', 'rayons')->simplePaginate(5);
        $totalStudents = students::count();

        return view('admin.students.index', compact('student', 'totalStudents'));
    }
    



    public function create()
    {
        $rombels = rombels::all();
        $rayons = rayons::all();
        return view('admin.students.create', compact('rayons', 'rombels'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nis' => 'required',
            'name' => 'required',   
            'rombel_id' => 'required|string',
            'rayon_id' => 'required|string',
        ]);


        students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah data student!');
    }

    public function show(students $students)
    {
        
    }

    public function edit($id)
    {
        $student = students::findOrFail($id);
        $rombels = rombels::all();
        $rayons = rayons::all();
    
        return view('admin.students.edit', compact('student', 'rombels', 'rayons'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required|string',
            'rayon_id' => 'required|string',
        ]);

        students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
        
        return redirect()->back()->with('success', 'Berhasil mengubah data siswa!');
    }

    public function delete($id)
    {
        $student = students::findOrFail($id);
        $student->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data siswa!');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $student = students::where('nis', 'like', '%' . $search . '%')->paginate(5);
        $totalStudents = students::count();

    return view('admin.students.index', compact('student', 'totalStudents'));
    }   

    public function dash() 
    {
        $userIdLogin = Auth::id();
        $rayonName = Auth::user()->name;
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');
        $totalSswPs = students::with('rayons')->whereHas('rayons', function ($query) use ($rayonName) {
            $query->where('rayon', $rayonName);
        })->count();

        // Calculate the count of late records for today
        $today = Carbon::today()->toDateString();
        $totalKeterlambatanHariIni = Lates::whereHas('students.rayons', function ($query) use ($rayonName) {
            $query->where('rayon', $rayonName);
        })->whereDate('date_time_late', $today)->count();

        return view('pembimbing.dash', compact('rayonIdLogin', 'totalSswPs', 'totalKeterlambatanHariIni'));
    }



    public function siswa(Request $request)
    {
        $rayonName = Auth::user()->name;
        $siswa = students::with('rayons')->whereHas('rayons', function ($query) use ($rayonName) {
            $query->where('rayon', $rayonName);
        })->simplePaginate(5);

        return view('pembimbing.siswa', compact('siswa'));
    }

    public function searchPs(Request $request)
    {
        $rayonName = Auth::user()->name;
        $search = $request->get('search');

        $siswa = students::with('rayons')
            ->whereHas('rayons', function ($query) use ($rayonName) {
                $query->where('rayon', $rayonName);
            })
            ->where('nis', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pembimbing.siswa', compact('siswa'));
    }

}
