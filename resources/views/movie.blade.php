@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')
<div class="container">

    <div class="pageTitle-container">
        <i class="movieList-pageTitle-icon icon-fire"></i>
        <h1 class="movieList-pageTitle">Movies Now Showing</h1>
    </div>


    <div class="flex-container">
        <?php

        // $movies array is passed in via the MovieController, which handles routing logic when user
        // hits one of the Task 3 endpoints in routes.php

        foreach ($movies as $movie) {
            echo "<div class=\"movieList-movieItem\">";

            echo "<div class='movieList-moviePosterContainer'><img class='movieList-moviePoster' src='" . $movie->image_url . "'></div>";
            echo "<h5 class='movieList-movieTitle'>".$movie->title."</h5>";
            echo "<p>Director: " . $movie->director . "</p>";
            echo "<p>Main Cast: " . $movie->main_cast . "</p>";
            echo "</div>";
            echo "<br>";
        }


        ?>
    </div>



</div>
@endsection