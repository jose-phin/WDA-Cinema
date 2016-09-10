<!DOCTYPE html>

<!--
    A simple proof-of-concept for Session fetching functionality.
    Displays either all sessions for a movie, at any cinema location OR all sessions for any movie, at a specific
    cinema location.

    Feel free to delete this and replace with something more appropriate!
-->

<html>
<head>
    <title>Laravel</title>

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
            echo "<h2>Sessions</h2>";

            foreach ($sessions as $session)
            {
                echo "<div>";
                echo "<p>Movie: ".$session->movie->title."</p>";
                echo "<p>Location: ".$session->location->name."</p>";
                echo "<p>Time: ".$session->time."</p>";
                echo "<p>Theater: ".$session->theater."</p>";
                echo "</div>";

                echo "<br>";
            }
        ?>
    </div>
</div>
</body>
</html>