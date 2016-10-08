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
        +"<div class='movieList-movieItem' id='searchByTitle-MovieItem'>"
        +"<div class='movieList-moviePosterContainer'><a href='./" + $movie.title + "'><img class='movieList-moviePoster' src='" + $movie.image_url + "'></a></div>"
        +"<h5 class='movieList-movieTitle'><a class='movieList-movieTitle' href='./" + $movie.title + "'>" + $movie.title + "</a></h5>"
        +"<p class='movieList-movieDirector'>" + $movie.director + "</p>"
        +"<hr class='separator-movieList-detail'>"
        +"<p class='movieList-movieGenres'>" + $movie.genre + "</p>"
        +"<p class='movieList-movieReleaseDate'> Released: " + $releaseDate
        +"</div></div>"
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
                    + 'Theater <span class="theaterNumber-square">'+ v.theater + '</span>' + ' on ' + sessionDate
                + '</div>'

            +'</div>');
    })
}
