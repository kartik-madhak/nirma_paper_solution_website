@extends('layouts.app')

@section('head')
    <script src="https://cdn.ckeditor.com/4.15.1/standard-all/ckeditor.js"></script>

@endsection

@section('content')
<div class="display-4"> THIS IS TEST NOT IMPLEMENTED</div>
    <div class="container text-center">
        <form method="post" action="/test">
            @csrf
            <textarea name="content" id="mytextarea">Hello, World!</textarea>
            <button class="btn btn-outline-success">Submit</button>
        </form>
    </div>

    <script>
        CKEDITOR.replace('mytextarea');
    </script>
@endsection
