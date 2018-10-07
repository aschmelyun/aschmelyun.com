try {
    window.$ = window.jQuery = require('jquery');
} catch(e) {}

$(document).ready(function() {
    determineScrollAndOpacity();
});
$(window).scroll(function() {
    determineScrollAndOpacity();
});

$('.nav-main a.has-animate').click(function(e) {
    e.preventDefault();
    let el = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(el).offset().top - 44
    }, 750);
});

function determineScrollAndOpacity() {
    var scrollPos = $(document).scrollTop();
    var scrollCutoff = Math.ceil($(window).height() * .50);
    var scrollOpacity = 1.0;

    if(scrollPos > scrollCutoff) {
        scrollOpacity = 0.0;
    } else {
        scrollOpacity = (1.0 - (scrollPos / scrollCutoff)).toFixed(2);
    }

    //$('.header-main').css('backgroundPosition', 'center ' + (100 + Math.ceil(scrollPos / 5)) + '%');
    $('#headerText').css('opacity', scrollOpacity);

    var scrollCutoffNav = Math.ceil($(window).height() - $('#navWrapper').height());
    if(scrollPos > scrollCutoffNav) {
        $('#navWrapper').removeClass('pos-absolute').addClass('pos-fixed');
        $('#navWrapper').css('bottom', '').css('top', '0');
    } else {
        $('#navWrapper').removeClass('pos-fixed').addClass('pos-absolute');
        $('#navWrapper').css('top', '').css('bottom', '0');
    }
}