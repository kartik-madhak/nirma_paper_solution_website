@extends('layouts.app')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>
    <script src="jquery.min.js"></script>


    <script src="dist/jquery.upvote.js"></script>

    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>
    <link rel="stylesheet" href="dist/jquery.upvote.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <script>hljs.initHighlightingOnLoad();</script>

    {{-- <Added by Jenish> --}}
    {{--    <link href="{{ asset('css/Button_css.css') }}" rel="stylesheet">--}}
    {{-- <link rel="stylesheet" type="text/scss" href="{{ asset('Button_css.scss') }}"> --}}

@endsection

@section('content')
    <div class="container w-75" style="font-size: 14px;">
        @forelse($answers as $answer)
            <div class="row border-bottom border-top text-light "
                 style="background-color: #2D2D2D; border-color: #404345!important;">

                <div class="col-1 mt-4">
                    <div style="cursor: pointer; font-size: 13px;">
                            <span class="material-icons clickEvent {{$answer->likedByUser ? 'text-primary':''}}"
                              id="{{ $answer->id }}"
                              style="font-size: 17px"
                        >
                        thumb_up
                    </span>
                            <span id="{{'likeNumber' . $answer->id}}"
                                  class="ml-1">
                            {{ $answer->likes }}
                        </span>
                    </div>
                </div>

                <div class="p-4 mt-1 col-11">
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
