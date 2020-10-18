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

    if ($('#content.home').length > 0) {
        var parPosition = [];
        $('.par').each(function() {
            parPosition.push($(this).offset().top);
        });

        $('a').click(function() {
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 100
            }, 700);
            return false;
        });

        $('.vNav ul li a').click(function() {
            $('.vNav ul li a').removeClass('active');
            $(this).addClass('active');
        });

        $('.vNav a').hover(function() {
            $(this).find('.label').show();
        }, function() {
            $(this).find('.label').hide();
        });

        $(document).scroll(function() {
            var position = $(document).scrollTop(),
                index;
            for (var i = 0; i < parPosition.length; i++) {
                if (position <= parPosition[i]) {
                    index = i;
                    break;
                }
            }
            $('.vNav ul li a').removeClass('active');
            $('.vNav ul li a:eq(' + index + ')').addClass('active');
            $('.navbar-collapse ul li a').removeClass('active');
            if (index > 3) {
                ind = index + 1;
                $('.navbar-collapse ul li a:eq(' + ind + ')').addClass('active');
            } else {
                $('.navbar-collapse ul li a:eq(' + index + ')').addClass('active');
            }

        });

        $('.vNav ul li a').click(function() {
            $('.vNav ul li a').removeClass('active');
            $(this).addClass('active');
        });

        $(".weare-trainer").on("mouseenter", function() {
            var trainer = $(this).attr("trainer");
            var imgSrc = "../img/" + trainer + ".png";
            $("#trainer-img").attr("src", imgSrc);
            $("#trainer-img").addClass(trainer);

        });
        $(".weare-trainer").on("mouseleave", function() {
            var imgSrc = "../img/somos2.png";
            $("#trainer-img").attr("src", imgSrc);
            $("#trainer-img").removeClass();
        });
    }
});