<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BackEnd\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KerajinanController;
use App\Http\Controllers\KesenianController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PepatahController;
use App\Http\Controllers\PerhelatanController;
use App\Models\Perhelatan;
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

Route::get('/', [FrontendController::class, 'index']);

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'backend/',
    'as'         => 'backend.'
], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group([
        'prefix' => 'berita/',
        'as' => 'berita.'
    ], function () {
        Route::get('index', [BeritaController::class, 'index'])->name('index');
        Route::get('create', [BeritaController::class, 'create'])->name('create');
        Route::get('edit/{berita_id}', [BeritaController::class, 'edit'])->name('edit');
        Route::post('store', [BeritaController::class, 'store'])->name('store');
        Route::put('update', [BeritaController::class, 'update'])->name('update');
        Route::get('destroy/{berita_id}', [BeritaController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'makanan/',
        'as' => 'makanan.'
    ], function () {
        Route::get('index', [MakananController::class, 'index'])->name('index');
        Route::get('gis', [MakananController::class, 'gis'])->name('gis');
        Route::get('create', [MakananController::class, 'create'])->name('create');
        Route::get('edit/{makanan_id}', [MakananController::class, 'edit'])->name('edit');
        Route::post('store', [MakananController::class, 'store'])->name('store');
        Route::put('update', [MakananController::class, 'update'])->name('update');
        Route::get('destroy/{makanan_id}', [MakananController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'kerajinan/',
        'as' => 'kerajinan.'
    ], function () {
        Route::get('index', [KerajinanController::class, 'index'])->name('index');
        Route::get('gis', [KerajinanController::class, 'gis'])->name('gis');
        Route::get('create', [KerajinanController::class, 'create'])->name('create');
        Route::get('edit/{kerajinan_id}', [KerajinanController::class, 'edit'])->name('edit');
        Route::post('store', [KerajinanController::class, 'store'])->name('store');
        Route::put('update', [KerajinanController::class, 'update'])->name('update');
        Route::get('destroy/{kerajinan_id}', [KerajinanController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'kesenian/',
        'as' => 'kesenian.'
    ], function () {
        Route::get('index', [KesenianController::class, 'index'])->name('index');
        Route::get('gis', [KesenianController::class, 'gis'])->name('gis');
        Route::get('create', [KesenianController::class, 'create'])->name('create');
        Route::get('edit/{kesenian_id}', [KesenianController::class, 'edit'])->name('edit');
        Route::post('store', [KesenianController::class, 'store'])->name('store');
        Route::put('update', [KesenianController::class, 'update'])->name('update');
        Route::get('destroy/{kesenian_id}', [KesenianController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'perhelatan/',
        'as' => 'perhelatan.'
    ], function () {
        Route::get('index', [PerhelatanController::class, 'index'])->name('index');
        Route::get('gis', [PerhelatanController::class, 'gis'])->name('gis');
        Route::get('create', [PerhelatanController::class, 'create'])->name('create');
        Route::get('edit/{perhelatan_id}', [PerhelatanController::class, 'edit'])->name('edit');
        Route::post('store', [PerhelatanController::class, 'store'])->name('store');
        Route::put('update', [PerhelatanController::class, 'update'])->name('update');
        Route::get('destroy/{perhelatan_id}', [PerhelatanController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'pepatah/',
        'as' => 'pepatah.'
    ], function () {
        Route::get('index', [PepatahController::class, 'index'])->name('index');
        Route::get('gis', [PepatahController::class, 'gis'])->name('gis');
        Route::get('create', [PepatahController::class, 'create'])->name('create');
        Route::get('edit/{pepatah_id}', [PepatahController::class, 'edit'])->name('edit');
        Route::post('store', [PepatahController::class, 'store'])->name('store');
        Route::put('update', [PepatahController::class, 'update'])->name('update');
        Route::get('destroy/{pepatah_id}', [PepatahController::class, 'destroy'])->name('destroy');
    });
});
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login');
