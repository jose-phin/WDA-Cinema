@extends('layouts.app')
@section('pageTitle', 'Movies')
@section('content')

    <?php
        foreach ($movies as $movie) {
    ?>

    <div class="singleMovie-moviePosterLg">
        <?php echo "<img class='singleMovie-moviePosterImage' src='" . $movie->image_url . "'>" ?>
    </div>

    <!-- Container begins -->
    <div class="container aboveBackground">

    <div class="flex-container container-fluid">

        <div class="col-md-12">

            <?php

                echo "<div class='singleMovie-mainInformation'>";
                echo "<div class='singleMovie-moviePosterContainer'><img class=\"movieList-moviePoster\" src='" . $movie->image_url . "'></div>";

                echo "<h3 class='singleMovie-movieTitle'>" . $movie->title . "</h3>";

                echo "<div class='singleMovie-infoContainer'><div class='singleMovie-subSection'><p class='singleMovie-subHeading'>Release</p>";
                echo "<p>" . date('Y-m-d', $movie->release_date) . "</p></div>";

                echo "<div class='singleMovie-subSection'><p class='singleMovie-subHeading'>Genre</p>";
                echo "<p>" . $movie->genre . "</p></div>";

                echo "<div class='singleMovie-subSection'><p class='singleMovie-subHeading'>Runtime</p>";
                echo "<p>" . $movie->running_time . "</div>";

                echo "<button type='submit' class='btn btn-primary redButton'><a href='#'>Buy Tickets</a></button>";
                echo "</div></div>";

            }

            ?>


            <div class="singleMovie-secondaryInformation">
                <div class="singleMovie-movieSynopsis">
                    <?php

                        echo "<h4>Synopsis</h4>";
                        echo "<p>" . $movie->synopsis . "</p>";
                        echo "<br>";

                        echo "<h4>Cast</h4>";
                        echo "<p>" . $movie->main_cast . "</p>";
                        echo "<br>";

                    ?>
                </div>
            </div>


        </div>

    </div>



</div>
@endsection