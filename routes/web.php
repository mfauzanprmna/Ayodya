<?php
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaivokalController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\TarianController;
use App\Http\Controllers\UndianController;
use App\Http\Controllers\SinopsisController;
use App\Http\Controllers\User\CabangController;
use App\Http\Controllers\User\JuriController;
use App\Http\Controllers\User\SiswaController;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
    
Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/sertifikat', [SertifikatController::class, 'index']);
    Route::post('/sertifikat/getSertifikat', [SertifikatController::class, 'getSertifikat'])->name('sertifikat.getSertifikat');
    Route::get('/sertifikat/{id}/{hari}', [SertifikatController::class, 'cetak_sertifikat'])->name('sertifikat.print');
    Route::get('/nilai/{id}', [SertifikatController::class, 'cetak_nilai'])->name('nilai.print');
    Route::post('file-import', [SiswaController::class, 'fileImport'])->name('file-import');
    Route::post('tari-import', [TarianController::class, 'fileImport'])->name('tari-import');
    Route::get('/browse/tari', [NilaiController::class, 'browse'])->name('browse-tari');
    Route::post('/getsiswa', [NilaiController::class, 'getSiswa'])->name('getsiswa');
});

Route::middleware(['auth:user', 'role:juri,admin'])->group(function () {
    Route::resource('admin/nilai', NilaiController::class);
    Route::resource('admin/vokal', NilaivokalController::class);
    Route::resource('admin/sinopsis', SinopsisController::class);
});

Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/dashboard/siswa', function () {
        $time = date('H');
        $timezone = date("e");

        if ($time < "12") {
            $greetings = "Selamat Pagi";
        } elseif ($time >= "12" && $time < "15") {
            $greetings = "Selamat Siang";
        } elseif ($time >= "15" && $time < "18") {
            $greetings = "Selamat Sore";
        } elseif ($time >= "18") {
            $greetings = "Selamat Malam";
        }
        
        return view('siswadashboard', compact('greetings'));
    });
});

Route::get('/nilaipilihan', function () {
    return view('nilaipilihan');
});

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__ . '/auth.php';
