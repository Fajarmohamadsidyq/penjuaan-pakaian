<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\FrontendController;
//use App\Http\Controllers\PesanController;


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

Route::resource('/', FrontendController::class);
//Route::resource('/', PesanController::class);

Auth::routes([
'register' => true
]);



//hanya untuk admin
//Route::group(['prefix' => 'admin', 'middleware' =>['auth', 'role::admin']], function(){
//    Route::get('/', function(){
//        return 'Halaman Admin';
//    });
//    Route::get('profi', function(){
//        return 'Halaman Profil Admin';
//    });
//});
Route::get('pesan/{id}', [App\Http\Controllers\PesanController::class, 'index']);
Route::post('co/{id}', [App\Http\Controllers\PesanController::class, 'pesan']);
Route::group(['prefix' => 'admin', 'middleware' =>['auth']], function(){
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('pakaian', PakaianController::class);
Route::resource('merk', MerkController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('jenisBarang', JenisBarangController::class);
Route::resource('stok', StokController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('chart', ChartController::class);
Route::resource('penjualan', PenjualanController::class);
Route::resource('detailPembelian', DetailPembelianController::class);
Route::resource('pembayaran', PembayaranController::class);
//     Route::get('profil', function(){
//         return view('profil.index');
//     })->middleware(['role:admin|pengguna']);
//     Route::get('keranjang', function(){
//         return view('keranjang.index');
//     })->middleware(['role:admin|pengguna']);

});


// Route::group(['prefix' => 'admin', 'middleware', => ['auth']], function (){
// Route::group(['prefix'=>'admin','as'=>'account.'], function(){

// });


// });



//hanya untuk pengguna
//Route::group(['prefix' => 'pengguna', 'middleware' =>['auth', 'role::pengguna']], function(){
//    Route::get('/', function(){
//        return 'halaman pengguna';
//    });
//   Route::get('profi', function(){
//        return 'Halaman Profil Pengguna';
//    });
//});
