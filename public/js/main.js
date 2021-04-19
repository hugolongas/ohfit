$(document).ready(function() {
    $('#main').on('click', '.nav-link', function() {
        var hashindex = $(this).attr("href").indexOf('#');
        var hreflen = $(this).attr("href").length;
        var anchortag = $(this).attr("href").substr(hashindex, hreflen);
        $('html, #wapper').animate({
            scrollTop: $(anchortag).offset().top - 100
        }, 700);
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        return false;
    });
    $(window).on("scroll",function(){
        if($("#main").hasClass("home")){
            if($(window).scrollTop()>500){
                $(".brand-logo").show(200);
            }
            else{
                $(".brand-logo").hide(200);
            }
        }
    });
});