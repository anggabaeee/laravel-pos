jQuery(document).ready(function ($) {
    var alterClass = function () {
        var ww = document.body.clientWidth;
        if (ww < 768) {
            $('.sidebar').removeClass('show');
        } else if (ww >= 768) {
            $('.sidebar').addClass('show');
        };
    };
    $(window).resize(function () {
        alterClass();
    });
    //Fire it when the page first loads:
    alterClass();
});