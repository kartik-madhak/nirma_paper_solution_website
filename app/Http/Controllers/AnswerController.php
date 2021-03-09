<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\QuestionPaper;
use App\Models\User;
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, QuestionPaper $questionPaper)
    {
        $request->validate(
            [
                'question_number' => 'required|min:0|max:20',
                'question_alphabet' => 'required|alpha|size:1',
                'content' => 'required'
            ]
        );

        $content = $request->input('content');
        $question_number = $request->input('question_number');
        $question_alphabet = $request->input('question_alphabet');
        $questionPaper->answers()->create(
            [
                'user_id' => auth()->user()->id,
                'question_number' => $question_number,
                'sub_question_character' => $question_alphabet,
                'content' => $content,
                'likes' => 0
            ]
        );
        return redirect()->route('answer.show', ['questionPaper' => $questionPaper, 'question_no' => $question_number, 'question_char' => $question_alphabet]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionPaper $questionPaper, $question_no, $question_char)
    {
        $answers = $questionPaper->answers()->where('question_number', $question_no)->where(
            'sub_question_character',
            $question_char
        )->get();
//        dd($answers);

        /** @var User $user */
        $user = auth()->user();

        $likes = $user->likes()->whereIn('answer_id', $answers->pluck('id'))->get();

        $likesIndex = 0;
//        dd($likes);
        $count = $likes->count();
        if ($likes->isNotEmpty())
        foreach ($answers as $answer){
            if ($likesIndex < $count && $answer->id == $likes[$likesIndex]->answer_id)
            {
                $answer['likedByUser'] = true;
                $likesIndex++;
            }
            else $answer['likedByUser'] = false;
        }

        $answers=$answers->sortByDesc('likes');
        $answers_number_and_char = $questionPaper->answers()->select('question_number', 'sub_question_character')->groupBy('question_number', 'sub_question_character')->get();
        return view('answer.show', compact('answers', 'answers_number_and_char', 'questionPaper','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Answer $answer
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
        $ans=$answer->delete();
        return redirect()->back();

    }
}
