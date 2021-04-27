{{--@extends('layouts.app')--}}
{{--@section('head')--}}

{{--     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>--}}


{{--@endsection--}}
{{--@section('content')--}}

{{--    <div style="background-color: white">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-8 d-inline-flex">--}}
{{--                    <div class="card   cool-card">--}}
{{--                        <div class="card-header">Dashboard</div>--}}

{{--                        <div class="card-body ">--}}
{{--                            --}}{{--                        {{dd($chart1)}}--}}
{{--                            <h1>{{ $chart1->options['chart_title'] }}</h1>--}}
{{--                            {!! $chart1->renderHtml() !!}--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">Dashboard</div>--}}

{{--                        <div class="card-body">--}}

{{--                            <h1>{{ $chart1->options['chart_title'] }}</h1>--}}
{{--                            {!! $chart1->renderHtml() !!}--}}

{{--                        </div>--}}

{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--   --}}
{{--    {!! $chart1->renderChartJsLibrary() !!}--}}
{{--    {!! $chart1->renderJs() !!}--}}


{{--@endsection--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                        <hr />




                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
@endsection
