<?php

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

Route::get('/nvhview1', function () {
    return view('nvhview1',['name'=>'devmasterAcedemy!']);
});

Route::get('/nvhview2', function () {
    return view('nvhview2',
    [
        'name'=>'devmaster Acedemy!',
        'arr'=>[1,4,7,2,9],
    ]);
});

Route::get('/nvhview3', function () {
    return view('nvhview3',
    [
        'name'=>["devmaster","Acedemy","Nong" , "Hưng"],
        'arr'=>[10,15,12,1,22,30],
        'users'=>[],
    ]);
});

Route::get('/nvhct', [nvhController::class,'index']);
