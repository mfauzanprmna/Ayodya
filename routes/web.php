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
use App\Models\Background;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

// Route::middleware(['auth:user'])->group(function () {
//     Route::get('/admin', function () {
//         return view('dashboardtampilan');
//     })->name('dashboard');
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth:user', 'role:admin']], function () {
    Route::resource('/juri', JuriController::class);
    Route::resource('/cabang', CabangController::class);
    Route::resource('/absen', AbsenController::class);
    Route::resource('/tarian', TarianController::class);
    Route::resource('/layout', LayoutController::class);
    Route::post('/serti', [LayoutController::class, 'serti'])->name('layout.serti');
    Route::get('/nilaipilihan', function () {
        return view('nilaipilihan');
    });
    Route::get('/sertifikat', [SertifikatController::class, 'index']);
    Route::post('/sertifikat/getSertifikat', [SertifikatController::class, 'getSertifikat'])->name('sertifikat.getSertifikat');
    Route::get('/nilai/{id}', [SertifikatController::class, 'cetak_nilai'])->name('nilai.print');
    Route::post('/file-import', [SiswaController::class, 'fileImport'])->name('file-import');
    Route::post('/tari-import', [TarianController::class, 'fileImport'])->name('tari-import');
    Route::get('/browse/tari', [NilaiController::class, 'browse'])->name('browse-tari');
    Route::post('/getsiswa', [NilaiController::class, 'getSiswa'])->name('getsiswa');
    Route::get('/nilai_export', [NilaiController::class, 'export'])->name('nilai_export');
});

Route::middleware(['auth:user', 'role:juri,admin,cabang'])->group(function () {
    Route::resource('/nilai', NilaiController::class);
    Route::resource('/vokal', NilaivokalController::class);
    Route::resource('/sinopsis', SinopsisController::class);
    Route::resource('/undian', UndianController::class);
    Route::get('/dashboard', function () {
        $cabangs = User::all()->where('role', 'cabang');
        $siswa = Siswa::all();
        $kelas = Background::all();
        return view('dashboard.' . Auth::user()->role, compact('cabangs', 'kelas', 'siswa'));
    })->name('dashboard');
});

Route::middleware(['auth:user', 'role:cabang,admin'])->group(function () {
    Route::resource('admin/siswa', SiswaController::class);
    Route::get('/sertifikat', [SertifikatController::class, 'index']);
    Route::post('/sertifikat/getSertifikat', [SertifikatController::class, 'getSertifikat'])->name('sertifikat.getSertifikat');
});

Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/', function () {
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

        return view('dashboard.siswa', compact('greetings'));
    })->name('dashboard.siswa');
});



// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__ . '/auth.php';
