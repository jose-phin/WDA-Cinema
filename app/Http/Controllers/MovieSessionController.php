<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MovieSession;
use App\Http\Requests;

class MovieSessionController extends Controller
{
    /**
     * Fetches all sessions for a movie, at any cinema location
     *
     * @param $movie_id int
     * @return Response
     */
    public function showSessionsByMovie($movie_id)
    {
        // Access the movie that a session belongs to, and run a nested query
        // to filter in the correct movie
        $sessions = MovieSession::whereHas('movie', function($q) use ($movie_id) {
            $q->where('id', $movie_id);
        })->get();

        // Reroutes the user to some view and pass in our sessions array
        return view('movie_sessions', ['sessions' => $sessions]);
    }

    /**
     * Fetches all sessions for any movie at a given cinema location
     *
     * @param $location_id int
     * @return Response
     */
    public function showSessionsByCinema($location_id)
    {
        $sessions = MovieSession::where('location_id', $location_id)->get();

        return view('movie_sessions', ['sessions' => $sessions]);
    }

}
