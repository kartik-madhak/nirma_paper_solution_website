<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\QuestionPaper;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Route;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(QuestionPaper $questionPaper)
    {
        return view('answer.addForm', compact('questionPaper'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, QuestionPaper $questionPaper)
    {
        $request->validate([
            'question_number' => 'required|min:0|max:20',
            'question_alphabet' => 'required|alpha|size:1'
                           ]);

        $content = $request->input('content');
        $question_number = $request->input('question_number');
        $question_alphabet = $request->input('question_alphabet');
        $questionPaper->answers()->create([
            'user_id' => auth()->user()->id,
            'question_number' => $question_number,
            'sub_question_character' => $question_alphabet,
            'content' => $content]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionPaper $questionPaper, $question_no, $question_char)
    {
        $answers = $questionPaper->answers()->where('question_number', $question_no)->where('sub_question_character', $question_char)->get();

//        dd($answers);

        return view('answer.show', compact('answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
