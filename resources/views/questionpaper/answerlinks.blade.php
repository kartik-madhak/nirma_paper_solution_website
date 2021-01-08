@extends('layouts.app')
@section('content')
    <div class="container text-center text-light">
        <div style="font-size: 28px;">
            {{$questionPaper->name}}
        </div>
        <div>
            <a href="{{$questionPaper->url}}">Download link</a>
        </div>

        <table class="table table-dark m-auto" style="width: fit-content">
            <thead>
            <th>
                Available answers
            </th>
            </thead>
            @forelse($answers as $answer)

                <tr>
                    <td>
                        <a href="{{url()->current() . '/answer/' . $answer->id}}">{{$answer->question_number . ' ' . $answer->sub_question_character}}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>There are no answers at the moment. Add yourself!</td>
                </tr>
            @endforelse
        </table>

        <form action="/question-paper/answer/add/{{$questionPaper->id}}">
            <button class="btn btn-outline-success m-3">Add Answer</button>
        </form>
    </div>
@endsection

@section('head')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
@endsection
