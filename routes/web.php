<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data-mahasiswa', [MahasiswaController::class, 'dataMahasiswa'])->middleware('auth');
Route::get('/tabel-mahasiswa', [MahasiswaController::class, 'tabelMahasiswa'])->middleware('auth');
Route::get('/blog-mahasiswa', [MahasiswaController::class, 'blogMahasiswa'])->middleware('auth');

Route::get('/', [JurusanController::class, 'index'])->middleware('auth');
Route::resource('jurusans', JurusanController::class)->middleware('auth');