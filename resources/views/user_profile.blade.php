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
                    <div>
                        @if (empty($wishes))
                            <p>You currently have no movies on your wishlist!</p>
                        @else
                            <div>
                            @foreach($wishes as $i=>$wish)
                                    <div class="wishlist-item--container">
                                        <div class="wishlist-item--title-container">
                                            <p>
                                                {{$wish->movie->title}} @if(isset($wish->notes) && strcmp($wish->notes, "") !== 0) ({{$wish->notes}}) @endif
                                            </p>
                                            <button id="wishlist-edit--button-{{$i}}" type='submit' class='btn btn-link' onclick="toggleNotesEdit(event, '{{$i}}')">
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ url('user/wish/' . $wish->id) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type='submit' class='btn btn-link'>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        <form id="wishlist-edit-{{$i}}" class="wishlist-item--edit" method="POST" action="{{ url('user/wish/' . $wish->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">

                                            <input type="text" name="notes">
                                            <button type="submit" class='btn btn-link'>Update</button>
                                        </form>
                                    </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                <br>
            </div>
        </div>

    </div>
</div>

<script>
    function toggleNotesEdit(e, elementIndex) {
        e.preventDefault();
        var editElement = $("#wishlist-edit-" + elementIndex);
        if( editElement.css("display") === "flex") {
            editElement.css("display", "none");
            $("#wishlist-edit--button-" + elementIndex).text("Edit");
        }
        else if( editElement.css("display") === "none" ) {
            editElement.css("display", "flex");
            $("#wishlist-edit--button-" + elementIndex).text("Hide");
        }
        console.log(  );
    }
</script>
@endsection