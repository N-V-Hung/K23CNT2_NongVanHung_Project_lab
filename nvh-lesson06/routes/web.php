<?php

use App\Http\Controllers\nvhSessionController;
use App\Http\Controllers\nvhAccountController;
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

//test sesion
Route::get('/nvh-session/get',[nvhSessionController::class,'nvhGetSessionData'])->name('nvhsession.get');
Route::get('/nvh-session/store',[nvhSessionController::class,'nvhStoreSessionData'])->name('nvhsession.set');
Route::get('/nvh-session/delete',[nvhSessionController::class,'nvhDeleteSessionData'])->name('nvhsession.del');

//Account
Route::get('/nvh-login',[nvhAccountController::class,'nvhaccount'])->name('nvhaccount.nvhlogin');
Route::get('/nvh-logout',[nvhAccountController::class,'nvhaccount'])->name('nvhaccount.nvhlogout');
Route::post('/nvh-login',[nvhAccountController::class,'nvhloginSubmit'])->name('nvhaccount.nvhloginSubmit');