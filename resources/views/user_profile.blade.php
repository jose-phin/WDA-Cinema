<link href="{{ asset('css/site.css') }}" media="all" rel="stylesheet" type="text/css" />

@extends('layouts.app')

@section('content')

    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Bookings</h2>

                <?php

                    foreach ($bookings as $booking) {
                        echo "<div>";

                        echo "<p>Movie: " . $booking->session->movie->title . "</p>";
                        echo "<p>Date/Time: " . $booking->session->time . "</p>";
                        echo "<p>Theater: " . $booking->session->theater . "</p>";
                        echo "<p>Location: " . $booking->session->location->name . "</p>";
                        echo "<p>Adult: " . $booking->adult_qty . "</p>";
                        echo "<p>Child: " . $booking->child_qty . "</p>";
                        echo "<p>Concession: " . $booking->concession_qty . "</p>";

                        echo "</div>";

                        echo "<br>";
                    }

                ?>

                <h2>Wish List</h2>

                <?php
                    echo "<div>";
                    echo "<ul>";

                    foreach($wishes as $wish) {
                        echo "<li>" . $wish->movie->title . "</li>";
                    }

                    echo "</ul>";
                    echo "</div>";
                ?>

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
@endsection