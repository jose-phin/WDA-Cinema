<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Movie;
use App\Http\Requests;

class MovieController extends Controller
{
    /**
     * Fetch all movies
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAllMovies()
    {
        return view ('movie', ['movies' => Movie::all()]);
    }

    /**
     * Fetch all movies that are Now Showing
     *
     * @return Response
     */
    public function showNowShowing()
    {
        return view('movie', ['movies' => Movie::where('is_now_showing', true)->get()]);
    }

    /**
     * Fetch all movies that are Coming Soon
     *
     * @return Response
     */
    public function showComingSoon()
    {
        return view('movie', ['movies' => Movie::where('is_now_showing', false)->get()]);
    }

    /**
     * Fetch one movie based on Id
     *
     * @param string $movieId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMovieById($movieId, Request $request)
    {
        if (count(Movie::where('id', $movieId)->get()) <= 0) {
            abort(404, "Movie not found.");
        }

        $wishId = null;

        if(Auth::check()) {
            $wish = $request->user()->wishes->where("movie_id", $movieId)->first();

            if(isSet($wish)){
                $wishId = $wish->id;
            }
        }

        return view('individual_movie', ['movie' => Movie::where('id', $movieId)->first(), 'wish_id' => $wishId]);

    }

}