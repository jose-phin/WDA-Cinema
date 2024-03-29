@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')

    <?php
    $sessions = $movie->sessions;
    ?>

    <div class="singleMovie-moviePosterLg">
        <?php echo "<img class='singleMovie-moviePosterImage' src='" . $movie->image_url . "'>" ?>
    </div>

    <!-- Container begins -->
    <div class="container aboveBackground">

        <div class="flex-container container-fluid">

            <div class="col-md-12">

                <div class='singleMovie-mainInformation'>
                    <div class='singleMovie-moviePosterContainer'>
                        <img class="movieList-moviePoster" src="{{$movie->image_url}}">
                    </div>

                    <h3 class='singleMovie-movieTitle'>{{$movie->title}}</h3>

                    <div class='singleMovie-infoContainer'>
                        <div class='singleMovie-subSection'>
                            <p class='singleMovie-subHeading'>
                                Release
                            </p>
                            <p>
                                {{date('j F, Y', $movie->release_date)}}
                            </p>
                        </div>

                        <div class='singleMovie-subSection'>
                            <p class='singleMovie-subHeading'>
                                Genre
                            </p>
                            <p>
                                {{$movie->genre}}
                            </p>
                        </div>

                    <div class='singleMovie-subSection'>
                        <p class='singleMovie-subHeading'>
                            Runtime
                        </p>
                        <p>
                            {{$movie->running_time}}
                        </p>
                    </div>
                    <div class="singleMovie-buttonContainer">
                        @if($movie->is_now_showing == True)
                        <button type='submit' id='cartButton' class='btn btn-primary redButton wishlistButton' data-toggle='modal' data-target='.ticket-modal-lg'>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart
                        </button>
                        @endif

                        @if(Auth::check())
                            @if(!isSet($wish_id))
                                <form method="POST" action="{{ url('user/wish') }}">
                                    {{ csrf_field() }}
                                    <input id="wishlistId" type="hidden" value="{{$movie->id}}" name="movie_id">
                                    <input id="wishlistNotes" type="hidden" value="" name="notes">
                                    <button type='submit' id='wishlistButton' class='btn btn-secondary redButton wishlistButton'>
                                        <i class="icon-addToWishlist icon-heart"></i>Add to Wishlist
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ url('user/wish/' . $wish_id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type='submit' id='wishlistButton' class='btn btn-secondary redButton wishlistButton'>
                                        <i class="icon-addToWishlist icon-ban"></i> Remove from Wishlist
                                    </button>
                                </form>
                            @endif
                        @endif

                        </div>
                    </div>
                </div>

                <!-- Buy tickets modal -->
                <div class="modal fade ticket-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Buy Tickets">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <h3 class="modal-title buy-tickets">Add to Cart</h3>
                            <div class="modal-body">

                                <form id="cartForm" method="POST" action="{{ url('user/cart/add') }}">
                                {{ csrf_field() }}

                                <!-- Select a location -->
                                    <div class="dropDown-container">
                                        <div class="dropDown-red">
                                            <select id="selectLocation">
                                                <option value="-1" selected="true" disabled="disabled">Select a location</option>
                                            </select>
                                        </div>

                                        <!-- Select a session -->
                                        <div class="dropDown-red">
                                            <select id="selectSession" name="session_id">
                                                <option value="-1" selected="true" disabled="disabled">Select a session time</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Quantity -->
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Ticket Type</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Adult</td>
                                            <td class="price">25.00</td>
                                            <td><select class="quantity" name="adult_qty"></select></td>
                                            <td><span class="subtotal">$0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>Concession</td>
                                            <td class="price">20.00</td>
                                            <td><select class="quantity" name="concession_qty"></select></td>
                                            <td><span class="subtotal">$0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td>Child</td>
                                            <td class="price">15.00</td>
                                            <td><select class="quantity" name="child_qty"></select></td>
                                            <td><span class="subtotal" id="last">$0.00</span></td>
                                        </tr>
                                        </tbody>

                                    </table>

                                    <div class="total-price">
                                        <p class="total-text">Total <span class="total total-text">$0.00</span></p>
                                    </div>

                                </form>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" form="cartForm" class="btn btn-primary buy-now redButtonSml" disabled>Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="singleMovie-secondaryInformation">
                    <div class="singleMovie-movieSynopsis">
                        <?php
                        echo "<h4>Synopsis</h4>";
                        echo "<p>" . $movie->synopsis . "</p>";
                        echo "<br>";
                        echo "<h4>Cast</h4>";
                        echo "<p>" . $movie->main_cast . "</p>";
                        echo "<br>";
                        ?>
                    </div>
                </div>

            </div>

        </div>

        <?php
        $locations = array();
        $output = array();
        foreach ($sessions as $session) {
            array_push($locations, $session->location);
        }
        $output['location'] = $locations;
        $output['sessions'] = $sessions;
        echo "<div id='js' style='display:none'>" . json_encode($output) . "</div>";
        ?>

        <script src="{{ URL::asset('js/bookMovieSession.js') }}"></script>

        <script>
            /* Check that a user is logged in - if not, send them to the login screen */
            $('#cartButton').click(function(e) {
                e.preventDefault();
                var loggedIn = false;
                @if(Auth::check())
                        loggedIn = true;
                @endif
                if (!loggedIn) {
                    window.location.replace('{{ url('user/cart/auth_redirect') }}');

                    // Return false to ensure "Add to Cart" animation doesn't trigger
                    return false;
                } else {
                    return true;
                }
            })
        </script>

    </div>
@endsection