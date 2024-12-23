<?php

use App\Http\Controllers\nvhLoaiSanPhamController;
use App\Http\Controllers\nvhQuanTriController;
use App\Http\Controllers\nvhSanPhamController;
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

Route::get('/admin/nvh-login',[NVH_QUAN_TRIController::class,'nvhLogin'])->name('admin.nvhLogin');
Route::post('/admin/nvh-login',[NVH_QUAN_TRIController::class,'nvhLoginSubmit'])->name('admin.nvhLoginSubmit');


Route::get('/nvhAdmin/nvhLoaiSanPham/List', [nvhLoaiSanPhamController::class, 'nvhList'])->name('nvhAdmin.nvhLoaiSanPham.List');

// Route thêm mới
Route::get('/nvhAdmin/nvhLoaiSanPham/create', [nvhLoaiSanPhamController::class, 'nvhCreate'])->name('nvhAdmin.nvhLoaiSanPham.Create');
Route::post('/nvhAdmin/nvhLoaiSanPham/store', [nvhLoaiSanPhamController::class, 'nvhStore'])->name('nvhAdmin.nvhLoaiSanPham.nvhStore');

// Route xem chi tiết
Route::get('/nvhAdmin/nvhLoaiSanPham/{id}/Show', [nvhLoaiSanPhamController::class, 'nvhShow'])->name('nvhAdmin.nvhLoaiSanPham.Show');

// Route sửa
Route::get('/nvhAdmin/nvkLoaiSanPham/{id}/Edit', [nvhLoaiSanPhamController::class, 'nvhEdit'])->name('nvhAdmin.nvhLoaiSanPham.Edit');
Route::post('/nvhAdmin/nvkLoaiSanPham/{id}', [nvhLoaiSanPhamController::class, 'nvhUpdate'])->name('nvhAdmin.nvhLoaiSanPham.Update');

// Route xóa
Route::delete('/nvhAdmin/nvhLoaiSanPham/{id}', [nvhLoaiSanPhamController::class, 'nvhDestroy'])->name('nvhAdmin.nvhLoaiSanPham.Destroy');



// bang san pham

Route::get('/nvhAdmin/nvhSanPham/List', [nvhSanPhamController::class, 'nvhList'])->name('nvhAdmin.nvhSanPham.List');

// Route thêm mới
Route::get('/nvhAdmin/nvhSanPham/create', [nvhSanPhamController::class, 'nvhCreate'])->name('nvhAdmin.nvhSanPham.Create');
Route::post('/nvhAdmin/nvhSanPham/store', [nvhSanPhamController::class, 'nvhStore'])->name('nvhAdmin.nvhSanPham.nvhStore');

// Route xem chi tiết
Route::get('/nvhAdmin/nvhSanPham/{id}/Show', [nvhSanPhamController::class, 'nvhShow'])->name('nvhAdmin.nvhSanPham.Show');

// Route sửa
Route::get('/nvhAdmin/nvhSanPham/{id}/Edit', [nvhSanPhamController::class, 'nvhEdit'])->name('nvhAdmin.nvhSanPham.Edit');
Route::post('/nvhAdmin/nvhSanPham/{id}', [nvhSanPhamController::class, 'nvhUpdate'])->name('nvhAdmin.nvhSanPham.Update');

// Route xóa
Route::delete('/nvhAdmin/nvhSanPham/{id}', [nvhSanPhamController::class, 'nvhDestroy'])->name('nvhAdmin.nvhSanPham.Destroy');
