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

//Route to each question paper
Route::get('/question-paper/{questionPaper}',[App\Http\Controllers\QuestionPaperController::class,'index']);

//Route to view answer
Route::get('/question-paper/{questionPaper}/answer/{answer}', [\App\Http\Controllers\AnswerController::class, 'show']); // Login not required to view the answer

//Route to show form for adding answer to a question paper
Route::get('/question-paper/{questionPaper}/answer-add', [\App\Http\Controllers\AnswerController::class, 'create'])->middleware('auth'); //Must be logged in

//Route for adding answer to a question paper
Route::post('/question-paper/{questionPaper}/answer-add', [\App\Http\Controllers\AnswerController::class, 'store'])->middleware('auth'); //Must be logged in

//For debugging and testing
Route::post('/test', [\App\Http\Controllers\HomeController::class, 'test']);
