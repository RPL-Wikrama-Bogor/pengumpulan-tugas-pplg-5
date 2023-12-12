<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\obatsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/cari',[OrderController::class,'search']);
Route::post('/cari-kasir',[OrderController::class,'search_kasir']);
Route::middleware(['auth','IsAdmin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tambah',[obatsController::class,'tambah'] );
    Route::post('/create',[obatsController::class,'create'] );
    Route::get('/tampil',[obatsController::class,'tampil'] );
    Route::get('/editobat/{id}',[obatsController::class,'edit'] );
    Route::get('/hapus/{id}',[obatsController::class,'hapus'] );
    Route::delete('/obat-destroy/{id}',[obatsController::class,'destroy'] );
    Route::patch('/editobat/update/{id}',[obatsController::class,'update'] );
    Route::patch('/editobat/update/{id}',[obatsController::class,'update'] );
    Route::get('/kelolaakun',[UserController::class,'index'] )->name('kelolaakun');
    Route::delete('/hapus/akun/{id}',[UserController::class,'destroy'] );
    Route::get('/akun/edit/{id}',[UserController::class,'edit'] );
    Route::patch('/akun/edit/user/update/{id}',[UserController::class,'update'] );
});


Route::middleware(['IsAdmin'])->group(function () {
Route::prefix('order')->name('admin.order.')->group(function () {
    Route::get('/data',[OrderController::class,'data'])->name('data');
    Route::get('/data-export',[OrderController::class,'export'])->name('export');
    Route::get('/down/{id}',[OrderController::class,'dowloadPDFadmin'])->name('monye');

});
});

Route::middleware('IsKasir')->group(function () {
    Route::prefix('order')->name('kasir.order.')->group(function () {
        Route::get('/',[OrderController::class,'index'])->name('index');
        Route::get('/create',[OrderController::class,'create'])->name('create');
        Route::post('/store',[OrderController::class,'store'])->name('store');
        Route::get('/print/{id}',[OrderController::class,'print'])->name('print');
        Route::get('/download/{id}',[OrderController::class,'dowloadPDF'])->name('download-pdf');
    });
});


require __DIR__.'/auth.php';
