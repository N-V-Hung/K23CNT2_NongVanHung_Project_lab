<?php

use App\Http\Controllers\nvhController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nvh-sinhvien',[nvhController::class,'nvhList'])->name('nvhSinhvien.nvhlist');

Route::get('/nvh-sinhvien/create',[nvhController::class,'nvhCreate'])->name('nvhSinhvien.nvhcreate');
Route::post('/nvh-sinhvien/create',[nvhController::class,'nvhCreateSubmit'])->name('nvhSinhvien.nvhcreatesubmit');