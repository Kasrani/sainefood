
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

$("#inscription").hide()
$("#connexion-link").hide()
function show() {
    $("#connexion").hide()
    $("#inscription").show()
    $("#connexion-link").show()
    $("#inscription-link").hide()
}

function hide() {
    $("#connexion").show()
    $("#inscription").hide()
    $("#connexion-link").hide()
    $("#inscription-link").show()
}
