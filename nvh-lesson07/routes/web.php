<?php
use App\Http\Controllers\nvhKhoaController;
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

#Khoa
Route::get('/khoa' ,[nvhKhoaController::class,'nvhGetAllKhoa'])->name('nvhkhoa.nvhgetallkhoa');

Route::get('/khoa/detail/{makh}',[nvhKhoaController::class,'nvhGetKhoa'])->name('nvhkhoa.nvhgetkhoa');

Route::get('/khoa/edit/{makh}',[nvhKhoaController::class,'nvhEdit'])->name('nvhkhoa.nvhEdit');

Route::post('/khoa/edit',[nvhKhoaController::class,'nvhEditSubmit'])->name('nvhkhoa.nvhEditSubmit');

Route::get('/khoa/insert',[nvhKhoaController::class,'nvhInsert'])->name('nvhkhoa.nvhInsert');
Route::post('/khoa/insert',[nvhKhoaController::class,'nvhInsertSubmit'])->name('nvhkhoa.nvhInsertSubmit');

