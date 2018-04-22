$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    $('#myFIXED').toggleClass('mystyle',
     //add 'ok' class when div position match or exceeds else remove the 'ok' class.
      scroll >= $('#footer').offset().top
    );
});
//trigger the scroll
$(window).scroll();//ensure if you're in current position when page is refreshed




var height = $('.container-model > .main-content').height();
console.log(height);
window.onscroll = function() {

if (scrollY > height-430) {

var element = document.getElementById("myFIXED");
    element.classList.remove("position-fixed");
    
var absolu = document.getElementById("myFIX");
    absolu.classList.add("align-self-end");


} else {

var element = document.getElementById("myFIXED");
    element.classList.add("position-fixed");
    
var absolu = document.getElementById("myFIX");
    absolu.classList.remove("align-self-end");

}}
