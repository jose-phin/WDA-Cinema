<link href="{{ asset('css/site.css') }}" media="all" rel="stylesheet" type="text/css" />

@extends('layouts.app')
@section('pageTitle', 'My Cart')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 cart-container">
            <h2 class="title">My Cart</h2>
            <hr class="grey-line">
            <?php

                if ($cart_items->isEmpty()) {

                    echo "<p>You haven't added anything to your cart yet.";
                    echo "<p>Visit the <a class='cart-link' href='" . url('movies') . "'>movies</a> catalogue to see what's currently playing.</p>";

                } else {

                    echo "<table class=\"cart-table\">";

                    foreach ($cart_items as $i=>$booking) {

                        echo "<tr>";

                        echo "<td class=\"cart-moviePoster-td\">";
                        echo "<div class='cart-moviePoster'><img class='movieList-moviePoster' src='" . $booking->session->movie->image_url . "'></div></td>";
                        echo "<td class=\"cart-movieInfo\"><h4 class=\"cart-h4\">" . $booking->session->movie->title . "</h4>";
                        echo "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> &nbsp;" . $booking->session->location->name . "<br>";
                        echo "<i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> " . $booking->session->time . "<br>";
                        echo "<i class=\"fa fa-film\" aria-hidden=\"true\"></i> Theater #" . $booking->session->theater;
                        echo "</td><td>";

                        echo "<form id=\"booking-row-" . $i . "\" method=\"POST\" action=\"cart/update/" . $booking->id . "\"><h4 class=\"cart-h4\">Tickets</h4>";
                        echo csrf_field();
                        echo "<input type=\"hidden\" name=\"_method\" value=\"PUT\">";
                        echo "<div class=\"seat-type\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i> Adult";
                        echo "<input id=\"adult-seat\" class=\"seat-qty\" maxlength=\"2\" size=\"2\" type=\"text\" name=\"adult_qty\" value=\"" . $booking->adult_qty . "\"></div>";

                        echo "<div class=\"seat-type\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i> Child";
                        echo "<input id=\"child-seat\" class=\"seat-qty\" maxlength=\"2\" size=\"2\" type=\"text\" name=\"child_qty\" value=\"" . $booking->child_qty . "\"></div>";

                        echo "<div class=\"seat-type\"><i class=\"fa fa-user\" aria-hidden=\"true\"></i> Concession";
                        echo "<input id=\"concession-seat\" class=\"seat-qty\" maxlength=\"2\" size=\"2\" type=\"text\" name=\"concession_qty\" value=\"" . $booking->concession_qty . "\"></div>";

                        echo "<td></form>";

                        echo "<button type=\"submit\" form=\"booking-row-" . $i . "\" class=\"btn btn-primary redButton update-seat\" disabled>Update</button>";

                        echo "<form method=\"POST\" action=\"cart/delete/" . $booking->id . "\">";
                        echo csrf_field();
                        echo "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">";
                        echo "<button type=\"submit\" class=\"btn btn-primary redButton\">Delete&nbsp;</button></form>";

                        echo "</tr></td>";

                    }

                    echo "</table>";

                }

            ?>

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

                        </form>

                        </div> <!-- End modal body -->
                        <div class="modal-footer">
                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            <div class="modal-footer-btn">
                                <button type="submit" form="checkOut" class="btn btn-primary redButton">Checkout</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- End modal -->

            @if ($cart_items->isEmpty())

                @else

                    <hr class="grey-line">

                    <!-- Pay now button -->
                    <div class="col-md-12">
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
    /* Seat listener */
    $(document).ready(function() {

        $('.seat-qty').change(function()  {
            console.log("I saw that.");
            var new_adult_qty = $("#adult-seat").val();
            var new_child_qty = $("#child-seat").val();
            var new_concession_qty = $("#concession-seat").val();
            console.log("Adult: " + new_adult_qty);
            console.log("Child: " + new_child_qty);
            console.log("Concession: " + new_concession_qty);
            $(this).closest('tr').find('.update-seat').prop("disabled", false);

        });

    });
</script>
@endsection