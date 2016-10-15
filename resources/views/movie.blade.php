@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')
<div class="container">

    <div class="movieList-segmentedControlContainer">
        <a onClick="goToByScroll('nowShowing-block')">
            <div class="movieList-segmentedControl segmentedControl-nowShowing">
                Now Showing
            </div>
        </a>

        <a onClick="goToByScroll('comingSoon-block')">
            <div class="movieList-segmentedControl segmentedControl-comingSoon">
                Coming Soon
            </div>
        </a>
    </div>

    <div class="pageTitle-container" id="nowShowing-block">
        <i class="movieList-pageTitle-icon icon-fire"></i>
        <h1 class="movieList-pageTitle">Movies: Now Showing</h1>
        <hr class="separator-movieList-nowPlaying">
    </div>


    <div class="flex-container container-fluid moviesPage-flexContainer">
        <?php
        foreach ($movies as $movie) {
            if ($movie->is_now_showing == true){
                echo "<a href='./movies/" . $movie->id . "' class='movieList-movieItemContainer'>";
                echo "<div class=\"movieList-movieItem\">";
                echo "<div class='movieList-moviePosterContainer'><img class='movieList-moviePoster' src='" . $movie->image_url . "'><img class='movieList-moviePoster posterGlow' src='" . $movie->image_url . "'></div>";
                echo "<h5 class='movieList-movieTitle'>" . $movie->title . "</h5>";
                echo "<p class='movieList-movieDirector'>". $movie->director . "</p>";
                echo "<hr class='separator-movieList-detail'>";
                echo "<p class='movieList-movieGenres'>" . $movie->genre . "</p>";
                echo "<p class='movieList-movieReleaseDate'>" . date('d F Y', $movie->release_date);
                echo "</div>";
                echo "</a>";

            }
        }
        ?>
    </div>




    {{--Coming Soon--}}
    <div class="pageTitle-container" id="comingSoon-block">
        <i class="movieList-pageTitle-icon icon-hourglass"></i>
        <h1 class="movieList-pageTitle movieList-pageTitle-comingSoon">Coming Soon</h1>
        <hr class="separator-movieList-comingSoon">
    </div>


    <div class="flex-container container-fluid moviesPage-flexContainer">
        <?php

        // $movies array is passed in via the MovieController, which handles routing logic when user
        // hits one of the Task 3 endpoints in routes.php

        foreach ($movies as $movie) {
            if ($movie->is_now_showing == false){
                echo "<a href='./movies/" . $movie->id . "' class='movieList-movieItemContainer'>";
                echo "<div class=\"movieList-movieItem\">";
                echo "<div class='movieList-moviePosterContainer'><img class='movieList-moviePoster' src='" . $movie->image_url . "'><img class='movieList-moviePoster posterGlow' src='" . $movie->image_url . "'></div>";
                echo "<h5 class='movieList-movieTitle'>" . $movie->title . "</h5>";
                echo "<p class='movieList-movieDirector'>". $movie->director . "</p>";
                echo "<hr class='separator-movieList-detail'>";
                echo "<p class='movieList-movieGenres'>" . $movie->genre . "</p>";
                echo "<p class='movieList-movieReleaseDate'>" . date('d F Y', $movie->release_date);
                echo "</div>";
                echo "</a>";
            }
        }


        ?>
    </div>

</div>
@endsection