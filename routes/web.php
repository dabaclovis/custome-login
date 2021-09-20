<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainController;
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

Route::get('/', [PagesController::class,'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/clovis/login', [MainController::class,'login'])->name('clovis.login');
Route::get('/clovis/register', [MainController::class,'register'])->name('clovis.register');
Route::post('/clovis/save', [MainController::class,'save'])->name('clovis.save');

Route::post('/clovis/check', [MainController::class,'check'])->name('clovis.check');

Route::group(['prefix' => 'admin'],function(){
    Route::get('/clovis/logout', [MainController::class,'logout'])->name('clovis.logout')->middleware('authCheck');
    Route::get('dashboard', [MainController::class, 'index'])->name('admin.dashboard')->middleware('authCheck');
    Route::get('/clovis/login', [MainController::class,'login'])->name('clovis.login')->middleware('authCheck');
    Route::get('/clovis/register', [MainController::class,'register'])->name('clovis.register')->middleware('authCheck');
});


