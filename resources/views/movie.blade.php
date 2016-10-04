@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')
<div class="container">

    <div class="pageTitle-container">
        <i class="movieList-pageTitle-icon icon-fire"></i>
        <h1 class="movieList-pageTitle">Movies Now Showing</h1>
        <hr class="separator-movieList-nowPlaying">
    </div>


    <div class="flex-container container-fluid">
        <?php

        // $movies array is passed in via the MovieController, which handles routing logic when user
        // hits one of the Task 3 endpoints in routes.php

        foreach ($movies as $movie) {
            echo "<div class=\"movieList-movieItem\">";

            echo "<div class='movieList-moviePosterContainer'><img class='movieList-moviePoster' src='" . $movie->image_url . "'></div>";
            echo "<h5 class='movieList-movieTitle'>" . $movie->title . "</h5>";
            echo "<p class='movieList-movieDirector'>". $movie->director . "</p>";
            echo "<hr class='separator-movieList-detail'>";
            echo "<p class='movieList-movieGenres'>" . $movie->genre . "</p>";
            echo "<p class='movieList-movieReleaseDate'>" . date('d F Y', $movie->release_date);
            echo "</div>";
        }


        ?>
    </div>



</div>
@endsection