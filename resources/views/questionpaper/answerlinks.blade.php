@extends('layouts.app')
@section('content')
<div class="container text-center">

    @foreach($answers as $answer)
    <li>{{$answer->question_number.$answer->sub_question_character}}</li>
    
    @endforeach
</div>
@endsection