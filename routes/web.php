<?php

use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaivokalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\SertifikatController;
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

Route::middleware(['auth:user'])->group(function () {
    Route::resource('admin/siswa', SiswaController::class);
    Route::resource('admin/absen', AbsenController::class);
    Route::resource('admin/nilai', NilaiController::class);
    Route::resource('admin/nilaivokal', NilaivokalController::class);
    Route::get('/nilaipilihan', function () {
        return view('nilaipilihan');
    });

    

    Route::get('/dashboard', function () {
        return view('nilaipilihan');
    })->name('dashboard');
});

Route::get('/siswadashboard', function () {
    return view('siswadashboard');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/sertifikat', [SertifikatController::class, 'index']);
Route::post('/sertifikat/getSertifikat', [SertifikatController::class, 'getSertifikat'])->name('sertifikat.getSertifikat');
Route::get('/', function(){
    return view('template.app');
});
require __DIR__ . '/auth.php';
