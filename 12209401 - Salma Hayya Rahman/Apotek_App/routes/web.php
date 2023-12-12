<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsGuest'])->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('IsLogin')->group(function () {
    Route::get('/index', function () {
        return view('index');
    })->name('index.page');

    Route::prefix('medicine')->name('medicine.')->group(function () {
        // Medicine routes accessible to non-kasir users
        Route::middleware(['IsLogin', 'IsAdmin'])->group(function () {
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/data', [MedicineController::class, 'index'])->name('index');
            Route::get('/edit{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/delete{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');
            Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/update{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/order')->name('admin.order.')->group(function () {
        Route::get('/data', [OrderController::class, 'index'])->name('data');
        Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-Excel');
        Route::get('/search', [OrderController::class, 'index'])->name('search');
        Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
    });
});

Route::middleware(['IsLogin', 'IsKasir'])->group(function () {
    Route::prefix('/kasir')->name('kasir.')->group(function () {
        Route::prefix('/order')->name('order.')->group(function () {
            Route::get('/', [OrderController::class, 'data'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
            Route::get('/search', [OrderController::class, 'data'])->name('search');
        });
    });
});