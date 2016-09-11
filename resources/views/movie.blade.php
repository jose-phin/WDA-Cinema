<!DOCTYPE html>

<!--
    A simple proof-of-concept for Movie fetching functionality.
    Displays either all movies Now Showing or all movies Coming Soon (depending on the route).

    Feel free to delete this and replace with something more appropriate!
-->

<html>
<head>
    <title>Now Showing</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <?php

        echo "<h2>Movies</h2>";

        // $movies array is passed in via the MovieController, which handles routing logic when user
        // hits one of the Task 3 endpoints in routes.php
        foreach ($movies as $movie)
        {
            echo "<div>";
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
</body>
</html>