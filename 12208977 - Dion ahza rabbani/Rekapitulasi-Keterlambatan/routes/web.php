<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rombelController;
use App\Http\Controllers\userController;
use App\Http\Controllers\lateController;
use App\Http\Controllers\rayonController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\masterController;
// use App\Http\Controllers\

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/dashboard',[masterController::class,'dashboard'])->name('dashboard');


// 
Route::post('/login',[userController::class,'login'])->name('login');
Route::middleware('isAdmin')->group(function(){

Route::prefix('rombels')->name('rombels.')->group(function(){
    Route::get('/index',[rombelController::class,'index'])->name('index');
    Route::get('/create',[rombelController::class,'create'])->name('create');
    Route::post('/store',[rombelController::class,'store'])->name('store');
    Route::get('/edit/{id}',[rombelController::class,'edit'])->name('edit');
    Route::patch('/update/{id}',[rombelController::class,'update'])->name('update');
    Route::get('/hapus/{id}',[rombelController::class,'hapus'])->name('hapus');
    

});
Route::prefix('terlambat')->name('terlambat.')->group(function(){
    Route::post('/store',[lateController::class,'store'])->name('store');
    Route::get('/create',[lateController::class,'create'])->name('create');
    Route::get('/telat',[lateController::class,'telat'])->name('telat');
    Route::get('/cetak',[lateController::class,'cetak'])->name('cetak');
    Route::get('/download/{id}',[lateController::class,'download'])->name('download');
    Route::get('/hapus/{id}',[lateController::class,'hapus'])->name('hapus');
    Route::get('/rekaptulasi',[lateController::class,'rekaptulasi'])->name('rekaptulasi');
});
Route::prefix('user')->name('user.')->group(function(){
        Route::get('/akun',[userController::class,'akun'])->name('akun');
        Route::get('/hapus/{id}',[userController::class,'hapus'])->name('hapus');
        Route::patch('/update/{id}',[userController::class,'update'])->name('update');
        Route::get('/edit/{id}',[userController::class,'edit'])->name('edit');
        Route::get('/create',[userController::class,'create'])->name('create');
        Route::post('/store',[userController::class,'store'])->name('store');
});
Route::prefix('rayons')->name('rayons.')->group(function(){
    Route::get('/index',[rayonController::class,'index'])->name('index');
    Route::get('/create',[rayonController::class,'create'])->name('create');
    Route::post('/store',[rayonController::class,'store'])->name('store');
    Route::get('/edit/{id}',[rayonController::class,'edit'])->name('edit');
    Route::patch('/update/{id}',[rayonController::class,'update'])->name('update');
    Route::get('/hapus/{id}',[rayonController::class,'hapus'])->name('hapus');

});
Route::prefix('siswa')->name('siswa.')->group(function(){
    Route::get('/index',[siswaController::class,'index'])->name('index');
    Route::get('/create',[siswaController::class,'create'])->name('create');
    Route::post('/store',[siswaController::class,'store'])->name('store');
    Route::get('/hapus/{id}',[siswaController::class,'hapus'])->name('hapus');
});
});

// Route::get('/')
