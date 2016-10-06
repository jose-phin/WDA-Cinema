<?php

namespace App\Http\Controllers;

use App\Location;
use App\Movie;
use Illuminate\Http\Request;

use App\MovieSession;
use App\Http\Requests;

class SearchController extends Controller
{
    /**
     * Displays the search page.
     * Movies and locations are provided for use with EasyAutoComplete.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Prepare the movie names JSON array
        $movies_now_showing = Movie::where('is_now_showing', true)->get();

        $movie_names = array();

        foreach ($movies_now_showing as $movie) {
            array_push($movie_names, $movie->title);
        }

        // Prepare the location names JSON array
        $locations = Location::all();
        $location_names = array();

        foreach ($locations as $location) {
            array_push($location_names, $location->name);
        }

        return view('search', ['movies' => json_encode($movie_names), 'locations' => json_encode($location_names)]);
    }

    /**
     * Gets all sessions for a movie.
     *
     * @param Request $request request should include the title of the movie
     * @return \Illuminate\Http\JsonResponse array of matching sessions
     */
    public function getSessionsByMovie(Request $request)
    {
        $movie_title = $request->title;

        $sessions = MovieSession::whereHas('movie', function($q) use ($movie_title) {
            $q->where('title', $movie_title);
        })->with('location')->get();

        if (count($sessions) <= 0) {
            abort(404, "Movie not found.");
        }

        return response()->json(['sessions' => $sessions]);
    }

    /**
     * Gets all sessions for a location/cinema.
     *
     * @param Request $request request should include the name of the cinema
     * @return \Illuminate\Http\JsonResponse array of matching sessions
     */
    public function getSessionsByLocation(Request $request)
    {
        $location_name = $request->name;

        $location = Location::where('name', $location_name)->first();
        $sessions = $location->sessions()->with('movie')->get();

        if (count($sessions) <= 0) {
            abort(404, "Cinema not found.");
        }

        return response()->json(['sessions' => $sessions]);
    }

}
