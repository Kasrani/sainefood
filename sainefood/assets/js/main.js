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