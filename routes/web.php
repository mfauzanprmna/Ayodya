<?php
use App\Http\Controllers\UndianController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaivokalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\SertifikatController;
use Illuminate\Support\Facades\Route;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\TarianController;
use App\Http\Controllers\LayoutController;

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
    Route::resource('admin/undian', UndianController::class);
    Route::resource('admin/absen', AbsenController::class);
    Route::resource('admin/nilai', NilaiController::class);
    Route::resource('admin/vokal', NilaivokalController::class);
    Route::resource('admin/tarian', TarianController::class);
    Route::resource('admin/layout', LayoutController::class);
    Route::get('/nilaipilihan', function () {
        return view('nilaipilihan');
    });

    

    Route::get('/dashboard', function () {
        return view('dashboardtampilan');
    })->name('dashboard');
});


Route::get('/dashboard/siswa', function () {
    return view('siswadashboard');
});

Route::get('/nilaipilihan', function () {
    return view('nilaipilihan');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/sertifikat', [SertifikatController::class, 'index']);
Route::post('/sertifikat/getSertifikat', [SertifikatController::class, 'getSertifikat'])->name('sertifikat.getSertifikat');
Route::get('/', function(){
    return view('welcome');
});
Route::get('/sertifikat/{id}', [SertifikatController::class, 'cetak_sertifikat'])->name('sertifikat.pdf');
Route::post('file-import', [SiswaController::class, 'fileImport'])->name('file-import');
require __DIR__ . '/auth.php';
