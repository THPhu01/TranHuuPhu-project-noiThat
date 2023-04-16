<?php

use App\Http\Controllers\admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\VatLieuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\LoaiDanhMucController;
use App\Http\Controllers\Admin\DmBlogController;
use App\Http\Controllers\Admin\TinTucController;
use App\Http\Controllers\Admin\DanhSachKhachHang;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\CouponController;

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



Route::get('/login-page', [AdminController::class, 'loginPage']);
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'danhmucs' =>  DanhMucController::class,
        'danhmucblogs' => DmBlogController::class,
        'tintucs' => TinTucController::class,
        'sanphams' => SanPhamController::class,
        'coupons' => CouponController::class,
        'loaidanhmucs' => LoaiDanhMucController::class,
        'users' => DanhSachKhachHang::class,
        'binhluans' => BinhLuanController::class,
        'vatlieus' => VatLieuController::class,
        'donhangs' => DonHangController::class,
    ]);
    Route::post('/reply-comment', [BinhLuanController::class, 'replyComment'])->name('replyComment');
    Route::post('/allow-comment', [BinhLuanController::class, 'allowComment'])->name('allowComment');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});
