<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
    @hasSection('pageTitle')
        Mavericks Inc. Cinema | @yield('pageTitle')
    @else
        Mavericks Inc. Cinema
    @endif
</title>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
<!-- Simple-Line-Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Global style -->
    <link rel="stylesheet" href=" {{ URL::asset('css/site.css') }}">


    <!-- Carousel -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>
    <!--Carousel on home page-->
    <link rel="stylesheet" href=" {{ URL::asset('css/mavericks-carousel.css') }}">

{{--<link href="{{ elixir('css/app.css') }}" rel="stylesheet">--}}

<!-- Easy Autocomplete -->
<script type="text/javascript" src="{{ URL::asset('js/jquery.easy-autocomplete.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/easy-autocomplete.min.css') }}">
