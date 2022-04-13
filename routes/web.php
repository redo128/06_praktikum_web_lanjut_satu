<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Mahasiswa_Matakuliah;
use Illuminate\Http\Request;

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

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/search', [SearchController::class, 'search'])->name('search');
// Route::get('/nilai/{$nim}', function () {
//     return view('mahasiswa.nilai');
// });
Route::get('nilai/{id}', [MahasiswaController::class, 'nilai'])->name('nilai');