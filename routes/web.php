<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;
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

// Route::get('/', function () {
//     return view('admin.index');
// });
Route :: get("/",[LoginController::class,'showLoginForm'])->name('login');
Route::get('riwayat', [ProdukController::class, 'join'])->name('join');

Route ::prefix("pembeli")->group(function(){
Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');
Route::get('add', [PembeliController::class, 'create'])->name('pembeli.create');
Route::post('store', [PembeliController::class, 'store'])->name('pembeli.store');
Route::get('edit/{id}', [PembeliController::class, 'edit'])->name('pembeli.edit');
Route::post('update/{id}', [PembeliController::class, 'update'])->name('pembeli.update');
Route::post('delete/{id}', [PembeliController::class, 'delete'])->name('pembeli.delete');
});
Route ::prefix("produk")->group(function(){
Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
Route::get('add', [ProdukController::class, 'create'])->name('produk.create');
Route::post('store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::post('delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
Route::post('recycle/{id}', [ProdukController::class, 'recycle'])->name('produk.recycle');
Route::get('restore/{id}', [ProdukController::class, 'restore'])->name('produk.restore');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
