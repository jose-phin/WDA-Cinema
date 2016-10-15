function intToDate(dateInt){

    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    var date = new Date(1000* dateInt);
    var day = date.getDate();
    var month = monthNames[date.getMonth()];
    var year = date.getFullYear();
    var dateInString = day + " " + month + " " + year;


    return dateInString;
}


function customTimeToDate(customTime){
    var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];


    var dateTime = customTime.split(' ');
    var date = dateTime[0];
    var timeString = dateTime[1];

    var date = date.split('-');

    var year = date[0];
    var monthInt = parseInt(date[1]-1);
    var month = monthNames[monthInt];
    var day = date[2];

    var H = +timeString.substr(0, 2);
    var h = H % 12 || 12;
    var ampm = H < 12 ? "AM" : "PM";
    timeString = h + timeString.substr(2, 3) + " " + ampm;

    var fullString = day + " " + month + " " + year + " at " + timeString;
    return fullString;
}


function appendMovie($movie){
    $("#result_list").append(
        "<div class='searchPage-movieList searchPage-searchByTitle foundItemContainer'>"
        +"<a href='./movies/" + $movie.id + "' class='movieList-movieItemContainer'>"
        +"<div class='movieList-movieItem' id='searchByTitle-MovieItem'>"
        +"<div class='movieList-moviePosterContainer'><img class='movieList-moviePoster' src='" + $movie.image_url + "'></div>"
        +"<h5 class='movieList-movieTitle'>" + $movie.title + "</h5>"
        +"<p class='movieList-movieDirector'>" + $movie.director + "</p>"
        +"<hr class='separator-movieList-detail'>"
        +"<p class='movieList-movieGenres'>" + $movie.genre + "</p>"
        +"<p class='movieList-movieReleaseDate'> Released: " + $releaseDate
        +"</div></a></div>"
    );
}



function appendSessions(sessions){
    $(".searchPage-searchByTitle.foundItemContainer").append(
        "<div class='searchPage-movieList sessionsResultContainer'>"
            +"<div class='searchPage-movieList sessionsResult sessionResult-title'> <h4> <i class='icon-check'></i> Now Showing at </h4>" + "</div>"
            +"<div class='searchPage-movieList sessionsResult sessionResult-content'></div>"
        +"</div>"
    );
}

function appendSessionList(sessions){
    $.each(sessions, function(k, v) {

    var sessionDate = customTimeToDate(v.time);

        $(".sessionResult-content").append(
            '<div class="sessionItem">'
                +'<div class="sessionLocation">'
                    + v.location.name
                +'</div>'
                +'<div class="sessionDetails">'
                    + 'Theater <span class="theaterNumber-square">'+ v.theater
                    +'</span>' + ' on <span class="sessionDateTime-square">' + sessionDate + '</span>'
                + '</div>'

            +'</div>');
    })
}


function appendSessionContainerByLocation(v){
    $(".searchPage-searchByTitle.foundItemContainer").append(
        "<div class='searchPage-movieList sessionsResultContainer'>"
        +"<div class='searchPage-movieList sessionsResult sessionResult-title'> <h4> <i class='icon-check'></i> Now Showing at </h4>" + "</div>"
        +"<div class='searchPage-movieList sessionsResult sessionResult-content'></div>"
        +"</div>"
    );


}

function appendSessionsByLocation(session){
    console.log("bylocation " + session.theater);
    var sessionDate = customTimeToDate(session.time);

    $(".sessionResult-content").append(
        '<div class="sessionItem">'
        +'<div class="sessionDetails">'
        + 'Theater <span class="theaterNumber-square">'+ session.theater
        +'</span>' + ' on <span class="sessionDateTime-square">' + sessionDate + '</span>'
        + '</div>'
        +'</div>');
}



function appendMovieBySession(movieData){
    var movie = movieData.movie;
    var sessions = movieData.sessions;

    var safeMovieName = movie.title.replace(/\W+/g, "");
    var encodedMovieTitle = encodeURI(movie.title);
    var sessionId = safeMovieName + "-sessionItems";
    $("#result_list").append(
        "<div class='searchPage-movieList searchPage-searchByTitle foundItemContainer'>"
            +"<a href='./movies/" + movie.id + "' class='movieList-movieItemContainer'>"
            +"<div class='movieList-movieItem' id='" + safeMovieName + "-searchByTitle-MovieItem'>"
                +"<div class='movieList-moviePosterContainer'><img class='movieList-moviePoster' src='" + movie.image_url + "'></div>"
                +"<h5 class='movieList-movieTitle'><h3 class='movieList-movieTitle'>" + movie.title + "</h3></h5>"
                +"<p class='movieList-movieDirector'>" + movie.director + "</p>"
                +"<hr class='separator-movieList-detail'>"
                +"<p class='movieList-movieGenres'>" + movie.genre + "</p>"
                +"<p class='movieList-movieReleaseDate'> Released: " + intToDate(movie.release_date)
            +"</div></a>"

            +"<div class='searchPage-movieList sessionsResultContainer'>"
                +"<div class='searchPage-movieList sessionsResult sessionResult-title'> <h4> <i class='icon-check'></i> Now Showing at </h4>" + "</div>"
                +"<div class='searchPage-movieList sessionsResult sessionResult-content'>"
                    +'<div id="' + sessionId + '" class="sessionItem">'
                    +'</div>'
                +"</div>"
            +"</div>"
        +"</div>"
    );

    $.each(sessions, function(sessionKey, session){
        if(session.movie_id !== movie.id.toString()) return null;
        var sessionDate = customTimeToDate(session.time);
        $("#" + sessionId).append(
            '<div class="sessionDetails">'
            + 'Theater <span class="theaterNumber-square">'+ session.theater
            +'</span>' + ' on <span class="sessionDateTime-square">' + sessionDate + '</span>'
            + '</div>'
        );
    })
}
