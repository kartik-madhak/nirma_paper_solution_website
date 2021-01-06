<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

//Home routes
Route::get('/',[App\Http\Controllers\HomeController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Search on the home page
//Route::get("/search",'HomeController@index');

//Route to each question paper
Route::get('/questionpaper/{id}',[App\Http\Controllers\QuestionPaperController::class,'index']);