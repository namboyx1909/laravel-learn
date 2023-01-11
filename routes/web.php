<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('', [HomeController::class, 'index'])->name('home.index');

Route::get('login', [HomeController::class, 'login'])->name('home.login');

Route::post('login', [HomeController::class, 'check_login']);

Route::get('upload', [HomeController::class, 'upload'])->name('home.upload');

Route::post('upload', [HomeController::class, 'handle_upload']);
