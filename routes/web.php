<?php
use App\Http\Controllers\User\SiswaController;
use App\Http\Controllers\User\JuriController;
use App\Http\Controllers\User\CabangController;
use App\Http\Controllers\UndianController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaivokalController;
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
    Route::get('/dashboard', function () {
    return view('dashboardtampilan');
})->name('dashboard');

});

Route::middleware(['auth:user', 'role:admin'])->group(function () {
    Route::resource('admin/siswa', SiswaController::class);
    Route::resource('admin/juri', JuriController::class);
    Route::resource('admin/cabang', CabangController::class);
    Route::resource('admin/undian', UndianController::class);
    Route::resource('admin/absen', AbsenController::class);
    Route::resource('admin/tarian', TarianController::class);
    Route::resource('admin/layout', LayoutController::class);
    Route::get('/nilaipilihan', function () {
        return view('nilaipilihan');
    });
});

Route::middleware(['auth:user', 'role:juri,admin'])->group(function () {
    Route::resource('admin/nilai', NilaiController::class);
    Route::resource('admin/vokal', NilaivokalController::class);
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
Route::get('/sertifikat/{id}', [SertifikatController::class, 'cetak_sertifikat'])->name('sertifikat.print');
Route::get('/sertifikat/pdf/{id}', [SertifikatController::class, 'sertipdf'])->name('sertifikat.pdf');
Route::post('file-import', [SiswaController::class, 'fileImport'])->name('file-import');
Route::post('tari-import', [TarianController::class, 'fileImport'])->name('tari-import');
Route::get('/browse/tari', [NilaiController::class, 'browse'])->name('browse-tari');
Route::post('/getsiswa', [NilaiController::class, 'getSiswa'])->name('getsiswa');

require __DIR__ . '/auth.php';
