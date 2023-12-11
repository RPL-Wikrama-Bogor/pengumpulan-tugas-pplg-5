<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/login-auth', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware('IsLogin')->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get(
        '/logout',
        [UserController::class, 'logout']
    )->name('logout');
    //prefix awalan semua path ur; yang ada di dalam groupnya nanti ketika diakses harus terlebih dahulu diawali dengan path prefix
    //name : awalan value name route yang ada di dalam group
    //group : mengelompokan route yang memiliki akses data modifikasi yg sama 
    route::middleware('IsAdmin')->group(function () {
        route::prefix('medicine')->name('medicine.')->group(function () {
            route::get('/create', [MedicineController::class, 'create'])->name('create');
            route::post('/store', [MedicineController::class, 'store'])->name('store');
            route::get('/data', [MedicineController::class, 'index'])->name('index');
            route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
            route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            route::get('/stock', [MedicineController::class, 'stockData'])->name('stock');
            route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            route::patch('/update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });

        route::prefix('user')->name('user.')->group(function () {

            route::get('/index', [UserController::class, 'index'])->name('index');
            route::get('/create', [UserController::class, 'create'])->name('create');
                Route::get('/data', [OrderController::class, 'data'])->name('data');
                Route::get('/store', [OrderController::class, 'store'])->name('store');
                
            
        });

        route::prefix('order')->name('admin.order.')->group(function(){
            route::get('/data', [OrderController::class,'data'])->name('data'); 
         });
    });

    route::prefix('order')->name('admin.order.')->group(function () {
        route::get('/data', [OrderController::class, 'data'])->name('data');
        route::get('/exportexcel',[OrderController::class, 'exportExcel'])->name('exportexcel');
    });

    route::middleware('IsKasir')->group(function () {
        route::prefix('order')->name('kasir.order.')->group(function(){
           route::get('/', [OrderController::class,'index'])->name('index'); 
           route::get('/create', [OrderController::class,'create'])->name('create'); 
           route::post('/store', [OrderController::class,'store'])->name('store'); 
           route::get('/print/{id}', [OrderController::class,'print'])->name('print'); 
           route::get('/download/{id}', [OrderController::class,'downloadPDF'])->name('download-pdf'); 
           
        });
    });
});