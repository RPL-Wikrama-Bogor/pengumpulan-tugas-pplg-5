<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\http\controllers\UserController;
use App\http\controllers\OrderController;
use App\http\Controllers\Controller;
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
})->name('login');
Route::post('/login-auth', [UserController::class,'loginAuth'])->name('login-auth');

//prefix awalan semua path url yang ada di dalam groupnya nanti ketika diakses harus terlebih dahulu diawali dengan path prefix
//name awalan value name route yang ada di dalam group
//group mengelompokan route yang memiliki akses data modifikasi yang sama
Route::middleware('isLogin')->group(function(){
Route::get('/dashboard', function () {
    return view('index');
});

Route::middleware('isAdmin')->group(function(){
route::prefix('medicine')->name('medicine.')->group(function(){
    //ketika path /medicine/create diakses ,akan ditangani oleh MedicineController bagian func create,kemudian jika ingin menggunakan route ini di kode nya dipanggil melalu name medicine.create 
    route::get('/create', [MedicineController::class,'create'])->name('create');
    route::post('/store', [MedicineController::class,'store'])->name('store');
    route::get('/data', [MedicineController::class,'index'])->name('index');
    //path yg ada tanda () nya disebut dengan path parameter/path dinamis yang isinya bakal berubah2 tergantung apa yang mau diambil (mengambil data spesifik),dan ketika pemanggilan name routenya path parameter ini wajib diisi 
    route::get('/edit/{id}', [MedicineController::class,'edit'])->name('edit');
    route::patch('/update/{id}', [MedicineController::class,'update'])->name('update');
    route::delete('/delete/{id}', [MedicineController::class,'destroy'])->name('delete');
    route::get('stock', [MedicineController::class,'stockData'])->name('stock');
    route::get('/{id}', [MedicineController::class,'show'])->name('show');
    route::patch('/update/stock/{id}', [MedicineController::class,'updatestock'])->name('stock.update');
    // Route::get('/', function () {
    //     return view('index');
    // });
});

route::prefix('akun')->name('akun.')->group(function(){
    route::get('/index', [UserController::class,'index'])->name('index');
    route::get('/create', [UserController::class,'create'])->name('create');
    route::post('/store', [UserController::class,'store'])->name('store');
});
route::prefix('order')->name('admin.order.')->group(function(){
    route::get('/data',[OrderController::class,'data'])->name('data');
    route::get('/exportexcel',[OrderController::class,'exportExcel'])->name('exportexcel');
});
});
Route::get('/logout', [UserController::class,'logout'])->name('logout');
route::prefix('views')->name('views.')->group(function(){

    route::get('/index', [Controller::class,'index'])->name('index');
    
});
route::middleware('isKasir')->group(function(){
route::prefix('order')->name('kasir.order.')->group(function(){
    route::get('/',[OrderController::class,'index'])->name('index');
    route::get('create',[OrderController::class,'create'])->name('create');
    route::post('store',[OrderController::class,'store'])->name('store');
    route::get('/print/{id}',[OrderController::class,'print'])->name('print');
    route::get('/download/{id}',[OrderController::class,'download'])->name('download');
    // Route::get('/', function () {
    //     return view('index');
    // });
});
});
});

