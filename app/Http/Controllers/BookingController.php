<?php

namespace App\Http\Controllers;

use App\Booking;
use App\MovieSession;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class BookingController extends Controller
{
    /**
     * Adds a new booking for a user
     *
     * @param Request $request should have [movie session id, amount, type]
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request) {
        $user = $request->user();

        // If this fails, then an automatic 404 will be raised, and the user will be redirected
        $session = MovieSession::findOrFail($request->session_id);

        // Create the new booking and define the fields on it
        $booking = new Booking;

        $booking->user_id = $user->id;
        $booking->session_id = $session->id;
        $booking->amount = $request->amount;
        $booking->type = $request->type;

        // Store our new booking
        $booking->save();

        return view('booking_success', ['booking' => $booking]);
    }
}
