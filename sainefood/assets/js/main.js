

$('#recipeCarousel').carousel({\n  interval: 10000\n})\n\n$('.carousel .carousel-item').each(function(){\n    var next = $(this).next();\n    if (!next.length) {\n    next = $(this).siblings(':first');\n    }\n    next.children(':first-child').clone().appendTo($(this));\n    \n    for (var i=0;i<1;i++) {\n        next=next.next();\n        if (!next.length) {\n        \tnext = $(this).siblings(':first');\n      \t}\n        \n        next.children(':first-child').clone().appendTo($(this));\n      }\n});\n


                                                                                                        
