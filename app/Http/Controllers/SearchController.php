<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MovieSession;
use App\Http\Requests;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function getSessionsByMovie(Request $request)
    {
        $movie_id = $request->id;

        $sessions = MovieSession::whereHas('movie', function($q) use ($movie_id) {
            $q->where('id', $movie_id);
        })->get();

        if (count($sessions) <= 0) {
            abort(404, "Movie not found.");
        }

        return response()->json(['sessions' => $sessions]);
    }

    public function getSessionsByLocation(Request $request)
    {
        $location_id = $request->id;

        $sessions = MovieSession::where('location_id', $location_id)->get();

        if (count($sessions) <= 0) {
            abort(404, "Cinema not found.");
        }

        return response()->json(['sessions' => $sessions]);
    }

}
