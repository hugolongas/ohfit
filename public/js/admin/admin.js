$(document).ready(function() {
    $(window).scroll(function(ev) {
        var scroll = $(window).scrollTop();
        if (scroll >= 20) {
            $(".nav-top").addClass("fixed-menu");
            $("#main").addClass("fixed-menu");
        } else {
            $(".nav-top").removeClass("fixed-menu");
            $("#main").removeClass("fixed-menu");
        }
    });
});