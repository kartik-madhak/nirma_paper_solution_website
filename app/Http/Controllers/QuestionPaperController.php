<?php

namespace App\Http\Controllers;

use App\Models\QuestionPaper;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Answer;
class QuestionPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request, QuestionPaper $questionPaper)
    {
        $answers_number_and_char = $questionPaper->answers()->select('question_number', 'sub_question_character')->groupBy('question_number', 'sub_question_character')->get();

        $similar = QuestionPaper::query()->where('name', 'like', '%'.$questionPaper->name.'%')->get();

        return view('questionpaper.answerlinks',compact('answers_number_and_char','questionPaper', 'similar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionPaper  $questionPaper
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionPaper $questionPaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionPaper  $questionPaper
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionPaper $questionPaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionPaper  $questionPaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionPaper $questionPaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionPaper  $questionPaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionPaper $questionPaper)
    {
        //
    }
}
