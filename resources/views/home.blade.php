@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center;">Welcome {{$user->name}} !</div>
                
                 <div class="panel-body">
                    <!-- Carousel
                    ================================================== -->
                    <div id="myCarousel" class="carousel slide"  data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" style="text-align: center;">
                            <div class="item active" style="text-align: center;">
                                <a href="http://www.unomaha.edu/college-of-information-science-and-technology" target="_blank">
                                    <img src=" {{ asset('images/User.png') }}" class="img-responsive">
                                </a>
                            </div>
                            <div class="item" style="text-align: center;">
                                {{--<a href="http://www.nacada.ksu.edu" target="_blank">--}}
                                <a href="http://www.unomaha.edu/college-of-information-science-and-technology/academics/advising.php" target="_blank">
                                    <img src="{{ asset('images/StudentFaculty.jpg') }}" class="img-responsive">
                                    {{-- {{ HTML::image('/images/StudentFaculty.jpg', '', array('class' => ' img-responsive')) }} --}}                           
                                </a>
                            </div>
                            <div class="item" style="text-align: center;">
                                <a href="http://www.unomaha.edu" target="_blank">
                                    <img src="{{ asset('images/StudentLearning.jpg') }}" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="icon-prev"></span></a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="icon-next"></span></a>
                    </div>
                    <!-- /.carousel -->
                </div>



            </div>

        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<!-- Comments Form -->
                {{-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center;"><h4>Discussions</h4></div>
                
                 <div class="panel-body">
                                        <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr> --}}

       

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading" style="text-align: center;"><h4>Discussions</h4></div>
            <div class="panel-body">

                {!!Form::open(['method'=>'POST','action'=>'UserCommentsController@store'])!!}
                 @include('common.errors')
                 @include('common.flash')

                <input type="hidden" name="user_id" value="{{$user->id}}">


                <div class="form-group">
                    {!!Form::label('comment_text','Comment:')!!}
                    {!!Form::textarea('comment_text', null, ['class'=>'form-control','rows'=>3])!!}
                </div>
                <div>
                    {!!Form::submit('Submit Comment',['class'=>'btn btn-primary'])!!}
                    {!!Form::close()!!}

                </div>

                </div>
            </div>
            </div>

          {{--       <!-- Posted Comments -->

                @if(count($comments) > 0)

                @foreach($comments as $comment)


                 <!-- Comment -->

                   <div class="col-md-8 col-md-offset-2">
                   <br>
                   <br>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

               @endforeach

                @endif

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment --> --}}
                

@endsection

@section('footer')


<style>
    /* -----------------------------------------------
    CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */

    /* Carousel base class */
    .carousel { margin-bottom: 0px; }

    /* Since positioning the image, we need to help out the caption */
    /* Declare heights because of positioning of img element */
    .carousel .item { height: 400px; /*background-color:#555;*/ }

    .carousel img { /*position: absolute;*/ /*top: 0;*/ /*left: 0;*/ min-height: 400px; }

    /* RESPONSIVE CSS
    -------------------------------------------------- */
    @media (min-width: 768px) {
        /* Bump up size of carousel content */
        .carousel-caption p { margin-bottom: 20px; font-size: 21px; line-height: 1.4; }
    }

    img.img-responsive { display: block; margin-left: auto; margin-right: auto; }
    /*span.icon-next, span.icon-prev { margin: 0px !important; position: static !important; }*/
    span.icon-prev { margin-left: -30px !important }
    span.icon-next { margin-right: -30px !important }
</style>
@endsection