<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{RoleController,UserController};

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('layouts.sb2');
});
Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile',[\App\Http\Controllers\HomeController::class,'profileIndex'])->name('profile.index');
    Route::put('/profile/update/{user}',[\App\Http\Controllers\HomeController::class,'profileUpdate'])->name('profile.update');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    //Route::resource('products', ProductController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
