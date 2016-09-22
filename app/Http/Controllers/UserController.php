<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function showProfile(Request $request) {
        $user = $request->user();

        return view('user_profile', ['bookings' => $user->bookings]);
    }
}
