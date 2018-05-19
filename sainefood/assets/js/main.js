/*
$('#recipeCarousel').carousel({\n interval:10000\n})\n\n$('.carousel .carousel-item').each(function(){\n var next=$(this).next();\n if(!next.length){\n next=$(this).siblings(':first');\n}\n next.children(':first-child').clone().appendTo($(this));\n \n for(var i=0;i<1;i++){\n next=next.next();\n if(!next.length){\n \tnext=$(this).siblings(':first');\n \t}\n \n next.children(':first-child').clone().appendTo($(this));\n}\n});\n
*/
$("#inscription").hide()
$("#connexion-link").hide()
function show(){$("#connexion").hide()
$("#inscription").show()
$("#connexion-link").show()
$("#inscription-link").hide()}function hide(){$("#connexion").show()
$("#inscription").hide()
$("#connexion-link").hide()
$("#inscription-link").show()}$('td.delete-block').addClass('hover');$(function(){$('tr.border-panier').hover(function(){$('td.delete-block').removeClass('hover');},function(){$('td.delete-block').addClass('hover');})})
$('.border-panier .quantite').addClass('hover');$(function(){$('tr.border-panier').hover(function(){$('.border-panier .quantite').removeClass('hover');},function(){$('.border-panier .quantite').addClass('hover');})})


var height = $('.container-model > .main-content').height();
console.log(height);
window.onscroll = function() {

if (scrollY > height-430) {

var element = document.getElementById("myFIXED");
    element.classList.remove("position-fixed");
    
var absolu = document.getElementById("myFIX");
    absolu.classList.add("align-self-end");

var element = document.getElementById("vide");
    element.classList.add("margin-fix");


} else {

var element = document.getElementById("myFIXED");
    element.classList.add("position-fixed");
    
var element = document.getElementById("vide");
    element.classList.remove("margin-fix");
    
    
var absolu = document.getElementById("myFIX");
    absolu.classList.remove("align-self-end");

}}

$(document).ready(function() {

    // Detect ios 11_x_x affected  
    // NEED TO BE UPDATED if new versions are affected
    var ua = navigator.userAgent,
    iOS = /iPad|iPhone|iPod/.test(ua),
    iOS11 = /OS 11_0|OS 11_1|OS 11_2/.test(ua);

    // ios 11 bug caret position
    if ( iOS && iOS11 ) {

        // Add CSS class to body
        $("body").addClass("iosBugFixCaret");

    }

});