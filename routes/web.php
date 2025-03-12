<?php

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
});

/*Rute Home Page*/
Route::get('/fhk', [FhkHomePageController::class, 'index'])->name('home-page.fhk');

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
});
