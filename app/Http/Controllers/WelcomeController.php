<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome', ['movies' => Movie::where('is_now_showing', true)->get()]);
    }
}
