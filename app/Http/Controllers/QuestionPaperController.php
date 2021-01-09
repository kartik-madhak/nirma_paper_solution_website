<?php

namespace App\Http\Controllers;

use App\Models\QuestionPaper;
use Illuminate\Http\Request;
use App\Models\Answer;
class QuestionPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, QuestionPaper $questionPaper)
    {
        $answers = $questionPaper->answers()->get();
        $dict=[];
        $answers2=array();
        foreach($answers as $answer)
        {
            if($dict[$answer->question_number.$answer->sub_question_character]==1)
            {   
              array_push($answers2,$answer);  
            }
           $dict[strval($answer->question_number.$answer->sub_question_character)]=1;

          
        }
       //  dd($answers->all());
            
        return view('questionpaper.answerlinks',compact('answers2','questionPaper'));
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
