<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');


// prefix : awalan, semua path url yang ada di dalam group nya nanti ketika diakses harus terlebih dahulu diawali dengan path prefix
// name : awalan value name route yg ada di dalam group
// group : mengelompokkan route yang memiliki akses data modifikasi yg sama

Route::middleware('IsLogin')->group(function() {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
    
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('IsAdmin')->group(function() {

        Route::prefix('medicine')->name('medicine.')->group(function() {
            // ketika path /medicine/create diakses, akan ditangani oleh MedicineController bagian func create, kemudian jika inign menggunakan route ini di kodenya dipanggil melalui name medicine.create
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/data', [MedicineController::class, 'index'])->name('index');
            // path yang ada tanda {} nya disebut dengan path parameter/path dinamis yang isinya bakal berubah ubah tergantung apa yang mau diambil (mengambil data spesifik), dan ketiak pemanggilan name routenya, path parameter ini wajib diisi
            Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');
            Route::get('/show/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });
        
        Route::prefix('user')->name('user.')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
        
        });

        Route::prefix('/order')->name('admin.order.')->group(function () {
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
            Route::get('/download-admin/{id}', [OrderController::class, 'downloadPDF'])->name('download');
            Route::get('/admin/order', [OrderController::class, 'search'])->name('search');
        });
    });
        Route::middleware('IsKasir')->group(function () {
            Route::prefix('order')->name('kasir.order.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');

        });
    });
});
