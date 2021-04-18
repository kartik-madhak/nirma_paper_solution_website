<?php


use App\Http\Controllers\AnswerController;
use App\Http\Middleware\AdminMiddleWare;
use App\Mail\ContactMail;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
Auth::routes(['verify' => true]);

//Home routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//Admin special Routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware(AdminMiddleWare::class);


//Route to each question paper
Route::get(
    '/question-paper/{questionPaper}',
    [App\Http\Controllers\QuestionPaperController::class, 'index']
)->middleware('auth');

//Route to view answer
Route::get(
    '/question-paper/{questionPaper}/answer/{question_no}/{question_char}',
    [AnswerController::class, 'show']
)->name('answer.show')->middleware('auth'); // Login not required to view the answer

//Route to show form for adding answer to a question paper
Route::get('/question-paper/{questionPaper}/answer-add', [AnswerController::class, 'create'])->middleware(
    'auth'
); //Must be logged in

//Route for adding answer to a question paper
Route::post('/question-paper/{questionPaper}/answer-add/{question_no?}/{question_char?}', [AnswerController::class, 'store'])->middleware(
    'auth'
); //Must be logged in

Route::get(
    '/question-paper/{questionPaper}/answer-add/{question_no}/{question_char}',
    function ($questionPaper, $question_no, $question_char) {
        return view('answer.addForm', compact('questionPaper', 'question_no', 'question_char'));
    }
);

//For debugging and testing
Route::post('/test', [\App\Http\Controllers\HomeController::class, 'test']);

//Like answer through ajax request
Route::post('/answer/{answer}/like', [\App\Http\Controllers\LikeController::class, 'create'])->middleware('auth');

//Feedback Form
Route::get(
    '/contact',
    function () {
        return view('contact');
    }
);

//Email
Route::post(
    '/contact',
    function (Request $request) {
        Mail::send(new ContactMail($request));
        return view('/contact')->with('message', 'We have received your response, Thank You for your feedback.');
    }
);

//Update and Delete Answers
Route::patch('/answer/{answer}/edit', [AnswerController::class, 'edit'])->middleware('auth');

//Show answer edit form
Route::get('/answer/{answer}/edit', [AnswerController::class, 'showEditForm'])->middleware('auth');

//Delete answer
Route::delete('/answer/{answer}/delete', [AnswerController::class, 'destroy'])->middleware('auth');

//User's answers
Route::get('/my-answers', [AnswerController::class, 'userAnswer'])->middleware('auth');
