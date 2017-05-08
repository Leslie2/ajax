/*
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
*/

$(document).ready(function(){
    
    $('#gutscheine').hide();
    
    // bei Klick auf den weiterbutten, Gutschein container einblenden (mit slide nach unten)
    $('.weiterbtn').click(function(){
        $('#gutschein').slideDown();
        $('#kontaktformular').hide();
    });
    
    // bei Klick auf die Gutscheine, Gutscheine einblenden (mit slide nach unten)
    $('.fleisch').click(function(){
        $('#gutscheine').slideDown();
    });
     $('.veggie').click(function(){
        $('#gutscheine').slideDown();
    });
     $('.vegan').click(function(){
        $('#gutscheine').slideDown();
    });

});