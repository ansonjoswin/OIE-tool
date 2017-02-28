@extends('layouts.app')

@section('content')

{{--  --}}
                                  
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