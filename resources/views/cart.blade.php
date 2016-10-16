<link href="{{ asset('css/site.css') }}" media="all" rel="stylesheet" type="text/css" />

@extends('layouts.app')
@section('pageTitle', 'My Cart')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="pageTitle-container" id="">
                <h1 class="movieList-pageTitle">My Cart</h1>
                <hr class="separator-movieList-nowPlaying">
            </div>


            <!-- Table -->
            <div class="cart-tableContainer">
                @if ($cart_items->isEmpty())
                    <p>You haven't added anything to your cart yet.</p>
                    <p>Visit the <a class='cart-link' href="{{ URL('movies') }}">movies</a> catalogue to see what's currently playing.</p>

                @else
                    <div class="cart-tableColumnHeadings">
                        <div class="cart-tableColumnHeadings-movie">
                            Movie
                        </div>
                        <div class="cart-tableColumnHeadings-information">
                            Booking Information
                        </div>
                        <div class="cart-tableColumnHeadings-payment">
                            Payment Summary
                        </div>
                        <div class="cart-tableColumnHeadings-actions">
                            Actions
                        </div>
                    </div>
                    @foreach($cart_items as $i=>$booking)
                        <div class="wishlist-item-container">
                            <div class="wishlist-item-movieContainer">
                                <div class='movieList-moviePosterContainer wishlist-item-moviePosterContainer'><img class='movieList-moviePoster' src='{{$booking->session->movie->image_url}}'><img class='movieList-moviePoster posterGlow' src='{{$booking->session->movie->image_url}}'></div>
                                <h5 class="movieList-movieTitle wishlist-item">
                                    {{$booking->session->movie->title}}
                                </h5>
                            </div>
                            <div class="cart-information">
                                <div class="cart-information-content">
                                    <form id="booking-row-{{$i}}" method="POST" action="cart/update/{{$booking->id}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$booking->session->location->name}}</p>
                                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{$booking->session->time}}</p>
                                        <p><div class="seat-type">
                                                <i class="fa fa-ticket" aria-hidden="true"></i> Adults
                                                <input id="adult-seat" class="seat-qty" maxlength="2" size="2" type="text" name="adult_qty" style="color: black" value="{{$booking->adult_qty}}">
                                           </div>
                                           <div class="seat-type">
                                                <i class="fa fa-ticket" aria-hidden="true"></i> Children
                                                <input id="child-seat" class="seat-qty" maxlength="2" size="2" type="text" name="child_qty" style="color: black" value="{{$booking->child_qty}}">
                                           </div>
                                           <div class="seat-type">
                                           <i class="fa fa-ticket" aria-hidden="true"></i> Concession
                                           <input id="concession-seat" class="seat-qty" maxlength="2" size="2" type="text" name="concession_qty" style="color: black" value="{{$booking->concession_qty}}">
                                           </div>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="cart-payment">
                                <div class="cart-payment-content">
                                    <p id="payment-summary">$<span class="subtotal">{{ number_format(($booking->adult_qty * 25) + ($booking->child_qty * 15) + ($booking->concession_qty * 20), 2) }}</span></p>
                                </div>
                            </div>
                            <span id="actions">
                            <div class="cart-actions">
                                <div class="cart-actions-content">
                                    <span>
                                        <button type="submit" form="booking-row-{{$i}}" class="btn btn-primary update-seat redButtonSml" disabled>Update</button>
                                    </span>
                                    <p>
                                        <form method="POST" action="cart/delete/{{$booking->id}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-primary redButtonSml">&nbsp;Delete&nbsp;</button>
                                        </form>
                                    </p>
                                </div>
                            </div>
                            </span>
                        </div>
                    @endforeach

                    <!-- Total cost -->
                    <div class="cart-total-cost">
                        <p>Total <span class="total-cost"></span></p>
                    </div>

                @endif

            </div>

        </div>

        <div class="col-md-12">

            <!-- Pay now modal -->
            <div class="modal fade pay-now-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Pay Now">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <h3 class="modal-title buy-tickets">Pay Now</h3>
                        <div class="modal-body pay-now-body">

                            <div class="col-sm-6 sml-margin">
                                <h4>Payment Information</h4>
                            </div>
                            <br><br>

                            <form id="checkOut" method="POST" action="{{ url('user/cart/checkout') }}">
                            {{ csrf_field() }}

                            <!-- Personal details -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="name">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="John Doe">
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="name">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="1 Rainbow Way">
                                </div>

                            </div>

                            <!-- Suburb -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="name">Suburb</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="suburb" id="suburb" placeholder="Melbourne">
                                </div>
                            </div>

                            <!-- Postcode -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="name">Post Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="post_code" id="post_code" placeholder="3000">
                                </div>
                            </div>

                            <!-- Mobile number -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="name">Mobile No.</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="">
                                </div>

                            </div>

                            <hr class="grey-line">
                            <div class="col-sm-6">
                                <h4>Billing Information</h4>
                            </div>
                            <br><br>

                            <!-- Name on Card -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="card-holder-name">Name on Card</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="card_holder_name" id="card_holder_name" placeholder="John Doe">
                                </div>
                            </div>

                            <!-- Card number -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="card-number">Card Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="credit_card_number" id="credit_card_number" placeholder="">
                                </div>
                            </div>

                            <!-- Expiry -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="card-number">Expiry Date</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <select class="form-control col-sm-2" name="expiry_month" id="expiry_month">
                                                <option value="">Month</option>
                                                <option value="01">Jan (01)</option>
                                                <option value="02">Feb (02)</option>
                                                <option value="03">Mar (03)</option>
                                                <option value="04">Apr (04)</option>
                                                <option value="05">May (05)</option>
                                                <option value="06">Jun (06)</option>
                                                <option value="07">Jul (07)</option>
                                                <option value="08">Aug (08)</option>
                                                <option value="09">Sep (09)</option>
                                                <option value="10">Oct (10)</option>
                                                <option value="11">Nov (11)</option>
                                                <option value="12">Dec (12)</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-3">
                                            <select class="form-control" name="expiry_year" id="expiry_year">
                                                <option value="">Year</option>
                                                <option value="16">2016</option>
                                                <option value="17">2017</option>
                                                <option value="18">2018</option>
                                                <option value="19">2019</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CVC -->
                            <div class="form-group pay-now">
                                <label class="col-sm-2" for="card-number">CVC</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="card_cvc" id="card_cvc" placeholder="">
                                </div>
                            </div>

                            </form><!-- End form -->

                        </div> <!-- End modal body -->
                        <div class="modal-footer">
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-footer-btn">
                                <button type="submit" form="checkOut" class="btn btn-primary redButtonSml">Checkout</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- End modal -->

            <!-- Pay now button -->
            @if ($cart_items->isEmpty())

                @else

                    <hr class="grey-line">

                    <!-- Pay now button -->
                    <div class="col-md-12 col-md-offset-5">
                        <button type='submit' id='payNowButton' class='btn btn-primary redButton' data-toggle='modal' data-target='.pay-now-modal-lg'>
                            Pay Now
                        </button>
                    </div>

            @endif

        </div>
    </div>
 </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/checkOutFormValidator.js') }}"></script>
<script>
    $(document).ready(function() {

        /* Seat listener */
        $('.seat-qty').change(function()  {
            var new_adult_qty = $("#adult-seat").val();
            var new_concession_qty = $("#concession-seat").val();
            var new_child_qty = $("#child-seat").val();
            var new_total = (new_adult_qty * 25) + (new_concession_qty * 20) + (new_child_qty * 15);
            $(this).parentsUntil('.wishlist-item-container').siblings().find('.update-seat').prop("disabled", false);
        });

        /* Total cost */
        var sum = 0;
        $('.subtotal').each(function() {
            sum += parseFloat($(this).text());
            $('.total-cost').text("$" + sum.toFixed(2));
        });

    });
</script>
@endsection