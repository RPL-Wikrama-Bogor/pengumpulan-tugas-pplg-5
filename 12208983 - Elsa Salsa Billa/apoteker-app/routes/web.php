<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('IsGuest')->group(function() {

    Route::get('/', function () {
        return view('login');
    })->name('login');
    Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');
});
Route::middleware('IsLogin')->group(function() {
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::middleware('IsAdmin')->group(function() {
        Route::prefix('medicine')->name('medicine.')->group(function() {
            //ketika path /medicine/create diakses, akan ditangani oleh MedicineController bagian func create, kemudian jika ingin menggunakan
            //route ini dikode nya dipanggil melalui name medicine.create
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/data', [MedicineController::class, 'index'])->name('index');
            // path yg ada tanda {} nya disebut parameter/path dinamis yg isinya bakal berubah2 tergantung apa yg mau diambil
            // (mengambil data spesifik), dan ketika pemanggilan name routenya, path parameter ini wajib diisi
            Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
            // patch/put -> mengubah data
            Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');
            Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });
        Route::prefix('user')->name('user.')->group(function() {
            Route::get('/data', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
        });

        //pembelian di admin
        Route::prefix('order')->name('admin.order.')->group(function() {
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
            Route::get('/unduh/{id}', [OrderController::class, 'unduhPDF'])->name('unduh');
        });
    });
    Route::middleware('IsKasir')->group(function() {
        Route::prefix('order')->name('kasir.order.')->group(function() {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
            // Route::get('/search', [OrderController::class, 'search'])->name('search');
        });
    });
    
});


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


//prefix : awalan, semua path url yg ada didalam group nya nanti ketika diakses harus terlebih dahulu diawali dgn path prefix
//name : awalan value name route yg ada didalam group
//group : mengelompokkan route yg memiliki akses data modifikasi yg sama
//warna coklat : function
//prefix itu buat yg pke crud nya

