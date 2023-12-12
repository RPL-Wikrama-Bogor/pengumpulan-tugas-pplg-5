<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use App\Models\obat;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\pagination;

class ObatsController extends Controller
{
    public function tambah(){
        return view("tambah");
    }
    public function create(request $request){
        
    $obat = obat::create($request->all());

if ($obat){
     session::flash('success', 'Operasi berhasil!');
    session::flash('pesan_error', 'Ada kesalahan.');
    return redirect('tambah');
}


    }

    public function tampil(){

        $obat = obat::paginate(5);
       

        return view("tampil",['data' => $obat]);
    }
    public function hapus($id){

        $obat = obat::findorfail($id);
       

        return view("hapus",['data' => $obat]);
    }
    public function destroy($id){

        $obat = obat::findorfail($id);
        $obat->delete();
         if ($obat) {
            session::flash('delete','berhasil');
            session::flash('error','gagal');
          return redirect('tampil');
         }

    }
    public function edit($id){

        $obat = obat::findorfail($id);
return view("edit",['data' => $obat]);
    }
    public function update($id,Request $req){
        $obat = obat::findorfail($id);
        $obat -> update($req->all());
        if($obat){
            session::flash('edit','berhasil');
            session::flash('error','gagal');
            return redirect('tampil');
        }
    }

}