<link href="{{ asset('css/site.css') }}" media="all" rel="stylesheet" type="text/css" />

@extends('layouts.app')

@section('content')

    <!-- Image -->
    <div id="mavericks-carousel">
        <div>
            <img src="{{ asset('images/suicide_squad_grad.jpg') }}">
        </div>
        <div>
            <img src="{{ asset('images/snowden_grad.jpg') }}">
        </div>
        <div>
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
        <footer>
            <div class="row">
                <div class="col-md-6">
                    <h2>Footer</h2>
                    <h4>WDA Assignment Two</h4>
                    <p>Joshua Pancho</p>
                    <p>Dennis Hou</p>
                    <p>Jacqueline Shadforth</p>
                    <p>Josephine Pramudia</p>
                    <p>Chloe Smith</p>
                </div>
            </div>
        </footer>

    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#mavericks-carousel').slick({
            lazyLoad: 'ondemand',
            autoplay: true,
            autoplaySpeed: 3500,
            fade: true,
            arrows: false,
            pauseOnHover: false
        });
    });
</script>
@endsection
