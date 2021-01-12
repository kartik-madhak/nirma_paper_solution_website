@extends('layouts.app')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>

    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <script>hljs.initHighlightingOnLoad();</script>

@endsection

@section('content')
    <div class="container w-50">
        @forelse($answers as $answer)
            <div class="rounded-lg p-3 bg-light mt-2">
                {!! $answer->content !!}
                <div class="footer text-small text-black-50 d-inline-flex">
                    {{ $answer->user->name . ' at ' . $answer->created_at }}
                </div>
                <div class="d-inline-flex float-right" style="cursor: pointer">
                    <span class="material-icons clickEvent {{$answer->likedByUser ? 'text-primary':''}}" id="{{ $answer->id }}">
                        thumb_up
                    </span>
                    <span id="likes">
                        {{ $answer->likes }}
                    </span>
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
                $.post("/answer/" + pp + "/like",{_token: '{{csrf_token()}}'},
                    function (data) {
                    console.log(data);
                        obj.toggleClass("text-primary");
                        $("#likes").html(data);
                    }).fail(function(data) {
                    console.log(data);
                });
            });
        });
    </script>
@endsection
