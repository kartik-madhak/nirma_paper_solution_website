@extends('layouts.app')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>

    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">

    <link rel="stylesheet" href="{{asset('css/dracula.css')}}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <script>hljs.initHighlightingOnLoad();</script>



    {{-- <Added by Jenish> --}}
    {{--    <link href="{{ asset('css/Button_css.css') }}" rel="stylesheet">--}}
    {{-- <link rel="stylesheet" type="text/scss" href="{{ asset('Button_css.scss') }}"> --}}
    <style>

        @media only screen and (max-width: 600px) {
            .tablet-hidden {
                display: none;
            }
        }

        @media only screen and (max-width: 768px) {
            .mobile-hidden {
                display: none;
            }
        }

        .math-tex {
            font-size: 18px;
            padding: 20px;
            background-color: #1C1B1B;
            border-radius: 10px;
        }

    </style>

@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="font-size: 14px;">
                <div class="ml-4" id="accordion">
                    @forelse($answers as $answer)
                        <div class="card cool-card mt-2 p-1">
                            <div class="card-header">
                                Answer written at {{$answer->created_at}}
                                <a class="stretched-link" data-toggle="collapse"
                                   data-target="#Collapse{{$answer->id}}">
                                </a>
                                <div class="float-right" style="z-index: 1; position: relative">
                                    <a class="btn btn-outline-primary" href="/question-paper/{{$answer->question_paper_id}}/answer/{{$answer->question_number}}/{{$answer->sub_question_character}}#{{$answer->id}}"

                                    >Go to answer</a>
                                </div>
                            </div>
                            <div id="Collapse{{$answer->id}}" class="collapse" aria-labelledby="headingOne"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    @include('layouts.answer')

                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="text-light p-5 text-center">
                            There are no answers at this moment
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {

                $(".clickEvent").click(function () {
                    const obj = $(this);

                    let pp = $(this).attr("id");
                    $.post("/answer/" + pp + "/like", {_token: '{{csrf_token()}}'},
                        function (answer) {
                            console.log(answer);
                            obj.toggleClass("text-primary");
                            $("#likeNumber" + answer.id).html(answer.likes);
                        }).fail(function (data) {
                        console.log(data);
                    });
                });

            });

        </script>
@endsection
