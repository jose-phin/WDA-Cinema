@extends('layouts.app')
@section('pageTitle', 'Success!')
@section('content')
<div class="container">
    <div class="content">
<<<<<<< HEAD

        <div class="pageTitle-container" id="">
            <h1 class="movieList-pageTitle">Your booking was successful!</h1>
            <hr class="separator-movieList-nowPlaying">
        </div>

        <div class="col-md-6 col-md-offset-3">
            @foreach($bookings as $booking)
                <div class="success-movie">
                    <p><img src="{{ $booking->session->movie->image_url }}"></p>
                    <p><strong>{{ $booking->session->movie->title }}</strong></p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $booking->session->location->name }}</p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $booking->session->time }}</p>
                    <p><i class="fa fa-film" aria-hidden="true"></i> Theatre {{ $booking->session->theater }}</p>
                    <p><i class="fa fa-money" aria-hidden="true"></i> {{ $booking->session->amount }}</p>
                </div>
                <hr class="grey-line">
            @endforeach
        </div>

=======
        <?php

            echo "<h2>Booking Success!</h2>";

            foreach ($bookings as $booking) {
                echo "<div>";
                echo "<p>Movie: " . $booking->session->movie->title . "</p>";
                echo "<p>Date/Time: " . $booking->session->time . "</p>";
                echo "<p>Theater: " . $booking->session->theater . "</p>";
                echo "<p>Location: " . $booking->session->location->name . "</p>";
            }
        ?>
>>>>>>> master
    </div>
</div>
@endsection