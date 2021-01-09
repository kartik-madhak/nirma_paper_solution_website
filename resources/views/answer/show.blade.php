@extends('layouts.app')

@section('head')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>

    <link rel="stylesheet" href="/path/to/styles/default.css">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>

    <script>hljs.initHighlightingOnLoad();</script>
@endsection

@section('content')
    <div class="container w-50">
        @forelse($answers as $answer)
            <div class="rounded-lg p-3 bg-light mt-2">
                {!! $answer->content !!}
                <div class="footer text-small text-black-50">
                    {{ $answer->user->name . ' at ' . $answer->created_at }}
                </div>
            </div>
        @empty
            <div class="rounded-lg p-3">
                There are no answers at this moment
            </div>
        @endforelse
    </div>
@endsection
