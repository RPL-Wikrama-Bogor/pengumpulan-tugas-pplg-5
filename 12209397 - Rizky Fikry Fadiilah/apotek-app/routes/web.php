<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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



Route::middleware(['IsGuest'])->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');
});
Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');
// prefix : awalan, semua path url yang ada di dalam group nya nenati ketika diakses harus terlebih dahulu dengan path prefix
// name : awalan value nama route yang ada di dalam group
// group : mengelompokkan route yang memiliki akses data modifikasi yang sama
Route::middleware('IsLogin')->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::middleware('IsAdmin')->group(function () {
        Route::prefix('medicine')->name('medicine.')->group(function () {
            // ketika path medicine/create diakses, akan ditangani oleh MedicineController bagian funs create, kemudian jika ingin menggunkajan route ini di kode nya dipanggil melalui nama medicine.create 
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/data', [MedicineController::class, 'index'])->name('index');
            // path yang ada tanda {} nya disebut dengan path parameter/path dinamnis yang isinya bakal berubah tergantung apa yang mau diambil (mengambil data spesifik), dan ketika pemanggilan nama routenya, path parameter ini wajib disiin
            Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');
            Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::get('/', [UserController::class, 'index'])->name('index');
        });
        Route::prefix('/order')->name('admin.order.')->group(function () {
            Route::get('/data', [OrderController::class, 'data'])->name('data');
            Route::get('/export-excel', [OrderController::class, 'exportExcel'])->name('export-excel');
            Route::get('/download-pdf/{id}', [OrderController::class, 'downloadPDF'])->name('download-pdf');
        });
    });
    Route::middleware('IsKasir')->group(function () {
        Route::prefix('order')->name('kasir.order.')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/print/{id}', [OrderController::class, 'print'])->name('print');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
            // Route::get('/kasir/order', [OrderController::class, 'index'])->name('.index');
        });
    });
});
