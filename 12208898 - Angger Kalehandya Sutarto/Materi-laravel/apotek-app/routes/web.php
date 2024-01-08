<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MedicineController;

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



Route::post('login/auth', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware('isGuest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});

Route::middleware('IsLogin')->group(function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    //prefix: awalan, semua path url yang ada di dalam groupnya nanti ketika diakses harus terlebih dahulu diawali dengan path prefix
    // name : awalan value nama route yang ada di dalam group
    // group : mengelompokkan route yang memiliki akses data modifikasi yg sama

    Route::get('/dashboard', function () {
        return view('home.index');
    });


    Route::middleware('isAdmin')->group(function () {
        Route::prefix('medicine/')->name('medicine.')->group(function () {
            // ketika path /medicine/create diakses, akan ditangani oleh MedicineController bagian func create,
            // kemudian jika ingin menggunakan route ini di kode nya dipanggil melalui name medicine.create
            Route::get('create', [MedicineController::class, 'create'])->name('create');
            Route::post('store', [MedicineController::class, 'store'])->name('store');
            Route::get('data', [MedicineController::class, 'index'])->name('index');
            // path yang ada tanda {} nya disebut path parameter/path dinamis yg isinya bakal berubah2 tergantung apa
            // yang mau diambil (mengambil data spesifik), dan ketika pemanggilan name routenya, path parameter ini wajib disii
            Route::get('edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('stock', [MedicineController::class, 'stockData'])->name('stock');
            Route::get('{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });

        Route::prefix('user/')->name('user.')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('index');
            Route::get('create', [UserController::class, 'create'])->name('create');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('edit/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('delete');
        });

        // pembelian di admin
        Route::prefix('/order')->name('admin.order.')->group(function(){
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
            Route::get('/download-adm/{id}', [OrderController::class, 'downloadPDF'])->name('download-pdf');
        });
    });

    Route::middleware('isKasir')->group(function() {
        Route::prefix('order')->name('kasir.order.')->group(function() {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create',[OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download-pdf');
        });
    });
});
