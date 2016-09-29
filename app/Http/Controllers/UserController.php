<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Shows the profile for the currently authenticated user.
     * Fetches all of a user's PAID bookings, and all items in a user's wish list.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProfile(Request $request) {
        $user = $request->user();

        return view('user_profile', ['bookings' => $user->bookings()->where('paid', true)->get(), 'wishes' => $user->wishes]);
    }
}
