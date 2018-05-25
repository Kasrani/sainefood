$("#inscription").hide();
$("#connexion-link").hide();
function show(){$("#connexion").hide();
$("#inscription").show();
$("#connexion-link").show();
$("#inscription-link").hide()}function hide(){$("#connexion").show();
$("#inscription").hide();
$("#connexion-link").hide();
$("#inscription-link").show()}$('td.delete-block').addClass('hover');$(function(){$('tr.border-panier').hover(function(){$('td.delete-block').removeClass('hover');},function(){$('td.delete-block').addClass('hover');})})
$('.border-panier .quantite').addClass('hover');$(function(){$('tr.border-panier').hover(function(){$('.border-panier .quantite').removeClass('hover');},function(){$('.border-panier .quantite').addClass('hover');})})
$(window).on('load',function(){
        $('#gridSystemModall').modal('show');
    });
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
        $('.recapulatif').removeClass('none');
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


function getXMLHttpRequest() {
    var xhr = null;
     
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
                        xhr = new XMLHttpRequest();
                    }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
     
    return xhr;
}
             
function AJAX(url){
    xhr_object = getXMLHttpRequest();
     
    xhr_object.open("GET", url, false);
    xhr_object.send(null);
    if(xhr_object.readyState == 4){
        return xhr_object.responseText;
    }else return(false);
}
 
             
function submitForm(){
    var form = document.forms["coordonnees"];
    var nom = form.nom.value;
    var prenom = form.prenom.value;
    var email = form.email.value;
    var password = form.password.value;
    var adresse = form.adresse.value;
    var montant = form.montant.value;
    var liste = form.liste.value;
    var url = "produit.php?nom="+nom+"&prenom="+prenom+"&email="+email+"&password="+password+"&adresse="+adresse+"&montant="+montant+"&liste="+liste;           
    document.getElementById('printResult').innerHTML = AJAX(url);
}

function change()
{
    var changer = document.getElementById("myFIX");
    var changerPlus = document.getElementById("plus");
    var changerAdd = document.getElementById("ajout-article");
    var navPayment = document.getElementById("nav-panier-payment");
    var btnPaypal = document.getElementById("paypal-button");
  
    if (changer.style.height == '45px')
    {
        changer.style.height = '45vh';
        changerPlus.style.bottom = 'calc(45vh - 2px)';
        changerPlus.innerHTML = "Cacher le panier";
        changerAdd.style.display = 'none';
        navPayment.style.display = 'block';
        btnPaypal.style.top = '250px';
    }
    else                                     
    {
        changer.style.height = '45px';
        changerPlus.style.bottom = '44px';
        changerPlus.innerHTML = "Voir le panier";
        changerAdd.style.display = 'block';
        navPayment.style.display = 'none';
        btnPaypal.style.top = '10px';
    }
};



