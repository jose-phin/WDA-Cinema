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

                <div class="titleHeaderContainer">
                    <h1 class="titleHeader sectionHeader home-nowShowingTitle">Now Showing</h1>

                    <a class="btn-homeNowShowing" href="{{ url('movies/') }}">All Movies</a>
                </div>


                <div class="flex-container container-fluid homePage-flexContainer">

                    <?php
                        foreach ($movies as $movie) {
                            if (($movie->is_now_showing == true)){
                                echo "<div class=\"movieList-movieItem homePage-movieItem\">";
                                echo "<div class='movieList-moviePosterContainer'><a href='./" . $movie->title . "'><img class='movieList-moviePoster' src='" . $movie->image_url . "'></a></div>";
                                echo "</div>";
                            }
                        }

                    ?>

                </div>

            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function(){
            $('.mavericks-carousel').slick({
                dots: true,
                lazyLoad: 'ondemand',
                autoplay: true,
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
