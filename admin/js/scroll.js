function checkOffset() {
    if($('#price').offset().top + $('#price').height() 
                                           >= $('#footer').offset().top - 10)
        $('#price').css('position', 'absolute');
    if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top)
        $('#price').css('position', 'fixed'); // restore when you scroll up
    $('#price').text($(document).scrollTop() + window.innerHeight);
}
$(document).scroll(function() {
    checkOffset();
});