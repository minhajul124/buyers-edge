<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('/category', 'App\Http\Controllers\AdminController@category')->name('category');
    Route::put('/category/store',[App\Http\Controllers\AdminController::class, 'store'])->name('category.store');
    Route::get('/categorylist',[App\Http\Controllers\AdminController::class, 'list'])->name('category.list');
    Route::get('/delete_category/{id}',[App\Http\Controllers\AdminController::class, 'destroy'])->name('category.destroy');

    Route::get('/add_product',[App\Http\Controllers\AdminController::class, 'add_product'])->name('product');
    Route::put('/store_product',[App\Http\Controllers\AdminController::class, 'store_product'])->name('store_product');

    route::get('/all_product', [AdminController::class, 'all_product']);
});

require __DIR__.'/auth.php';

// Route::get('/admin/dashboard',[App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');