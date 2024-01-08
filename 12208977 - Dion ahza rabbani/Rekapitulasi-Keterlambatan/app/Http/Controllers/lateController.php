<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\lates;
use App\models\students;
use PDF;

class lateController extends Controller
{
    //
    public function telat(){
        $datalate = lates::all();
        return view('terlambat.index', compact('datalate'));
    }

    public function rekaptulasi(){
        $datalate = students::all();
        $jumlahdata = lates::select('name_id', \DB::raw('COUNT(*) as total'))
        ->groupBy('name_id')
        ->get();
        return view('terlambat.rekaptulasi',compact('datalate','jumlahdata'));
    }

    public function create(){
        $datasiswa = students::get('name');
      return view('terlambat.create',compact('datasiswa'));
    }

    public function store(Request $request)
    {
        //validasi
        //'name_diinput_select'=>
        $request->validate([
            'name_id' => 'required',
            'information' => 'required',
            'date_time_late' => 'required',
            'bukti' => 'required',
        ]);

        //proses mengirim data ke database
        //medicine : nama model
        //'nama column migration => request-> name diinput select

        lates::create([
            'name_id'=>$request->name_id,
            'information'=>$request->information,
            'date_time_late'=>$request->date_time_late,
            'bukti'=>$request->bukti,
            
        ]);

        //setelah berhasil diarahkan ke
        //diarahkan kembali ke halaman sblm proses ini dengan pemberitahuan session succes

        return redirect()->route('terlambat.telat')->with('success','berhasil menambahkan data!');
    }

    public function hapus($id){
        lates::where('id',$id)->delete();

        return redirect()->back()->with('hapus','data berhasil dihapus');
    }

    public function cetak(){
        $datasiswa = students::all();
        $datalate = lates::all();
        $jumlahdata = lates::select('name_id', \DB::raw('COUNT(*) as total'))->groupBy('name_id')->get();
        return view('terlambat.cetak',compact('datasiswa','jumlahdata','datalate'));
    }
    public function download(){
        $download = lates::find($id)->toArray();


        view()->share('lates',$lates);
 
        $pdf = PDF::loadView('terlambat.cetak',$download);
 
        return $pdf->download('Surat terlambat.pdf');
    }
}
