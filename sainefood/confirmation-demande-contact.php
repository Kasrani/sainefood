<?php
// Database Authentication
include("authDB.php");
session_start();
?>
<!DOCTYPE HTML>
<html lang="fr">
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
        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                    <div class="p-2"><a href="index.php"><img src="images/Logo.svg" alt="Sainefood"></a></div>
                    <div class="p-2 baseline">Cours de cuisine & traiteur <b class="green">bio</b></div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto p-2 connecter" data-toggle="modal" data-target="#gridSystemModal"><?php if (isset($_SESSION['user'])){echo "Bonjour ";}else {echo "Se connecter";}?></div>
                    <a href="account.php" class="user">&nbsp;<?php if (isset($_SESSION['user'])){echo $_SESSION['user'];}   else {echo "";}?></a>
                    <div class="ml-auto p-2"><span class="icon-panier"></span></div>
                    <?php 
                    $nbArticle = count($_SESSION['panier']['libelleProduit']);
                    if ($nbArticle > 0) {
                        echo "<div id='totalProduct'><span>" . count($_SESSION['panier']['libelleProduit']) . "</span></div>";
                        }
                    ?>
                </div>
            </div>
        </div>    
        <nav id="nav" class="navbar navbar-fixed-top shadow container-fluid">
            <div class="container">
                <div class="row headerow scroll">
                    <ul class="scroll">
                        <li class=""><a href="index.php">Home</a></li>
                        <li class=""><a href="a%20propos.php">À propos</a></li>
                        <li class=""><a href="cours-cuisine.php">Cours de cuisine</a></li>
                        <li class=""><a href="livraison.php">Livraison</a></li>
                        <li><a href="*">Actualités</a></li>
                        <li class="current"><a href="contact.php">Contact</a></li>
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
                                <form action="backOffice/user/auth.php" method="post">
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
                                <form action="backOffice/user/signUp.php" method="POST">
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
        <div class="container main-content shadow confirmation contact">
            <div class="content">
                <h2 class="title-sf-2 semibold">Confirmaion demande de contact</h2><br>
                <h4 class="title-sf-4 text-center">Bonjour</h4>
                <h4 class="title-sf-4 text-center">Votre demande a bien été prise en compte</h4>
                <h4 class="title-sf-4 text-center">Nous vous recontacterons rappidement pour donner suite à votre demande</h4><br>
                <h4 class="title-sf-4 text-center semibold red_sf">L'équipe sainefood</h4>
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