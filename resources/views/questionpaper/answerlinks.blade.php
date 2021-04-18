@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row text-light">
            <div class="col-lg-3 border-right border-secondary" style="border-width: 2px!important;">
                <div class="ml-3 text-center">
                    <div style="font-size: 40px">
                        <button class="btn d-lg-none btn-outline-secondary" type="button" data-toggle="collapse"
                                data-target="#example-collapse">
                            <span class="text-light">▼</span>
                        </button>
                        Similar
                    </div>
                    <div id="example-collapse" class="collapse d-lg-block">
                        @foreach($similar as $paper)
                            <div>
                                <a href="/question-paper/{{$paper->id}}"
                                   title="{{$paper->paper_name}}"
                                >{{$paper->name}} ({{$paper->year}})</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-1">
                <div class="container text-center ">
                    <div style="font-size: xx-large;">
                        {{$questionPaper->code}}
                    </div>
                    <div style="font-size: x-large;" class="d-inline">
                        {{ $questionPaper->name }} - {{$questionPaper->year}}
                    </div>
                    <div class="d-inline">
                        (<a href="{{$questionPaper->url}}">Direct link</a>)
                    </div>

                    <iframe src="{{$questionPaper->url}}&efh=false&a=v&chrome=false&embedded=true" class="w-100" style="min-height: 50vh !important;"></iframe>


                    <table class="table table-dark mt-4 border cool-table">
                        <thead>
                        <th>
                            Available answers
                        </th>
                        </thead>
                        @forelse($answers_number_and_char as $a_n_c)
                            <tr>
                                <td>
                                    <a href="{{url()->current() . '/answer/' . $a_n_c->question_number . '/' . $a_n_c->sub_question_character}} ">
                                        Question {{$a_n_c->question_number }}
                                        Part {{ $a_n_c->sub_question_character}}
                                    </a>
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
            </div>
        </div>
    </div>

@endsection

@section('head')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
@endsection
