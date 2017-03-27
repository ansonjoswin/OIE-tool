@extends('layouts.app')

@section('content')
    <style>
        #hero {
            border-bottom: 4px solid #E6233F;
            padding-top: 25px;
            height: auto;
            background-color: #b8b8b8;
            font-size: 18px;
            color: #2e2e2e;
            font-family: 'sans-serif';
            -webkit-font-smoothing: antialiased;
            margin-top: -22px;
        }

        .inner-content {
            width: 98%;
            max-width: 960px;
            padding: 0 10px;
            margin: 0 auto;
        }
    </style>
    <div id="hero">
        <div class="inner-content">
            <h1>Administrative Cost Benchmarking Analytics Tool</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div style="text-align: center;">
                        <img src="{{asset('images/StudentLearning.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection
