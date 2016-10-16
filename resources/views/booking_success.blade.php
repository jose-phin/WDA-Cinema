@extends('layouts.app')
@section('pageTitle', 'Success!')
@section('content')
<div class="container">
    <div class="content">
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
    </div>
</div>
@endsection