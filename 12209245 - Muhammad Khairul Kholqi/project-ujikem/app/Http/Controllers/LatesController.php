<?php

namespace App\Http\Controllers;

use App\Models\lates;
use Illuminate\Http\Request;
use App\Models\students;
use App\Models\rayons;
use App\Models\User;
use Excel;
use PDF;
use App\Exports\LatesExport;
use Illuminate\Support\Facades\Auth;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Lates::latest()->get();
        $latesJumlah = Lates::count();
        $groupLates = $lates->groupBy('students.nis');
    
        return view('admin.lates.index', compact('lates', 'latesJumlah', 'groupLates'));
    }

    public function create()
    {
        $student = students::all();
        return view('admin.lates.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',   
            'information' => 'required',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('images'), $imageName);

        lates::create([
            'student_id' => $request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah data keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($student_id)
    {
        $student = students::find($student_id);
        $lates = lates::where('student_id', $student_id)->get();
        return view('admin.lates.show', compact('student', 'lates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lates = lates::findOrFail($id);
        $student = students::all();

        return view('admin.lates.edit', compact('lates', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',   
            'information' => 'required',
            'bukti' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

        // $request->bukti->move(public_path('images'), $imageName);    


        lates::where('id', $id)->update([
            'student_id' =>$request->student_id,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah data keterlambatan!');
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function delete($id)
    {
        lates::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data!');
    }

    public function exportExcel() {
        $groupLates = lates::orderBy('created_at', 'desc')->with('students')->get()->groupBy('students.nis');
        $file_name = 'data_keterlambatan'.'.xlsx';
        return Excel::download(new LatesExport($groupLates), $file_name);
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $lates = lates::where('information', 'like', '%' . $search . '%')->paginate(5);
        $latesJumlah = lates::count();
        $groupLates = $lates->groupBy('students.nis');

        return view('admin.lates.index', compact('lates', 'latesJumlah', 'groupLates'));
    }


    public function exportPdf($student_id)
    {
        $student = students::with('rombels', 'rayons')->find($student_id);

        $lates = lates::where('student_id', $student_id)->get();
        
        // Calculate the total number of late occurrences
        $groupLates = $lates->groupBy('students.nis');
        $total = $groupLates->get($student->nis)->count();

        $pdf = PDF::loadView('admin.lates.pdf', compact('student', 'total'));
        $pdfFileName = 'terlambat_' . $student_id . '.pdf';

        // Mendownload file PDF langsung
        return $pdf->download($pdfFileName);
    }

    public function telat(Request $request)
    {
        $rayonName = Auth::user()->name;
        $latesPs = lates::with(['students', 'rayons'])
            ->whereHas('students.rayons', function ($query) use ($rayonName) {
                $query->where('rayon', $rayonName);
            })
            ->get();
        $groupTelat = $latesPs->groupBy('students.nis');

        return view('pembimbing.telat', compact('latesPs', 'groupTelat'));
    }

    public function telatExcel()
    {
        $rayonName = Auth::user()->name;
        $telatPs = lates::with(['students', 'rayons'])->whereHas('students.rayons', function ($query) use ($rayonName) {
            $query->where('rayon', $rayonName);
        })->get();

        $groupTelat = $telatPs->groupBy('students.nis');
        $file_name = 'data_telat' . '.xlsx';

        return Excel::download(new LatesExport($groupTelat), $file_name);
    }

    public function searchTelat(Request $request)
    {
        $rayonName = Auth::user()->name;
        $search = $request->get('search');

        $siswa = students::with('rayons')
            ->whereHas('rayons', function ($query) use ($rayonName) {
                $query->where('rayon', $rayonName);
            })
            ->where('nis', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pembimbing.telat', compact('siswa'));
    }

    public function showTelat($student_id)
    {
        $student = students::find($student_id);
        $lates = lates::where('student_id', $student_id)->get();

        return view('pembimbing.show', compact('student', 'lates'));
    }

    public function exportPsPdf($student_id)
        {
            $student = students::with('rombels', 'rayons')->find($student_id);

            $lates = lates::where('student_id', $student_id)->get();
            
            // Calculate the total number of late occurrences
            $groupLates = $lates->groupBy('students.nis');
            $total = $groupLates->get($student->nis)->count();

            $pdf = PDF::loadView('admin.lates.pdf', compact('student', 'total'));
            $pdfFileName = 'terlambat_' . $student_id . '.pdf';

            // Mendownload file PDF langsung
            return $pdf->download($pdfFileName);
        }
}
