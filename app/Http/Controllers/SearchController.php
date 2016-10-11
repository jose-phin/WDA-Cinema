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
     * @return \Illuminate\Http\JsonResponse JSON object containing the matching movie, and all associated sessions
     */
    public function getSessionsByMovie(Request $request)
    {
        $movie_title = $request->title;
        $movie = Movie::where('title', $movie_title)->first();

        $sessions = MovieSession::whereHas('movie', function($q) use ($movie_title) {
            $q->where('title', $movie_title);
        })->with('location')->get();

        if (count($sessions) <= 0) {
            abort(404, "Movie not found.");
        }

        return response()->json(['movie' => $movie, 'sessions' => $sessions]);
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

    /**
     * Gets all sessions for a location/cinema, and groups the results by movie.
     *
     * @param Request $request request should include the name of the cinema
     * @return \Illuminate\Http\JsonResponse array of JSON objects holding sessions for each movie
     * or null if no sessions available for that location
     */
    public function getSessionsByLocationGroupedByMovie(Request $request) {
        $location_name = $request->name;

        // Find all sessions at the specified location
        $location = Location::where('name', $location_name)->first();
        $sessions = $location->sessions()->get();

        $sessionsByMovie = null;

        // If we have matching sessions, move through them and sort them by movie
        if (count($sessions) > 0) {
            $sessionsByMovie = array();

            foreach ($sessions as $session) {
                $curSessionMovieId = $session->movie->id;

                // If the movie ID already exists in our sessionsByMovie array, just append to the sessions subarray
                if (array_key_exists($curSessionMovieId, $sessionsByMovie)) {
                    array_push($sessionsByMovie[$curSessionMovieId]['sessions'], $session);
                } else {
                    $newMovieArray = array(
                        'movie' => $session->movie,
                        'sessions' => array()
                    );

                    array_push($newMovieArray['sessions'], $session);
                    $sessionsByMovie[$curSessionMovieId] = $newMovieArray;
                }

            }
        }

        return response()->json(['data' => $sessionsByMovie]);
    }

}
