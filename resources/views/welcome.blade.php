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
    {{--<div class="container">--}}
        {{--<div class="row" style="padding-top: 20px">--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div style="text-align: center;">--}}
                        {{--<img src="{{asset('images/StudentLearning.jpg')}}">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}
{{--@section('footer')--}}
{{--@endsection--}}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="padding-top: 20px">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center;">Welcome!</div>

                    <div class="panel-body">
                        <!-- Carousel
                        ================================================== -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" style="text-align: center;">
                                <div class="item active" style="text-align: center;">
                                    {{--<a href="http://www.unomaha.edu/college-of-information-science-and-technology"--}}
                                    {{--target="_blank">--}}
                                    <img src=" {{ asset('images/peergroupcreate.jpg') }}" class="img-responsive">
                                    </a>
                                </div>
                                <div class="item" style="text-align: center;">
                                    {{--<a href="http://www.nacada.ksu.edu" target="_blank">--}}
                                    {{--<a href="http://www.unomaha.edu/college-of-information-science-and-technology/academics/advising.php"--}}
                                       {{--target="_blank">--}}
                                        <img src="{{ asset('images/peergrouplist.jpg') }}" class="img-responsive">
                                        {{-- {{ HTML::image('/images/StudentFaculty.jpg', '', array('class' => ' img-responsive')) }} --}}
                                    </a>
                                </div>
                                <div class="item" style="text-align: center;">
                                    {{--<a href="http://www.unomaha.edu" target="_blank">--}}
                                        <img src="{{ asset('images/datavisualizationUNO.jpg') }}" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span
                                        class="icon-prev"></span></a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span
                                        class="icon-next"></span></a>
                        </div>
                        <!-- /.carousel -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('footer')
    <style>
        /* -----------------------------------------------
        CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            margin-bottom: 0px;
        }

        /* Since positioning the image, we need to help out the caption */
        /* Declare heights because of positioning of img element */
        .carousel .item {
            height: 400px; /*background-color:#555;*/
        }

        .carousel img { /*position: absolute;*/ /*top: 0;*/ /*left: 0;*/
            min-height: 400px;
        }

        /* RESPONSIVE CSS
        -------------------------------------------------- */
        @media (min-width: 768px) {
            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 20px;
                font-size: 21px;
                line-height: 1.4;
            }
        }

        img.img-responsive {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /*span.icon-next, span.icon-prev { margin: 0px !important; position: static !important; }*/
        span.icon-prev {
            margin-left: -30px !important
        }

        span.icon-next {
            margin-right: -30px !important
        }
    </style>
@endsection