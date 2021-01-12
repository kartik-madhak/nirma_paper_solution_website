<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Answer $answer
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function create(Answer $answer)
    {
        /** @var User $user */
        $user = auth()->user();

        $res = $user->likes()->where( 'answer_id', $answer->id);

        if(!$res->exists()) {
            $answer->likes++;
            $temp = $user->likes()->create(['answer_id' => $answer->id]);
        }
        else{
            $res->first()->delete();
            $answer->likes--;
        }
        $answer->save();
        return $answer;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Like $like
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Like $like
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Like $like
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Like $like
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        //
    }
}
