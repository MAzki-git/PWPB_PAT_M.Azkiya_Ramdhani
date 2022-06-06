<?php

use App\Http\Middleware\CekLevel;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\Barang;
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

Route::get('/', function () {
    return view('login  ');
});

Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/register', [LoginController::class, 'registrasi'])->name('register');
Route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
Route::get('/tambah', [BarangController::class, 'tambah'])->name('tambah');
Route::get('/siswatambah', [BarangController::class, 'siswatambah'])->name('siswatambah');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/delete', [BarangController::class, 'DestroyBarangs']);
Route::get('/deleteBarangs/{id}', [Barang::class, 'deleteBarangs'])->name('deleteBarangs');
// Route::get('/delete/{id}', function ($id) {
//     return view('/tambah', compact('id'));
// });
// Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
//     Route::get('/home', [HomeController::class, 'home']);
// });

// Route::group(['middleware' => ['auth', 'ceklevel:siswa']], function () {
//     Route::get('/home', [HomeController::class, 'userhome']);
// });

Route::group(['middleware' => ['auth', 'ceklevel:admin,siswa']], function () {
    Route::get('/home', [HomeController::class, 'home']);
});
