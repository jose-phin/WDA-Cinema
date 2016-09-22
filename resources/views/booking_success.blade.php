<!DOCTYPE html>

<!--
    Proof-of-concept for view presented to a user after a booking has been successfully made.

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
            echo "<h2>Booking Success!</h2>";

            echo "<div>";
            echo "<p>Movie: " . $booking->session->movie->title . "</p>";
            echo "<p>Date/Time: " . $booking->session->time . "</p>";
            echo "<p>Theater: " . $booking->session->theater . "</p>";
            echo "<p>Location: " . $booking->session->location->name . "</p>";
            echo "<p>Amount: " . $booking->amount . "</p>";
            echo "<p>Type: " . $booking->type . "</p>";
        ?>
    </div>
</div>
</body>
</html>