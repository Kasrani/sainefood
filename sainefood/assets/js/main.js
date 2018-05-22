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

$(document).ready(function () {
    $("#etapes").click(function () {
        $('#coordonnees').removeClass('none');
        $('.border-panier').addClass('none');
        $('.total-panier').addClass('none');
        $('#vide').addClass('none');
        $('#ajout-article').addClass('none');
        $('#paypal-btn').addClass('none');
        $('.nav-panier-panier').addClass('none');
        $('.nav-panier-coordonnees').removeClass('none');
    });
});
$(document).ready(function () {
    $("#btn-coordonnees").click(function () {
        $('.nav-panier-coordonnees').addClass('none');
        $('.nav-panier-payment').removeClass('none');
        $('#coordonnees').addClass('none');
        $('#paypal-btn').removeClass('none');
    });
});

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
    
var element = document.getElementById("btn-coordonnees");
    element.classList.add("margin-fix-cord");


} else {

var element = document.getElementById("myFIXED");
    element.classList.add("position-fixed");
    
var element = document.getElementById("vide");
    element.classList.remove("margin-fix");

var element = document.getElementById("btn-coordonnees");
    element.classList.remove("margin-fix-cord");
     
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