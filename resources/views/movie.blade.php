@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')
<div class="container">
    <div class="content">

        <h2>Movies</h2>

        <div class="flex-container">
            <?php

            // $movies array is passed in via the MovieController, which handles routing logic when user
            // hits one of the Task 3 endpoints in routes.php

            foreach ($movies as $movie) {
                echo "<div class=\"item\">";
                echo "<p>Title: " . $movie->title . "</p>";
                echo "<p>Director: " . $movie->director . "</p>";
                echo "<p>Main Cast: " . $movie->main_cast . "</p>";
                echo "<p>Synopsis: " . $movie->synopsis . "</p>";
                echo "</div>";
                echo "<br>";
            }

            ?>
        </div>
    </div>
</div>
@endsection