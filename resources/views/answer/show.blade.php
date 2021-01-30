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
        <div class="text-center text-light">
        <div style="font-size: xx-large;">
            {{$questionPaper->code}}
        </div>
        <div style="font-size: x-large;" class="d-inline">
            {{ $questionPaper->name }} - {{$questionPaper->year}}
        </div>
        <div class="d-inline">
            (<a href="{{$questionPaper->url}}">Download link</a>)
        </div>
        </div>
        <div class="row">
            <div class="col-md-2 text-light border-right mobile-hidden"
                 style="background-color: #2D2D2D; border-color: #404345!important;">
                <div class="mt-2">
                    <div class="sidebar-header">
                        <h3>Quick Links</h3>
                    </div>
                    <div>
                        @forelse($answers_number_and_char as $a_n_c)
                            <div>
                                <a href="/question-paper/{{ $questionPaper->id . '/answer/' . $a_n_c->question_number . '/' . $a_n_c->sub_question_character}} ">
                                    Question {{$a_n_c->question_number }} Part {{ $a_n_c->sub_question_character}}
                                </a>
                            </div>
                        @empty
                            <tr>
                                <td>There are no answers at the moment. Add yourself!</td>
                            </tr>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="font-size: 14px;">
                <div class="ml-4">
                    @forelse($answers as $answer)
                        <div class="row border-bottom border-top text-light"
                             style="background-color: #2D2D2D; border-color: #404345!important;" id="{{$answer->id}}">

                            <div class="col-1 mt-4">
                                <div style="cursor: pointer; font-size: 13px;">
                                    <span class="material-icons clickEvent {{$answer->likedByUser ? 'text-primary':''}}"
                                          id="{{ $answer->id }}"
                                          style="font-size: 17px">
                                        thumb_up
                                    </span>
                                    <span id="{{'likeNumber' . $answer->id}}" class="ml-1">
                                        {{ $answer->likes }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-4 col-11">
                                <div>
                                    {!! $answer->content !!}
                                </div>
                                <div class="footer float-right" style="font-size: 13px">
                                    {{ $answer->user->name . ' at ' . $answer->created_at }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-lg p-3">
                            There are no answers at this moment
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="col-md-2 tablet-hidden">
                <div class="text-light">
                    <div class="ml-1">
                        <div style="font-size: x-large">
                            All Answers
                        </div>
                        @foreach($answers as $answer)
                            <div class="mb-2 d-flex">
                                <a href="#" class="mr-2">
                                    <div class="rounded-lg bg-success text-center"
                                         style="width: 30px; height: 20px; text-decoration: none; color: white">
                                        {{$answer->likes}}
                                    </div>
                                </a>
                                <a href="#{{ $answer->id }}">
                                    {{ $answer->user->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
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
    {{--    <script>--}}
    {{--    $(function(){--}}
    {{--        $(".increment").click(function(){--}}
    {{--          let count = parseInt($("~ .count", this).text());--}}

    {{--          if($(this).hasClass("up")) {--}}
    {{--              $(this).css("opacity","100%");--}}
    {{--            var count = count + 1;--}}

    {{--             $("~ .count", this).text(count);--}}
    {{--          } else {--}}
    {{--            var count = count - 1;--}}
    {{--             $("~ .count", this).text(count);--}}
    {{--          }--}}

    {{--          $(this).parent().addClass("bump");--}}

    {{--          setTimeout(function(){--}}
    {{--            $(this).parent().removeClass("bump");--}}
    {{--          }, 400);--}}
    {{--        });--}}
    {{--      });--}}
    {{--      </script>--}}

@endsection
