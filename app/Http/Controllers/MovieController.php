<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Fetch one movie based on ID
     *
     *
     */
    public function showMovieByTitle($movieTitle)
    {
        if (count(Movie::where('title', $movieTitle)->get()) <= 0) {
            abort(404, "Movie not found.");
        }

        return view('individual_movie', ['movies' => Movie::where('title', $movieTitle)->get()]);
    }

}