<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::get('/', function (){
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login-auth', [UserController::class , 'loginAuth'])->name('login.auth');



//prefix : awalan, semua path url yang ada di dalam grup nya nanti
Route::middleware('IsLogin')->group(function (){


Route::get('/dashborad', function () {
    return view('index');
});
Route::get('/logout', [UserController::class , 'logout'])->name('logout');
Route::middleware("IsAdmin")->group(function(){

Route::prefix('medicine/')->name('medicine.')->group(function(){
    Route::get('create',[MedicineController::class, 'create'])->name('create');
    Route::post('store', [MedicineController::class,'store'])->name('store');
    Route::get('data',[MedicineController::class, 'index'])->name('index');
    // path yg ada di {} nya di sebut dengan path parameter/path di namis yang siinya bakal berupa2 tergantung apa yang mau diambil (mengambil data spesifik),dan ketika memangilan name routenya, path parameter ini wajib di isi 
    Route::get('edit/{id}',[MedicineController::class, 'edit'])->name('edit');
    Route::patch('update/{id}',[MedicineController::class, 'update'])->name('update');
    Route::delete('delete/{id}',[MedicineController::class, 'destroy'])->name('delete');
    Route::get('stock',[MedicineController::class, 'stockData'])->name('stock');
    Route::get('{id}',[MedicineController::class, 'show'])->name('show');
    Route::patch('/update/stock/{id}',[MedicineController::class, 'updateStock'])->name('stock.update');

});

Route::prefix('user/')->name('user.')->group(function(){
    Route::get('/',[UserController::class, 'index'])->name('index');
    Route::get('create',[UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class,'store'])->name('store');
    Route::get('data',[UserController::class, 'index'])->name('index');
    Route::get('edit/{id}',[UserController::class, 'edit'])->name('edit');
    Route::patch('update/{id}',[UserController::class, 'update'])->name('update');
    Route::delete('delete/{id}',[UserController::class, 'destroy'])->name('delete');
   
   

    });
Route::prefix('/order')->name('admin.order.')->group(function(){
    Route::get('/data',[OrderController::class, 'data'])->name('data');
    Route::get('/export-excel',[OrderController::class, 'exportExcel'])->name('export-excel');
    Route::get('/searchadmin', [OrderController::class, 'searchadmin'])->name('searchadmin');
    Route::get('/downloadPDFadmin/{id}',[OrderController::class, 'downloadPDFadmin'])->name('download');
    });
});
Route::middleware("IsKasir")->group(function(){
    //routing yang ada crud itu mengunakan prefix untuk menglompokan nya
    Route::prefix('/order')->name('kasir.order.')->group(function(){
        Route::get('/',[OrderController::class, 'index'])->name('index');
        Route::get('/create',[OrderController::class, 'create'])->name('create');
        Route::post('/store',[OrderController::class, 'store'])->name('store');
        Route::get('/print/{id}',[OrderController::class, 'print'])->name('print');
        Route::get('/download/{id}',[OrderController::class, 'downloadPDF'])->name('download');
        Route::get('/search', [OrderController::class, 'search'])->name('search');



    });

});
});

