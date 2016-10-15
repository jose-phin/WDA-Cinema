

function goToByScroll(id){
    $('html,body').animate({scrollTop: $("#"+id).offset().top-50},'500');
    return false;
}


$(function() {
    $('.movieList-moviePosterContainer').mouseenter(function () {
        $(this).find(".posterGlow").css({
            'opacity': '0.8'
        })
    })

    $('.movieList-moviePosterContainer').mouseleave(function () {
        $(this).find(".posterGlow").css({
            'opacity': '0'
        })
    })
});

