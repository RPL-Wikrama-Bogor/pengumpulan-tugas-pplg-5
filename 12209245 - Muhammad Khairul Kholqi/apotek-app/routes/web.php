<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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


Route::get('/', function() {
    return view('login');
})->name('login')->middleware('guest');

Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');

// prefix: awalan, semua path url yang ada di dalam groupnya nnti ketika di akses harus terlebih dahulu di awali dengan ptah prefix
// name: awalan value nama route yang ada di dalam group
// group: mengelompokan raoute yang memiliki akses data modifikasi yang sama

Route::middleware('IsLogin')->group(function() {
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('index');
});
Route::middleware('IsAdmin')->group(function() {
Route::prefix('medicine')->name('medicine.')->group(function() {
    // ketika path /medicine/create diakses, akan ditangani oleh MedicineController bagian func create, kemudia jika ingin route ini di kodenya dipanggil melalui name medicine.create
    Route::get('/create', [MedicineController::class, 'create'])->name('create');
    Route::post('/store', [MedicineController::class, 'store'])->name('store');
    Route::get('/data', [MedicineController::class, 'index'])->name('index');
    // path yg ada tanda {} nya di sebut dengan path dinamis yg isinya bakal berubah tergantung apa yang mau di ambil (mengambil data spesifik), dan kerika pemanggilan name routenya, path parameter ini wajib diisi
    Route::get('/edit{id}', [MedicineController::class, 'edit'])->name('edit');
    Route::patch('/update{id}', [MedicineController::class, 'update'])->name('update');
    Route::delete('/delete{id}', [MedicineController::class, 'destroy'])->name('delete'); 
    Route::get('/stock', [MedicineController::class, 'stockData'])->name('stocks'); 
    Route::get('/{id}', [MedicineController::class, 'show'])->name('show'); 
    Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update'); 
});
Route::prefix('user')->name('user.')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('index'); 
    Route::get('/create', [UserController::class, 'create'])->name('create'); 
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/data', [UserController::class, 'index'])->name('request');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});
Route::prefix('/order')->name('admin.order.')->group(function() {
    Route::get('/data', [OrderController::class, 'data'])->name('data');
    Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
    Route::get('/searchAdmin', [OrderController::class, 'searchAdmin'])->name('searchAdmin');
    Route::get('/downloadPDFAdmin/{id}', [OrderController::class, 'downloadPDFAdmin'])->name('downloadPDFAdmin');
});
});
Route::middleware('IsKasir')->group(function() {
    Route::prefix('order')->name('kasir.order.')->group(function() {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
    Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
    Route::get('/search', [OrderController::class, 'search'])->name('search');
});
});
});
    
    
    
     


