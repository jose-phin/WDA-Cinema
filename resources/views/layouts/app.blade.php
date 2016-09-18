<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes/head')
</head>
<body id="app-layout">
    @include('includes/nav')

    @yield('content')

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
