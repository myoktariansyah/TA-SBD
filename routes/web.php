<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KandangController;
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
Route::get("/", [LoginController::class, 'showLoginForm'])->name('login');
Route::get('riwayat', [ProdukController::class, 'join'])->name('join');

Route::get('/', [AdminController::class, 'index'])->name('hewan.index');
Route::get('add', [AdminController::class, 'create'])->name('hewan.create');
Route::post('store', [AdminController::class, 'store'])->name('hewan.store');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('hewan.edit');
Route::get('trash', [AdminController::class, 'trash'])->name('hewan.trash');
Route::get('restore/{$id}', [AdminController::class, 'restore'])->name('hewan.restore');
Route::post('update/{id}', [AdminController::class, 'update'])->name('hewan.update');
Route::post('delete/{id}', [AdminController::class, 'delete'])->name('hewan.delete');
Route::post('softdelete/{id}', [AdminController::class, 'softdelete'])->name('hewan.softdelete');

Route::get('kandang', [KandangController::class, 'kandang'])->name('hewan.kandang');
Route::get('addkandang', [KandangController::class, 'createkandang'])->name('hewan.createkandang');
Route::post('storekandang', [KandangController::class, 'storekandang'])->name('hewan.storekandang');
Route::get('editkandang/{id}', [KandangController::class, 'editkandang'])->name('hewan.editkandang');
Route::post('updatekandang/{id}', [KandangController::class, 'updatekandang'])->name('hewan.updatekandang');
Route::post('deletekandang/{id}', [KandangController::class, 'deletekandang'])->name('hewan.deletekandang');

Route::get('pakan', [PakanController::class, 'pakan'])->name('hewan.pakan');
Route::get('addpakan', [PakanController::class, 'createpakan'])->name('hewan.createpakan');
Route::post('storepakan', [PakanController::class, 'storepakan'])->name('hewan.storepakan');
Route::get('editpakan/{id}', [PakanController::class, 'editpakan'])->name('hewan.editpakan');
Route::post('updatepakan/{id}', [PakanController::class, 'updatepakan'])->name('hewan.updatepakan');
Route::post('deletepakan/{id}', [PakanController::class, 'deletepakan'])->name('hewan.deletepakan');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
