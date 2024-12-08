<?php

use App\Http\Controllers\nvhcontroller;
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


Route::get('/nvh-login',[nvhcontroller::class,'nvhindex'])->name('nvhlogin.nvhindex'); 
Route::post('/nvh-login',[nvhcontroller::class,'nvhSubmit'])->name('nvhlogin.nvhSubmit'); 


Route::get('/nvh-register', [nvhcontroller::class, 'nvhshowForm'])->name('nvhregister.nvhform');
Route::post('/nvh-register', [nvhcontroller::class, 'nvhsubmitForm'])->name('nvhregister.nvhsubmit');


Route::get('/nvh-register2', [nvhcontroller::class, 'nvhshowForm2'])->name('nvhregister2.nvhform2');
Route::post('/nvh-register2', [nvhcontroller::class, 'nvhsubmitForm2'])->name('nvhregister2.nvhsubmit2');

Route::get('/nvh-create', [nvhcontroller::class, 'nvhcreate'])->name('nvhcreate.nvhcreate');
Route::post('/nvh-create', [nvhcontroller::class, 'nvhstore'])->name('nvhcreate.nvhstore');
