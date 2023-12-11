<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Menghubungkan ke login

Route::middleware('IsGuest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware('IsLogin')->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('index');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('IsAdmin')->group(function () {
        Route::prefix('medicine')->name('medicine.')->group(function () {
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/data', [MedicineController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/edit/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');
            Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
           
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('index');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });

        //Pembelian di admin
        Route::prefix('/order')->name('admin.order.')->group(function () {
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
            Route::get('/download-admin/{id}', [OrderController::class, 'downloadPDF'])->name('download-pdf');
            Route::get('/searchadmin', [OrderController::class, 'searchadmin'])->name('searchadmin');
        });
    });
    Route::middleware('IsKasir')->group(function () {
        Route::prefix('order')->name('kasir.order.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download-pdf');
            Route::get('/search', [OrderController::class, 'search'])->name('search');

        });
    });
});

// Menghubungkan ke pembelian
// Prefix : awalan, semua path URL yang ada di dalam grupnya nanti ketika diakses harus terlebih dahulu diawali dengan path prefix
// Name : awalan value name route yang ada di dalam grup
// Group : mengelompokkan route yang memiliki akses data modifikasi yang sama
