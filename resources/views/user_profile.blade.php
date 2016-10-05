<link href="{{ asset('css/site.css') }}" media="all" rel="stylesheet" type="text/css" />

@extends('layouts.app')

@section('content')

    <!--
        Proof-of-concept for a user's cart.

        Displays all bookings and wishes made by a user.
    -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>My Profile</h1>
                <hr>
                <div class="user-information">
                    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>

                <h2>My Bookings</h2>

                <?php

                    echo "<div>";

                    if (empty($booking)) {

                        echo "<p>You currently have no bookings!</p>";
                        echo "</div>";
                        echo "<br>";

                    } else {

                        foreach ($bookings as $booking) {

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

                    }


                ?>

                <h2>My Wishlist</h2>

                <?php

                    echo "<div>";

                    if (empty($wish)) {

                        echo "<p>You currently have no movies on your wishlist!</p>";
                        echo "</div>";
                        echo "<br>";

                    } else {

                        echo "<ul>";

                        foreach($wishes as $wish) {
                            echo "<li>" . $wish->movie->title . " ($wish->notes) " . "</li>";
                        }

                        echo "</ul>";
                        echo "</div>";
                    }
                ?>

            </div>
        </div>

    </div>
</div>
@endsection