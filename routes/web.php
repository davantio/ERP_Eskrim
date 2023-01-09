<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BOMController;
use App\Http\Controllers\MoController;
use App\Http\Controllers\RfqController;
use App\Http\Controllers\SQController;

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
Route::get('/home/produk/cetak', [ProdukController::class, 'cetakProduk'])->name('produk-cetak');

Route::get('/home/bahan', [BahanController::class, 'index']);
Route::get('/home/bahan/tambah', [BahanController::class, 'create']);
Route::post('/home/bahan/simpan', [BahanController::class, 'store'])->name('bahan-simpan');
Route::get('/home/bahan/edit/{id}', [BahanController::class, 'edit']);
Route::put('/home/bahan/update/{id}', [BahanController::class, 'update'])->name('bahan-update');
Route::get('/home/bahan/delete/{id}', [BahanController::class, 'destroy'])->name('bahan-delete');
Route::get('/home/bahan/cetak', [BahanController::class, 'cetakBahan'])->name('bahan-cetak');

Route::get('/home/bom', [BOMController::class,'material']);
Route::get('/home/bom-input', [BOMController::class,'materialInput']);
Route::post('/home/bom-input', [BOMController::class,'upload']);
Route::get('/home/bom-input-item/{kode_bom}', [BOMController::class,'materialInputItems']);
Route::post('/home/bom-input-item', [BOMController::class,'uploadList']);
Route::get('/home/bom-delete-item/{kode_bom_list}', [BOMController::class,'deleteList']);
Route::get('/home/bom-delete/{kode_bom}', [BOMController::class,'deleteBom']);

Route::get('/home/mo', [MoController::class,'manufacture']);
Route::get('/home/mo-input', [MoController::class,'manufactureOrder']);
Route::post('/home/mo-input', [MoController::class,'moUpload']);
Route::put('/home/mo/update/{kode_mo}', [MoController::class,'moUpdate']);
// Route::put('/home/mo/confirm/{kode_mo}', [MoController::class,'moConfirm']);
Route::get('/home/mo-ca/{kode_bom}', [MoController::class,'caItems']);
Route::get('/home/mo-delete/{kode_mo}', [MoController::class,'deleteMo']);

Route::get('/home/rfq', [RfqController::class,'rfq']);
Route::get('/home/rfq-input', [RfqController::class,'rfqInput']);
Route::post('/home/rfq-input', [RfqController::class,'upload']);
Route::get('/home/rfq-input-item/{kode_rfq}', [RfqController::class,'rfqInputItems']);
Route::post('/home/rfq-input-item', [RfqController::class,'rfqUploadItems']);
Route::post('/home/rfq/save', [RfqController::class,'rfqSaveItems']);
Route::post('/home/rfq/create-bill', [RfqController::class,'rfqCreateBill']);
Route::post('/home/rfq/confirm-bill', [RfqController::class,'rfqConfirmBill']);
Route::get('/home/rfq-delete-item/{kode_rfq_list}', [RfqController::class,'deleteList']);
Route::get('/home/rfq-delete/{kode_rfq}', [RfqController::class,'deleteRfq']);

Route::get('/home/sq', [SQController::class,'sq']);
Route::get('/home/so', [SQController::class,'so']);
Route::get('/home/sq-input', [SQController::class,'sqInput']);
Route::post('/home/sq-input', [SQController::class,'upload']);
Route::get('/home/sq-input-item/{kode_sq}', [SQController::class,'sqInputItems']);
Route::post('/home/sq-input-item', [SQController::class,'sqUploadItems']);
Route::get('/home/so-input-item/{kode_sq}', [SQController::class,'soInputItems']);
Route::post('/home/so-input-item', [SQController::class,'soUploadItems']);
Route::post('/home/sq/save', [SQController::class,'sqSave']);
Route::post('/home/sq/saveSo', [SQController::class,'sqSaveSo']);
Route::post('/home/sq/invoice', [SQController::class,'sqCreateInvoice']);
Route::post('/home/sq/delivery', [SQController::class,'sqDelivery']);
Route::get('/home/so-invoice/{kode_sq}', [SQController::class,'getPDF']);
Route::get('/home/sq-delete-item/{kode_sq_list}', [SQController::class,'deleteListSQ']);
Route::get('/home/sq-delete/{kode_sq}', [SQController::class,'deleteSQ']);


Route::get('/home/accounting', function () {
    return view('accounting.accounting');
});

Route::get('/home/vendor', [VendorController::class, 'index']);
Route::get('/home/vendor/tambah', [VendorController::class, 'create']);
Route::post('/home/vendor/simpan', [VendorController::class, 'store'])->name('vendor-simpan');
Route::get('/home/vendor/edit/{id}', [VendorController::class, 'edit']);
Route::put('/home/vendor/update/{id}', [VendorController::class, 'update'])->name('vendor-update');
Route::get('/home/vendor/delete/{id}', [VendorController::class, 'destroy'])->name('vendor-delete');

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