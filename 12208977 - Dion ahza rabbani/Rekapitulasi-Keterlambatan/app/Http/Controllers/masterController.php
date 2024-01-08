<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\lates;
use App\models\rayons;
use App\models\rombels;
use App\models\students;
use App\models\user;

class masterController extends Controller
{
    public function dashboard(){
        
        $jumlahPembimbingsiswa = User::where('role','ps')->count();
        $jumlahPesertaDidik = students::count('id');
        $jumlahAdministrator = User::where('role','admin')->count();
        $jumlahRombel = Rombels::count();
        $jumlahRayon = Rayons::count();

        return view('index',[ "image"=>'user.svg',"flag"=>'flag.svg'], compact(
            'jumlahPembimbingsiswa',
            'jumlahPesertaDidik',
            'jumlahAdministrator',
            'jumlahRombel',
            'jumlahRayon'
        ));
    }
   
    
   


}
