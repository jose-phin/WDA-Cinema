@extends('layouts.app')
@section('pageTitle', 'Success!')
@section('content')
<div class="container">
    <div class="content">

        <div class="pageTitle-container" id="">
            <h1 class="movieList-pageTitle">Your booking was successful!</h1>
            <hr class="separator-movieList-nowPlaying">
        </div>

        <div class="col-md-6 col-md-offset-3">
            @foreach ($bookings as $booking)
                <div class="success-movie">
                    <p><img src="{{ $booking->session->movie->image_url }}"></p>
                    <div class="success-movie-info">
                        <p><strong>{{ $booking->session->movie->title }}</strong></p>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $booking->session->location->name }} &nbsp; <i class="fa fa-film" aria-hidden="true"></i> Theatre {{ $booking->session->theater }}</p>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $booking->session->time }}</p>
                        <p><i class="fa fa-ticket" aria-hidden="true"></i> Adults x {{ $booking->adult_qty }}<br>
                        <i class="fa fa-ticket" aria-hidden="true"></i> Children x {{ $booking->child_qty }}<br>
                        <i class="fa fa-ticket" aria-hidden="true"></i> Concession x {{ $booking->concession_qty }}</p>
                        <p><i class="fa fa-money" aria-hidden="true"></i> Subtotal ${{ number_format(($booking->adult_qty * 25) + ($booking->child_qty * 15) + ($booking->concession_qty * 20), 2) }}</p>
                    </div>
                </div>
                <hr class="grey-line">
            @endforeach
        </div>
    </div>
</div>
@endsection