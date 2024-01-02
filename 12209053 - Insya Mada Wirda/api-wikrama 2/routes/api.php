<?php

use App\Http\Controllers\CompanyPorfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('home', [CompanyPorfileController::class, 'index']);
Route::get('services', [CompanyPorfileController::class, 'services']);
Route::get('portfolio', [CompanyPorfileController::class, 'portfolio']);
Route::get('blog', [CompanyPorfileController::class, 'blog']);
Route::get('categories', [CompanyPorfileController::class, 'categories']);
Route::post('contact', [CompanyPorfileController::class, 'contact']);
