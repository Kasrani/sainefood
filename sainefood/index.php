<?php
// Database Authentication
include("authDB.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Saine-Food</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="icons/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="1096698373393-dam69ls1b1i2lamshtia49h7ensvn2au.apps.googleusercontent.com">
        <link rel="icon" href="favicon.png" type="image/png">
        <link rel="icon" sizes="32x32" href="icons/favicon/favicon-32.png" type="image/png">
        <link rel="icon" sizes="64x64" href="icons/favicon/favicon-64.png" type="image/png">
        <link rel="icon" sizes="96x96" href="icons/favicon/favicon-96.png" type="image/png">
        <link rel="icon" sizes="196x196" href="icons/favicon/favicon-196.png" type="image/png">
        <link rel="apple-touch-icon" sizes="152x152" href="icons/favicon/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="60x60" href="icons/favicon/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="icons/favicon/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="icons/favicon/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="icons/favicon/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="icons/favicon/apple-touch-icon-144x144.png">
        <meta name="msapplication-TileImage" content="favicon-144.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        
	</head>
	<body class="dd">
        <div id="header" class="navbar navbar-fixed-top container-fluid">
            <div class="container">
                <div class="d-flex">
                    <div class="p-2"><img src="images/Logo.svg" alt="Sainefood"></div>
                    <div class="p-2 baseline">Cours de cuisine & traiteur <b class="green">bio</b></div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto p-2 connecter" data-toggle="modal" data-target="#gridSystemModal"><?php if (isset($_SESSION['user'])){echo "Bonjour ";}else {echo "Se connecter";}?></div>
                    <a href="account.php" class="user">&nbsp;<?php if (isset($_SESSION['user'])){echo $_SESSION['user'];}   else {echo "";}?></a>
                    <div class="ml-auto p-2"><span class="icon-panier"></span></div>
                </div>
            </div>
        </div>   
        <nav id="nav" class="navbar navbar-fixed-top shadow container-fluid">
            <div class="container">
                <div class="row headerow">
                    <ul>
                        <li class="current"><a href="index.php">Home</a></li>
                        <li><a href="a%20propos.php">À propos</a></li>
                        <li><a href="cours-cuisine.php">Cours de cuisine</a></li>
                        <li><a href="livraison.php">Livraison</a></li>
                        <li><a href="no-sidebar.php">Actualités</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="bandeau">
        </div>
        
        
        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div id="connexion" class="">
                                <form action="check.php" method="post">
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="email" value="<?php if(!empty($_POST['email'])) { echo htmlspecialchars($_POST['email'], ENT_QUOTES); } ?>" placeholder="Adresse e-mail">
                                  </div>
                                  <div class="form-group">
                                      <input type="password" class="form-control" name="password" value="" id="inputPassword3" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-lg btn-block">Connexion</button>
                                  </div>
                                </form>
                                <span class="text-center"><a href="">Mot de passe oublié ?</a></span>
                            </div>
                            <div id="inscription" class="">
                                <form action="create.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Adresse e-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Créer un mot de passe">
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-lg btn-block">Inscription</button>
                                  </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="inscription-link" class="text-center">Vous n'avez pas de compte ?&nbsp;<button class="btn btn-link" onclick="show()">Inscription</button></span>
                        <span id="connexion-link" class="text-center">Vous avez déjà un compte Sainefood ?&nbsp;<button class="btn btn-link" onclick="hide()">Connexion</button></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container main-content shadow">
            <div class="content">
                <div class="cours-cuisne-home">
                    <div class="first-event border-bloc">
                        <img class="img-fluid" src="images/Events/event-1.jpg" alt="Sainefood">
                    </div>
                    <div class="first-event-description">
                        <h3 class="title-sf-3">Description</h3><hr class="separateur">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas consectetur accumsan tincidunt. Duis facilisis orci sit amet nisi vestibulum, dapibus feugiat ex blandit. Cras vel fermentum neque. Aenean at ultricies justo. Maecenas sagittis dui cursus ultrices sollicitudin. Suspendisse blandit ex dolor, non ultricies odio aliquam eget.
                        </p>
                        <div class="sf-button-3"><span>Voir plus</span></div>
                        <button type="button" class="btn btn-outline-primary sf-button-3">je réserve ma place</button>
                    </div>
                    <h6 class="title-sf-5">Programmes à venir (9)</h6>
                    <div class="mx-auto my-auto">
                        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner w-100" role="listbox">
                                <a class="carousel-control-prev active" href="#recipeCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <div class="carousel-item active">
                                    <img class="d-block" src="images/Events/event-1.jpg">
                                    
                                        <p class="texte semibold">Cuisiner cru en hiver</p>
                                        <p class="texte">Sam, 10 février</p>
                                    
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="images/Events/event-2.jpg">
                                    
                                        <p class="texte semibold">Cuisiner cru en hiver</p>
                                        <p class="texte">Sam, 10 février</p>
                                    
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="images/Events/event-3.jpg">
                                        <p class="texte semibold">Cuisiner cru en hiver</p>
                                        <p class="texte">Sam, 10 février</p>
                                    
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="images/Events/event-4.jpg">
                                        <p class="texte semibold">Cuisiner cru en hiver</p>
                                        <p class="texte">Sam, 10 février</p>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="images/Events/event-5.jpg">
                                        <p class="texte semibold">Cuisiner cru en hiver</p>
                                        <p class="texte">Sam, 10 février</p>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="images/Events/event-6.jpg">
                                        <p class="texte semibold">Cuisiner cru en hiver</p>
                                        <p class="texte">Sam, 10 février</p>
                                </div>
                                <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <hr class="separateur">
                    <div class="producteur">
                        <h2 class="title-sf-2 semibold">Du producteur à l’assiette</h2>
                        <div class="d-flex justify-content-between row">
                            <div class="card col-md-4">
                                <div class="card-content shadow">
                                    <div class="card-img-overlay">
                                        <div class="btn-produit">
                                            <a class="float-left" href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT"><span class="icon-add-panier"></span></a>
                                            <a class="float-right" href="produit.php?nom=Salade+bio"><span class="icon-details"></span></a>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="images/Plats/plat-1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title title-sf-4">Seasonal pasta bowl</h4>
                                        <span class="card-prix title-sf-4">6,90 €</span>
                                        <p class="card-text">Un plat végétarien généreux..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-4">
                                <div class="card-content shadow">
                                    <div class="card-img-overlay">
                                        <div class="btn-produit">
                                            <span class="icon-add-panier"></span>
                                            <span class="icon-details"></span>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="images/Plats/plat-2.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title title-sf-4">Linguine IGP al ragu</h4>
                                        <span class="card-prix title-sf-4">8,95 €</span>
                                        <p class="card-text">Un plat végétarien généreux..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow col-md-4">
                                <div class="card-content shadow">
                                    <div class="card-img-overlay">
                                        <div class="btn-produit">
                                            <span class="icon-add-panier"></span>
                                            <span class="icon-details"></span>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="images/Plats/plat-3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title title-sf-4">Curry veggie</h4>
                                        <span class="card-prix title-sf-4">6,90 €</span>
                                        <p class="card-text">Un plat végétarien généreux..</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- d-flex justify-content-between -->
                        <div class="d-flex justify-content-between row">
                            <div class="card col-md-4">
                                <div class="card-content shadow">
                                    <div class="card-img-overlay">
                                        <div class="btn-produit">
                                            <span class="icon-add-panier"></span>
                                            <span class="icon-details"></span>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="images/Plats/plat-4.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title title-sf-4">Risotto au potimarron</h4>
                                        <span class="card-prix title-sf-4">6,90 €</span>
                                        <p class="card-text">Un plat végétarien généreux..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-4">
                                <div class="card-content shadow">
                                    <div class="card-img-overlay">
                                        <div class="btn-produit">
                                            <span class="icon-add-panier"></span>
                                            <span class="icon-details"></span>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="images/Plats/plat-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title title-sf-4">Salade healthy</h4>
                                        <span class="card-prix title-sf-4">8,50 €</span>
                                        <p class="card-text">Un plat végétarien généreux..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-md-4">
                                <div class="card-content shadow">
                                    <div class="card-img-overlay">
                                        <div class="btn-produit">
                                            <span class="icon-add-panier"></span>
                                            <span class="icon-details"></span>
                                        </div>
                                    </div>
                                    <img class="card-img-top" src="images/Plats/plat-6.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title title-sf-4">Salade de choul</h4>
                                        <span class="card-prix title-sf-4">8,20 €</span>
                                        <p class="card-text">Un plat végétarien généreux..</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- d-flex justify-content-between -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-link">Voir plus</button>
                        </div>
                    </div>
                    <hr class="separateur">
                    <h2 class="title-sf-2 semibold title-hidden">L'atelier Sainefood</h2>
                    <div class="d-flex justify-content-start sf row">
                        <div class="propos col-md-5">
                            <img class="img-fluid border-bloc" src="images/sainefood.jpg" alt="Sainefood">   
                        </div>
                        <div class="atelier-description col-md-7">
                            <h2 class="title-sf-2 semibold title-block">L'atelier Sainefood</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante. Integer luctus tellus vel sem molestie aliquam. Suspendisse in arcu elit. Donec mattis ligula pretium, ultricies odio luctus, dictum turpis. Aenean ligula ex, lacinia at imperdiet nec, lobortis et metus.
                            </p>
                            <div class="d-flex align-items-end">
                                <button type="button" class="btn btn-link">Voir plus</button>
                            </div>
                        </div>
                    </div>
                    <hr class="separateur">
                    <div class="livraison">
                        <h2 class="title-sf-2 semibold">Zone de Livraison</h2>
                        <img src="images/zone-de-livraison.png" class="img-fluid" alt="zone de livraison">
                    </div>
                    <div class="d-flex justify-content-start sf reco row">
                        <div class="temoignages-avis col-md-5">
                            <h2 class="title-sf-2 semibold">Ils recommandent Sainefood</h2><hr class="separateur">
                            <span class="icon-avis"></span>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper.
                            </p>
                            <hr class="separateur">
                            <div class="d-flex align-items-end temoignages">
                                <span class="name">Chantal,&nbsp;<span class="poste">Conseillère en immobilier</span></span>
                            </div>
                        </div>
                        <div class="temoignages col-md-7">
                            <img class="img-fluid border-bloc" src="images/temoignages.jpg" alt="Sainefood">   
                        </div>
                    </div>
                    <div class="d-flex row">
                        <div class="mr-auto p-2 social">Suivez-nous sur les réseaux sociaux !</div>
                        <div class="p-2 fb"><span class="icon-facebook2"></span></div>
                        <div class="p-2 insta"><span class="icon-instagram"></span></div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="d-flex justify-content-between row">
                    <div class="logo-2 col-md-5"><img src="images/Logo-2.svg" alt="Sainefood"></div>
                    <form class="form-inline col-md-7">
                        <div class="form-group">
                            <label>Recevez notre Newsletter !</label>
                            <input type="text" class="form-control" id="staticEmail2" value="" placeholder="Votre e-mail">
                            <button type="submit" class="btn btn-primary">S’inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr class="separateur">
                </div>
            </div>
            <div class="container">
                <div class="d-flex justify-content-between row">
                    <div class="d-flex flex-column col-md-3">
                        <div class="icon-footer"><img src="images/icon-footer.png" alt=""></div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2 title-groupe-footer">En savoir plus</div>
                        <div class="p-2 sous-title-footer">Concept</div>
                        <div class="p-2 sous-title-footer">Zone de livraison</div>
                        <div class="p-2 sous-title-footer">FAQ</div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2 title-groupe-footer">Nos valeurs</div>
                        <div class="p-2 sous-title-footer">Nos engagements</div>
                        <div class="p-2 sous-title-footer">Blog</div>
                        <div class="p-2 sous-title-footer">Nos partenaires</div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2"><button type="button" class="btn btn-outline-primary btn-footer">Nous contacter</button></div>
                        <div class="p-2 title-groupe-footer">PARIS</div>
                        <div class="p-2 sous-title-footer">42,<br>avenue Versailles,<br> 75012</div>
                    </div>
                </div>
                <div class="d-flex p-2 sous-title-footer end-footer">© 2018<br>Tous droits réservés. Mentions légales</div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/main.js"></script>
        <?php 
        
            if (isset($_SESSION['user'])){
                echo "<script src='assets/js/autoLogout.js'></script>";
            }
        ?>
        <script type="text/javascript">
            window._chatlio = window._chatlio||[];
            !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline", "page", "open", "showOrHide"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.3");
               n.setAttribute('data-widget-id','c4647cb2-60ec-44fe-6c64-0238350faa1b');
               c.parentNode.insertBefore(n,c);
            }();
        </script>
    </body>
</html>