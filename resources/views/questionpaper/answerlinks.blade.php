@extends('layouts.app')
@section('content')
    <div class="container text-center text-light">
        <div style="font-size: 28px;">
            {{$questionPaper->code}}
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
            @forelse($answers_number_and_char as $a_n_c)
                <tr>
                    <td>
                        <a href="{{url()->current() . '/answer/' . $a_n_c->question_number . '/' . $a_n_c->sub_question_character}} ">{{$a_n_c->question_number . ' ' . $a_n_c->sub_question_character}}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>There are no answers at the moment. Add yourself!</td>
                </tr>
            @endforelse
        </table>

        <form action="/question-paper/{{$questionPaper->id}}/answer-add">
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
