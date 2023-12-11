<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Exports\OrdersExport;


Route::middleware(['IsGuest'])->group(function(){

    Route::get('/', function () {
        return view('login');
    })->name("login");
    Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');
    });


Route::middleware('IsLogin')->group(function() {
    Route::get('/dashboard', function () {
        return view('home.index');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::middleware('IsAdmin')->group(function() {
        Route::prefix('medicine')->name('medicine.')->group(function()
        {
            // ketika path /medicine/create diakses ,akan ditangani oleh Medicinecontroller bagian func create,
            // kemudian jika ingin menggunakan route ini di kode ya dipanggil memlalui name medicine.create
            Route::get('/create',[MedicineController::class, 'create'])->name('create');
            Route::post('/store',[MedicineController::class, 'store'])->name('store');
            Route::get('/data',[MedicineController::class, 'index'])->name('index');
            //path yg ad tanda {} nay disebut dengan path paramater/path dinamis yg isinya bakal berubah2 tergantung apa yang mau diambil
            // (mengaambil data spesifik) dan ketika pemanggilan name routnya,path parameter ini wajib diisi
            Route::get('/edit/{id}',[MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}',[MedicineController::class,'update'])->name('update');
            Route::delete('/delete/{id}',[MedicineController::class,'destroy'])->name('delete');
            Route::get('/stockData',[MedicineController::class,'stockData'])->name('stock');
            Route::get('/{id}',[MedicineController::class, 'show'])->name('show');
            Route::patch('/update/stock/{id}',[MedicineController::class,'updateStock'])->name('stock.update');
            // Route::get('/search', [OrderController::class, 'search2'])->name('search');
            
        
        
        });

        Route::prefix('user')->name('user.')->group(function()
            {
            Route::get('/create',[UserController::class, 'create'])->name('create');
            Route::post('/store',[UserController::class, 'store'])->name('store');
            Route::get('/data',[UserController::class, 'index'])->name('index');
            Route::get('/edit/{id}',[UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}',[UserController::class,'update'])->name('update');
            Route::delete('/delete/{id}',[UserController::class,'destroy'])->name('delete');
        
        
        
        
        
        });
        Route::prefix('/order')->name('admin.order.')->group(function(){
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/excel-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
            Route::get('/admin/search', [OrderController::class, 'search2'])->name('search2');
        });
    });
    Route::middleware('IsKasir')->group(function(){
        Route::prefix('order')->name('cashier.order.')->group(function(){
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class,'create'])->name('create');
            Route::post('/store', [OrderController::class,'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class,'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class,'downloadPDF'])->name('download-pdf');
            Route::get('/kasir/search', [OrderController::class, 'search'])->name('search');
        });
    });
});


// prefix:awalan,semua path url yang ada di dalam group nya nanti ketika diakses harus terlebiih dahulu diawali dengan path prefix
// name: awalan value name route yang memiliki akses data modifikasi yang sama 
// group: mengelompokan rote yang memiliki akses data modifikasi yang sama 