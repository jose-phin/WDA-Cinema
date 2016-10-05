@extends('layouts.app')

@section('content')
    <!-- Image -->
    <div class="mavericks-carousel">
        <div class="mavericks-carousel-imgContainer">
            <img src="{{ asset('images/suicide_squad_grad.jpg') }}">
        </div>
        <div class="mavericks-carousel-imgContainer">
            <img src="{{ asset('images/snowden_grad.jpg') }}">
        </div>
        <div class="mavericks-carousel-imgContainer">
            <img src="{{ asset('images/interstellar_grad.jpg') }}">
        </div>
    </div>



    <!-- Main -->
    <div class="container">

        {{--Now Showing Row Container--}}
        <div class="row home-nowShowing-row">
            <div class="col-md-12">
                <h1 class="titleHeader sectionHeader home-nowShowingTitle">Now Showing</h1>


                <?php
                ?>

            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function(){
            $('.mavericks-carousel').slick({
                dots: true,
                lazyLoad: 'ondemand',
                autoplay: false,
                autoplaySpeed: 3500,
                arrows: true,
                pauseOnHover: false,
                centerMode: true,
                centerPadding: '60px',
                nextArrow: '<i class="mavericks-carousel-arrow icon-arrow-right"></i>',
                prevArrow: '<i class="mavericks-carousel-arrow icon-arrow-left"></i>',
                responsive: [{
                    breakpoint: 500,
                    settings: {
                        dots: false,
                        arrows: false,
                        centerMode: false
                    }
                }]
            });
        });
    </script>
@endsection
