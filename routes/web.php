<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsInController;
use App\Models\Product;
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

// Route Dashboard
Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

// Route Login & Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')
->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Route Barang Masuk
Route::get('/barang_masuk', [ProductsInController::class, 'index'])
->middleware('auth');
Route::get('/barang_masuk/add', [ProductsInController::class, 'create'])
->middleware('auth');
Route::post('/barang_masuk/store', [ProductsInController::class, 'store'])
->middleware('auth');
Route::get('/barang_masuk/edit/{id}', [ProductsInController::class, 'edit'])
->middleware('auth');
Route::get('/barang_masuk/delete/{id}', [ProductsInController::class, 'destroy'])
->middleware('auth');

// Route Daftar Barang
Route::get('/daftar_barang', [ProductController::class, 'index'])->middleware('auth');
Route::get('/daftar_barang/add', [ProductController::class, 'create'])->middleware('auth');
Route::get('/daftar_barang/delete/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/daftar_barang/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::post('/daftar_barang/store', [ProductController::class, 'store'])->middleware('auth');
Route::post('/daftar_barang/update/{id}', [ProductController::class, 'update'])->middleware('auth');




