<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembeliController;

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
    return view('welcome');
});


Route::get('/home/produk', [ProdukController::class, 'index']);
Route::get('/home/produk/tambah', [ProdukController::class, 'create']);
Route::post('/home/produk/simpan', [ProdukController::class, 'store'])->name('produk-simpan');
Route::get('/home/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::put('/home/produk/update/{id}', [ProdukController::class, 'update'])->name('produk-update');
Route::get('/home/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk-delete');

Route::get('/home/bom', function () {
    return view('bom.bom');
});

Route::get('/home/pembeli', [PembeliController::class, 'index']);
Route::get('/home/pembeli/tambah', [PembeliController::class, 'create']);
Route::post('/home/pembeli/simpan', [PembeliController::class, 'store'])->name('pembeli-simpan');
Route::get('/home/pembeli/edit/{id}', [PembeliController::class, 'edit']);
Route::put('/home/pembeli/update/{id}', [PembeliController::class, 'update'])->name('pembeli-update');
Route::get('/home/pembeli/delete/{id}', [PembeliController::class, 'destroy'])->name('pembeli-delete');

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});