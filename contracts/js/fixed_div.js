$(function () {
    var y = 500;
    //var p = $("#stop").offset().top;

    $(window).on('scroll', function () {
        if (y <= $(window).scrollTop()) {
            // if so, add the fixed class
            $('#invoice').addClass('panel-fixed');
        } else {
            // otherwise remove it
            $('#invoice').removeClass('panel-fixed');
        }
    })
});