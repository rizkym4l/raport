<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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






    Route::post('/profile/upload', [ProfileController::class, 'uploadImage'])->name('profile.upload');
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/error', function () {
        return view('error');
    })->name('error');
    Route::middleware('checkRole:siswa')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/nilai/siswa/{tingkat}/{semester}', [NilaiController::class, 'index']);

    });

    Route::middleware('checkRole:guru')->group(function () {
        Route::post('/nilai/import/', [NilaiController::class, 'import'])->name('nilai.import');
        Route::get('/nilai/export', [NilaiController::class, 'export'])->name('nilai.export');
        Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
        Route::get('/tingkatan', [TingkatanController::class, 'index'])->name('tingkatan');
        Route::get('/kelas/{tingkatan}', [TingkatanController::class, 'kelas']);
        Route::get('/mapel/{tingkatan}/{kelas}', [MapelController::class, 'index']);
        Route::get('/semester/{tingkat}/{kelas}/{mapel}', [NilaiController::class, 'semester']);
        Route::get('/nama/{tingkat}/{kelas}/{mapel}/{semester}', [NilaiController::class, 'nilai']);
        Route::get('/nilai/create/{tingkat}/{kelas}/{mapel}/{semester}/{nilai}', [NilaiController::class, 'create'])->name('nilai.create');
    });
});
Route::fallback(function () {
    return redirect()->route('error');
});
