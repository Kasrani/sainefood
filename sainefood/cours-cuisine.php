<!DOCTYPE HTML>
<html>
	<head>
		<title>Saine-Food</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119196030-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-119196030-1');
        </script>
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="icons/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <li class=""><a href="index.php">Home</a></li>
                        <li><a href="a%20propos.php">À propos</a></li>
                        <li class="current"><a href="cours-cuisine.html">Cours de cuisine</a></li>
                        <li><a href="livraison.php">Livraison</a></li>
                        <li><a href="no-sidebar.php">Actualités</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav id="nav" class="navbar navbar-fixed-top shadow nav-2 container-fluid">
            <div class="container">
                <div class="row headerow">
                    <ul>
                        <li class="current"><a href="index.html">À venir</a></li>
                        <li><a href="left-sidebar.html">Déja passée</a></li>
                    </ul>
                </div>
            </div>
        </nav>
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
        <div class="container main-content main-content-2 shadow">
            <div class="content">
                <div class="cartouche-bloc">
                    <div class="d-flex justify-content-start">
                        <div class="cartouche border-bloc">
                            <div class="cartouche-img-overlay">
                                <div class="btn-produit">
                                    <span class="icon-add-panier"></span>
                                    <span class="icon-details"></span>
                                </div>
                            </div>
                            <img class="" src="images/Events/event-1.jpg" alt="Sainefood">   
                        </div>
                        <div class="cartouche-description">
                            <h2 class="title-sf-2 semibold">Cuisiner cru en hiver</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante.
                            </p>
                            <div class="d-flex">
                                <div class="mr-auto p-2"><span class="icon-agenda"></span><span class="semibold">Sam, 10 février</span></div>
                                <div class="p-2"><button type="button" class="btn btn-link">Voir plus </button></div>
                                <div class="p-2"><span class="icon-right"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 place-disponible-niv-1 text-center border-bloc"><span class="text-center">Plus que 5 places disponible</span></div>
                </div>
                
                <div class="cartouche-bloc">
                    <div class="d-flex justify-content-start">
                        <div class="cartouche border-bloc">
                            <div class="cartouche-img-overlay">
                                <div class="btn-produit">
                                    <span class="icon-add-panier"></span>
                                    <span class="icon-details"></span>
                                </div>
                            </div>
                            <img class="" src="images/Events/event-2.jpg" alt="Sainefood">   
                        </div>
                        <div class="cartouche-description">
                            <h2 class="title-sf-2 semibold">Protéines végétales</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante.
                            </p>
                            <div class="d-flex">
                                <div class="mr-auto p-2"><span class="icon-agenda"></span><span class="semibold">Dim, 18 février</span></div>
                                <div class="p-2"><button type="button" class="btn btn-link">Voir plus </button></div>
                                <div class="p-2"><span class="icon-right"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 place-disponible-niv-1 text-center border-bloc"><span class="text-center">Plus que 7 places disponible</span></div>
                </div>
                
                <div class="cartouche-bloc">
                    <div class="d-flex justify-content-start">
                        <div class="cartouche border-bloc">
                            <div class="cartouche-img-overlay">
                                <div class="btn-produit">
                                    <span class="icon-add-panier"></span>
                                    <span class="icon-details"></span>
                                </div>
                            </div>
                            <img class="" src="images/Events/event-3.jpg" alt="Sainefood">   
                        </div>
                        <div class="cartouche-description">
                            <h2 class="title-sf-2 semibold">Pâtisserie bio, végétale et sans gluten</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante.
                            </p>
                            <div class="d-flex">
                                <div class="mr-auto p-2"><span class="icon-agenda"></span><span class="semibold">Sam, 24 février</span></div>
                                <div class="p-2"><button type="button" class="btn btn-link">Voir plus </button></div>
                                <div class="p-2"><span class="icon-right"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 place-disponible-niv-1 text-center border-bloc grey-bloc"><span class="text-center">Plus que 9 places disponible</span></div>
                </div>
                
                <div class="cartouche-bloc">
                    <div class="d-flex justify-content-start">
                        <div class="cartouche border-bloc">
                            <div class="cartouche-img-overlay">
                                <div class="btn-produit">
                                    <span class="icon-add-panier"></span>
                                    <span class="icon-details"></span>
                                </div>
                            </div>
                            <img class="" src="images/Events/event-4.jpg" alt="Sainefood">   
                        </div>
                        <div class="cartouche-description">
                            <h2 class="title-sf-2 semibold">Brunch « feel good »</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante.
                            </p>
                            <div class="d-flex">
                                <div class="mr-auto p-2"><span class="icon-agenda"></span><span class="semibold">Dim, 25 février</span></div>
                                <div class="p-2"><button type="button" class="btn btn-link">Voir plus </button></div>
                                <div class="p-2"><span class="icon-right"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 place-disponible-niv-1 text-center border-bloc grey-bloc"><span class="text-center">Plus que 9 places disponible</span></div>
                </div>
                
                <div class="cartouche-bloc">
                    <div class="d-flex justify-content-start">
                        <div class="cartouche border-bloc">
                            <div class="cartouche-img-overlay">
                                <div class="btn-produit">
                                    <span class="icon-add-panier"></span>
                                    <span class="icon-details"></span>
                                </div>
                            </div>
                            <img class="" src="images/Events/event-5.jpg" alt="Sainefood">   
                        </div>
                        <div class="cartouche-description">
                            <h2 class="title-sf-2 semibold">Fromages véganes maison</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante.
                            </p>
                            <div class="d-flex">
                                <div class="mr-auto p-2"><span class="icon-agenda"></span><span class="semibold">Dim, 4 mars</span></div>
                                <div class="p-2"><button type="button" class="btn btn-link">Voir plus </button></div>
                                <div class="p-2"><span class="icon-right"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 place-disponible-niv-1 text-center border-bloc grey-bloc"><span class="text-center">Plus que 9 places disponible</span></div>
                </div>
                
                <div class="cartouche-bloc">
                    <div class="d-flex justify-content-start">
                        <div class="cartouche border-bloc">
                            <div class="cartouche-img-overlay">
                                <div class="btn-produit">
                                    <span class="icon-add-panier"></span>
                                    <span class="icon-details"></span>
                                </div>
                            </div>
                            <img class="" src="images/Events/event-6.jpg" alt="Sainefood">   
                        </div>
                        <div class="cartouche-description">
                            <h2 class="title-sf-2 semibold">Brunch spécial hiver</h2><hr class="separateur">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fermentum est at tortor sodales, sit amet vestibulum elit ullamcorper. Proin eget lorem velit. Mauris at ex in ligula aliquet dictum et in ex. In in magna efficitur orci pharetra euismod id sed elit. Donec et dui in massa aliquet laoreet et ac lorem. In ut sollicitudin ligula. Sed erat sem, efficitur vel consectetur at, dignissim nec ante.
                            </p>
                            <div class="d-flex">
                                <div class="mr-auto p-2"><span class="icon-agenda"></span><span class="semibold">Sam, 10 mars</span></div>
                                <div class="p-2"><button type="button" class="btn btn-link">Voir plus </button></div>
                                <div class="p-2"><span class="icon-right"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 place-disponible-niv-1 text-center border-bloc grey-bloc"><span class="text-center">Plus que 9 places disponible</span></div>
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
        
            if (isset($_SESSION['user']) and (window.innerWidth > 960)){
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