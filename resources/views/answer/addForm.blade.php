@extends('layouts.app')

@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('ckfinder/ckfinder.js')}}"></script>

@endsection

@section('content')
    <div class="container w-75 text-center">
        <form method="post" action="/">
            @csrf
            <div class="text-light">
                Question number: -
            </div>
            <div class="form-row p-1 mb-3">
                <input name="question_number" class="form-control w-50" type="number"
                       value="{{isset($question_no) ? $question_no: 1}}"
                       min="1" max="20">
                <select name="question_alphabet" class="form-control w-50">
                    @for ($x = 'A'; $x < 'Z'; $x++)
                        <option {{(isset($question_char) && $x == $question_char) ? "selected": ""}} >{{$x}}</option>
                    @endfor
                </select>
            </div>

            <textarea class="bg-dark" name="content" id="mytextarea"></textarea>
            <div class="mt-3">
                <div class="text-info">
                    Make sure your answer is relevant to the question asked.
                </div>
                <button class="btn btn-outline-success mt-2">Submit</button>
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace('mytextarea',
            {
                extraPlugins: 'mathjax',
                mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
                height: 320,
                filebrowserBrowseUrl: ''
            });

        CKEDITOR.on( 'instanceReady', function( evt ) {
            evt.editor.dataProcessor.htmlFilter.addRules( {
                elements: {
                    img: function(el) {
                        // el.addClass('img-fluid');
                    }
                }
            });
        });

        let editor = CKEDITOR.replace('ckfinder');
        CKFinder.setupCKEditor(editor);

    </script>
@endsection
