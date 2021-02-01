<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

//Home Routes
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/search',[HomeController::class,'search'])->name('search');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//Regiseter Routes
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::Post('/register',[RegisterController::class,'store']);

//login Routes
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

//logout routes
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//profile routes
Route::get('/profile/{user}',[ProfileController::class,'index'])->name('profile');
Route::post('/profile/{user}',[ProfileController::class,'upload'])->name('upload');
Route::get('/profile/download/{id}',[ProfileController::class,'download'])->name('download');
Route::delete('/profile/{assignment}',[ProfileController::class,'delete'])->name('delete.assignment');

//assigments routes
Route::get('/assignment/{user}',[AssignmentController::class,'index'])->name('assignment');
Route::post('/assignment/{user}',[AssignmentController::class,'store'])->name('upload.assignment');
