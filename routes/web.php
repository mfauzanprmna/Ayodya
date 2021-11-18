<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaivokalController;

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

Route::resource('admin/siswa', SiswaController::class);
Route::resource('admin/nilai', NilaiController::class);
Route::resource('admin/nilaivokal', NilaivokalController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/nilaipilihan', function () {
    return view('nilaipilihan');
});

Route::get('/', function () {
    return view('welcome');
});
