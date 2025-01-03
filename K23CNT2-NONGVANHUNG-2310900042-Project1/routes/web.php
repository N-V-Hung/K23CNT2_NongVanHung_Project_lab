<?php

use App\Http\Controllers\nvhLoaiSanPhamController;
use App\Http\Controllers\nvhQuanTriController;
use App\Http\Controllers\nvhSanPhamController;
use App\Http\Controllers\nvh_CT_HOA_DONController;
use App\Http\Controllers\nvh_KHACH_HANGController;
use App\Http\Controllers\nvh_HOA_DONController;
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

//HomeController
Route::get('/nvhAdmin', [nvh_QUAN_TRIController::class, 'nvhAdminHome']);



Route::get('/admin/nvh-login',[NVH_QUAN_TRIController::class,'nvhIndex'])->name('nvhLogin.nvhIndex');
Route::post('/admin/nvh-login',[NVH_QUAN_TRIController::class,'nvhLoginSubmit'])->name('nvhLogin.nvhLoginSubmit');

Route::get('/nvhAdmin',function(){
    return view('nvhAdmin.index');
});


//loai san pham
Route::get('/nvhAdmin/nvhLoaiSanPham', [nvhLoaiSanPhamController::class, 'nvhList'])->name('nvhAdmin.nvhLoaiSanPham');

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


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// List
Route::get('/nvh-admins/nvh-khach-hang', [nvh_KHACH_HANGcontroller::class, 'nvhList'])->name('nvhadmins.nvhkhachhang');

// show
Route::get('/nvh-admins/nvh-khach-hang/nvh-show/{id}', [nvh_KHACH_HANGcontroller::class, 'nvhshow'])->name('nvhadmin.nvhkhachhang.nvhshow');

// Create
Route::get('/nvh-admins/nvh-khach-hang/nvh-create', [nvh_KHACH_HANGcontroller::class, 'nvhCreate'])->name('nvhadmin.nvhkhachhang.nvhcreate');
Route::post('/nvh-admins/nvh-khach-hang/nvh-create', [nvh_KHACH_HANGcontroller::class, 'nvhCreateSubmit'])->name('nvhadmin.nvhkhachhang.nvhCreateSubmit');

// Edit
Route::get('/nvh-admins/nvh-khach-hang/nvh-edit/{id}', [nvh_KHACH_HANGcontroller::class, 'nvhEdit'])->name('nvhadmin.nvhkhachhang.nvhedit');
Route::post('/nvh-admins/nvh-khach-hang/nvh-edit/{id}', [nvh_KHACH_HANGcontroller::class, 'nvhEditSubmit'])->name('nvhadmin.nvhkhachhang.nvhEditSubmit');

// Delete (Sử dụng POST hoặc DELETE)
Route::post('/nvh-admins/nvh-khach-hang/nvh-delete/{id}', [nvh_KHACH_HANGcontroller::class, 'nvhDelete'])->name('nvhadmin.nvhkhachhang.nvhdelete');




//san pham
Route::get('/nvhAdmin/nvhSanPham', [nvhSanPhamController::class, 'nvhList'])->name('nvhAdmin.nvhSanPham');
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

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-hoa-don',[nvh_HOA_DONController::class,'nvhList'])->name('nvhadmins.nvhhoadon');
//show
Route::get('/nvh-admins/nvh-hoa-don/nvh-show/{id}', [nvh_HOA_DONController::class, 'nvhshow'])->name('nvhadmin.nvhhoadon.nvhshow');
//create
Route::get('/nvh-admins/nvh-hoa-don/nvh-create',[nvh_HOA_DONController::class,'nvhCreate'])->name('nvhadmin.nvhhoadon.nvhcreate');
Route::post('/nvh-admins/nvh-hoa-don/nvh-create',[nvh_HOA_DONController::class,'nvhCreateSubmit'])->name('nvhadmin.nvhhoadon.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-hoa-don/nvh-edit/{id}', [nvh_HOA_DONController::class, 'nvhEdit'])->name('nvhadmin.nvhhoadon.nvhedit');
Route::post('/nvh-admins/nvh-hoa-don/nvh-edit/{id}', [nvh_HOA_DONController::class, 'nvhEditSubmit'])->name('nvhadmin.nvhhoadon.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-hoa-don/nvh-delete/{id}', [nvh_HOA_DONController::class, 'nvhDelete'])->name('nvhadmin.nvhhoadon.nvhdelete');

// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nvh-admins/nvh-quan-tri',[nvh_QUAN_TRIController::class,'nvhList'])->name('nvhadmins.nvhquantri');
//show
Route::get('/nvh-admins/nvh-quan-tri/nvh-show/{id}', [nvh_QUAN_TRIController::class, 'nvhshow'])->name('nvhadmin.nvhquantri.nvhshow');
//create
Route::get('/nvh-admins/nvh-quan-tri/nvh-create',[nvh_QUAN_TRIController::class,'nvhCreate'])->name('nvhadmin.nvhquantri.nvhcreate');
Route::post('/nvh-admins/nvh-quan-tri/nvh-create',[nvh_QUAN_TRIController::class,'nvhCreateSubmit'])->name('nvhadmin.nvhquantri.nvhCreateSubmit');
//edit
Route::get('/nvh-admins/nvh-quan-tri/nvh-edit/{id}', [nvh_QUAN_TRIController::class, 'nvhEdit'])->name('nvhadmin.nvhquantri.nvhedit');
Route::post('/nvh-admins/nvh-quan-tri/nvh-edit/{id}', [nvh_QUAN_TRIController::class, 'nvhEditSubmit'])->name('nvhadmin.nvhquantri.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvh-admins/nvh-quan-tri/nvh-delete/{id}', [nvh_QUAN_TRIController::class, 'nvhDelete'])->name('nvhadmin.nvhquantri.nvhdelete');



//ct hoa don
Route::get('/nvhAdmin/nvhcthoadon',[nvh_CT_HOA_DONController::class,'nvhList'])->name('nvhadmin.nvhcthoadon');
//Show
Route::get('/nvhAdmin/nvhcthoadon/Show/{id}', [nvh_CT_HOA_DONController::class, 'nvhShow'])->name('nvhadmin.nvhcthoadon.nvhShow');
//create
Route::get('/nvhAdmin/nvhcthoadon/create',[nvh_CT_HOA_DONController::class,'nvhCreate'])->name('nvhadmin.nvhcthoadon.nvhcreate');
Route::post('/nvhAdmin/nvhcthoadon/create',[nvh_CT_HOA_DONController::class,'nvhCreateSubmit'])->name('nvhadmin.nvhcthoadon.nvhCreateSubmit');
//edit
Route::get('/nvhAdmin/nvhcthoadon/edit/{id}', [nvh_CT_HOA_DONController::class, 'nvhEdit'])->name('nvhadmin.nvhcthoadon.nvhedit');
Route::post('/nvhAdmin/nvhcthoadon/edit/{id}', [nvh_CT_HOA_DONController::class, 'nvhEditSubmit'])->name('nvhadmin.nvhcthoadon.nvhEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nvhAdmin/nvhcthoadon/delete/{id}', [nvh_CT_HOA_DONController::class, 'nvhDelete'])->name('nvhadmin.nvhcthoadon.nvhdelete');

