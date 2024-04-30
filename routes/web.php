<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\SinhVienController;

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

Route::get('/admin/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main',[MainController::class,'index'])->name('admin');
        Route::prefix('sinhvien')->group(function () {
            Route::get('search',[SinhvienController::class,'search']);
            Route::get('sort',[SinhvienController::class,'sort']);
            Route::get('add',[SinhVienController::class,'create']);
            Route::post('add/store',[SinhVienController::class,'store']);
            Route::get('list',[SinhVienController::class,'list']);
            Route::get('edit/{sinhvien}',[SinhVienController::class,'edit']);
            Route::post('edit/{sinhvien}',[SinhVienController::class,'postedit']);
            Route::DELETE('delete',[SinhVienController::class,'delete']);
            Route::get('list/{sl}', [SinhvienController::class, 'SelectPaginate']);
        });
    });
});