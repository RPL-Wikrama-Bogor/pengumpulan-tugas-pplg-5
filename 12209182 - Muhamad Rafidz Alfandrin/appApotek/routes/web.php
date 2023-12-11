<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('login');
// })->name('login');

Route::middleware('IsGuest')->group(function(){
    Route::get('/',function(){
        return view('login');
    })->name('login');
        Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::middleware('IsLogin')->group(function() {

    Route::get('/dashboard', function () {
        return view('index');
    });
    
    
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('IsAdmin')->group(function () {
        Route::prefix('medicine')->name('medicine.')->group(function() {
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/data', [MedicineController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');  
            Route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');  
            Route::get('/show/{id}', [MedicineController::class, 'show'])->name('show'); 
            Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });
        Route::prefix('user')->name('user.')->group(function() {
            Route::get('/indexUser', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');  
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
        });

        Route::prefix('order')->name('admin.order.')->group(function() {
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-Excel');
            Route::get('/search', [OrderController::class, 'data'])->name('search');
        });
    });
    Route::middleware('IsKasir')->group(function(){
        Route::prefix('order')->name('kasir.order.')->group(function() {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
            Route::get('/search-kasir', [OrderController::class, 'search'])->name('search');
        });
    });
});
 

