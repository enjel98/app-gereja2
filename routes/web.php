<?php

use App\Http\Controllers\Admin\PersembahanController;
use App\Http\Controllers\HomePage\PendampingFHKHomePageController;
use App\Http\Controllers\HomePage\PersembahanHomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FHKController;
use App\Http\Controllers\Admin\PendampingFHKController;
use App\Models\Admin\FHK;
use App\Http\Controllers\HomePage\FhkHomePageController;

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

Route::get('/', function () {
    return view('layout.index');
})->name('beranda');



/*Rute Home Page*/
Route::get('/fhk', [FhkHomePageController::class, 'index'])->name('home-page.fhk');
Route::get('pendamping-fhk', [PendampingFHKHomePageController::class, 'index'])-> name('home-page.pendamping-fhk');
Route::get('persembahan-pelayanan', [PersembahanHomePageController::class, 'index'])-> name('home-page.persembahan-pelayanan');

Route::get('/login', function () {
    return view('auth.login');
});
/*End Rute Home Page*/

/*Rute Admin*/
Route::get('/admin', function () {
    return view('admin.dashboard.index');
})->name('dashboard.index');

Route::prefix('admin')->group(function () {
    Route::prefix('fhk')->group(function () {
        Route::get('/', [FHKController::class, 'index'])->name('fhk.index');
        Route::get('/tambah', [FHKController::class, 'tambah'])->name('fhk.tambah');
        Route::post('/proses-tambah', [FHKController::class, 'prosesTambah'])->name('fhk.proses-tambah');
        Route::get('/edit/{id}', [FHKController::class, 'edit'])->name('fhk.edit');
        Route::post('/proses-ubah/{id}', [FHKController::class, 'prosesUbah'])->name('fhk.proses-ubah');
        Route::delete('/delete/{id}', [FHKController::class, 'delete'])->name('fhk.delete');
    });
    Route::prefix('pendamping-fhk')->group(function () {
        Route::get('/', [PendampingFHKController::class, 'index'])->name('pendamping-fhk.index');
        Route::get('/tambah', [PendampingFHKController::class, 'tambah'])->name('pendamping-fhk.tambah');
        Route::post('/proses-tambah', [PendampingFHKController::class, 'prosesTambah'])->name('pendamping-fhk.proses-tambah');
        Route::get('/edit/{id}', [PendampingFHKController::class, 'edit'])->name('pendamping-fhk.edit');
        Route::post('/proses-ubah/{id}', [PendampingFHKController::class, 'prosesUbah'])->name('pendamping-fhk.proses-ubah');
        Route::delete('/delete/{id}', [PendampingFHKController::class, 'delete'])->name('pendamping-fhk.delete');
    });
    Route::prefix('persembahans')->group(function () {
        Route::get('/', [PersembahanController::class, 'index'])->name('persembahan.index');
        Route::get('/tambah', [PersembahanController::class, 'tambah'])->name('persembahan.tambah');
        Route::post('/proses-tambah', [PersembahanController::class, 'prosesTambah'])->name('persembahan.proses-tambah');
        Route::get('/edit/{id}', [PersembahanController::class, 'edit'])->name('persembahan.edit');
        Route::post('/proses-ubah/{id}', [PersembahanController::class, 'prosesUbah'])->name('persembahan.prosesUbah');
        Route::delete('/delete/{id}', [PersembahanController::class, 'delete'])->name('persembahan.delete');
        Route::patch('/toggle-featured/{id}', [PersembahanController::class, 'toggleFeatured'])->name('persembahan.toggleFeatured');

    });
});
