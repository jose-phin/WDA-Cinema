<link href="{{ asset('css/site.css') }}" media="all" rel="stylesheet" type="text/css" />

@extends('layouts.app')

@section('content')

    <!--
        Proof-of-concept for a user's cart
    -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Cart</h2>

                <?php

                foreach ($cart_items as $booking) {
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

            </div>

            <div class="col-md-12">
                <h2>Delete</h2>

                <!-- Proof-of-concept, deletes a cart item with ID 7 -->
                <form method="POST" action="{{ url('user/cart/delete/7') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit">Submit</button>
                </form>

                <!-- Another proof-of-concept, checks out all items in a user's cart -->
                <form method="POST" action="{{ url('user/cart/checkout') }}">
                    {{ csrf_field() }}

                    <button type="submit">Checkout</button>
                </form>

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