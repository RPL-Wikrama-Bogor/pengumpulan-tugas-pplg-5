<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;



Route::post('/', function () {
    return view('login');
})->name("login");
Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');


Route::middleware('IsLogin')->group(function() {
    Route::post('/dashboard', function () {
        return view('home.index');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('IsAdmin')->group(function(){    
    Route::prefix('medicine')->name('medicine.')->group(function()
    {
        // ketika path /medicine/create diakses ,akan ditangani oleh Medicinecontroller bagian func create,
        // kemudian jika ingin menggunakan route ini di kode ya dipanggil memlalui name medicine.create
        Route::get('/create',[MedicineController::class, 'create'])->name('create');
        Route::post('/store',[MedicineController::class, 'store'])->name('store');
        Route::post('/data',[MedicineController::class, 'index'])->name('index');
        //path yg ad tanda {} nay disebut dengan path paramater/path dinamis yg isinya bakal berubah2 tergantung apa yang mau diambil
        // (mengaambil data spesifik) dan ketika pemanggilan name routnya,path parameter ini wajib diisi
        Route::get('/edit/{id}',[MedicineController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}',[MedicineController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[MedicineController::class,'destroy'])->name('delete');
        Route::get('/stockData',[MedicineController::class,'stockData'])->name('stock');
        Route::get('/{id}',[MedicineController::class, 'show'])->name('show');
        Route::patch('/update/stock/{id}',[MedicineController::class,'updateStock'])->name('stock.update');
    
    
    
    });
    Route::prefix('user')->name('user.')->group(function()
        {
        Route::get('/create',[UserController::class, 'create'])->name('create');
        Route::post('/store',[UserController::class, 'store'])->name('store');
        Route::post('/data',[UserController::class, 'index'])->name('index');
        Route::get('/edit/{id}',[UserController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}',[UserController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[UserController::class,'destroy'])->name('delete');
    
    
    
    
    
    });

    //pembelian di admin
    Route::prefix('/order')->name('order')->group(function(){
        Route::get('/data', [OrderController::class, 'data'])->name('data');
    });
});
    Route::middleware('IsKasir')->group(function(){
        Route::prefix('order')->name('kasir.order.')->group(function(){
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('store', [OrderController::class, 'store'])->name('stored');
            Route::get('/print/ id', [OrderController::class, 'print'])->name('print');


        });
    });
});

// prefix:awalan,semua path url yang ada di dalam group nya nanti ketika diakses harus terlebiih dahulu diawali dengan path prefix
// name: awalan value name route yang memiliki akses data modifikasi yang sama 
// group: mengelompokan rote yang memiliki akses data modifikasi yang sama