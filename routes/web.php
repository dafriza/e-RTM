<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [AuthController::class,'index'])->name('/');

Route::post('login',[AuthController::class,'store'])->name('login');

Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('profile',[ProfileController::class,'index'])->name('profile');
