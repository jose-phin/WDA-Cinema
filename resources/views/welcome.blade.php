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
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

            </div>
        </div>

        <!-- Footer -->
        @include('includes/footer')

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
