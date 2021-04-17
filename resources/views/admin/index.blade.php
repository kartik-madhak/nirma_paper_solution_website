@extends('layouts.app')
{{--@section('head')--}}

{{--     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>--}}



{{--@endsection--}}
@section('content')



    <div class="container text-dark">
        <div class="row justify-content-center">
            <div class="col-md-8 d-inline-flex">
                <div class="card bg-white">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body text-light" >
{{--                        {{dd($chart1)}}--}}
                        <h1 class="text-dark">{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                    </div>

                </div>
                <div class="card bg-white">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body text-light" >

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                    </div>

                </div>



            </div>
        </div>
    </div>


    <div class="container-fluid text-light">
        @foreach($users as $user)
            {{$user->name}}
            {{$cc[$user->name]}}
        @endforeach
    </div>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}


@endsection

