<?php

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TingkatanController;

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

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('/', 'login')->name('login');
    Route::post('/', 'loginAction')->name('login.action');

});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/siswa/cetak-nilai/{nis}', [NilaiController::class, 'cetak'])->name('siswa.cetak-nilai');
    Route::post('/profile/upload', [ProfileController::class, 'uploadImage'])->name('profile.upload');
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/error', function () {
        return view('error');
    })->name('error');
    Route::middleware('checkRole:siswa')->group(function () {
        Route::get('dashboard', function () {
            $nama = Siswa::where('akun_id', Auth::user()->id)->get();
            return view('dashboard', ['nama' => $nama[0]['nama_lengkap']]);
        })->name('dashboard');
        Route::get('/nilai/siswa/{tingkat}/{semester}', [NilaiController::class, 'index']);

    });
    Route::get('/etdah', function () {
        return view('admin.dashboard');
    });

    Route::middleware('checkRole:guru')->group(function () {
        Route::post('/nilai/import/', [NilaiController::class, 'import'])->name('nilai.import');
        Route::get('/nilai/{siswa_id}', [NilaiController::class, 'index'])->name('nilai.index');
        Route::get('/nilai/edit/{id}', [NilaiController::class, 'edit'])->name('nilai.edit');
        Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
        Route::delete('/nilai/destroy/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
        Route::get('/perbaikan', [GuruController::class, 'pilihkelas'])->name('perbaikan');
        Route::get('guru/kelas/{kelas_id}', [GuruController::class, 'pilihsiswa'])->name('guru.showStudents');
        Route::get('guru/siswa/{nis}', [GuruController::class, 'tampilkanNilai'])->name('guru.tampilkan_nilai');
        Route::get('/index', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/export', [NilaiController::class, 'export'])->name('nilai.sport');
        Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/tingkatan', [TingkatanController::class, 'index'])->name('tingkatan');
        Route::get('/kelas/{tingkatan}', [TingkatanController::class, 'kelas']);
        Route::get('/mapel/{tingkatan}/{kelas}', [MapelController::class, 'index']);
        Route::get('/semester/{tingkat}/{kelas}/{mapel}', [NilaiController::class, 'semester']);
        Route::get('/nama/{tingkat}/{kelas}/{mapel}/{semester}', [NilaiController::class, 'nilai']);
        Route::get('/fetch/nilai/{nis}', [NilaiController::class, 'fetchNilai']);
        Route::get('/nilai/create/{tingkat}/{kelas}/{mapel}/{semester}/{nilai}', [NilaiController::class, 'create'])->name('nilai.create');
    });
});
Route::middleware('checkRole:admin')->group(function () {
    Route::get('admin/users', [AdminController::class, 'indexUsers'])->name(name: 'admin.users');
    Route::get('admin/users/create', [AdminController::class, 'create'])->name(name: 'users.create');
    Route::post('admin/users/store', [AdminController::class, 'store'])->name('users.store');
    Route::get('admin/users/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::get('kelas/search', [KelasController::class, 'search'])->name('kelas.search');

    Route::put('admin/users/update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('admin/users/delete/{id}', [AdminController::class, 'deleteUsers'])->name('users.destroy');
});

Route::fallback(function () {
    return redirect()->route('error');
});
