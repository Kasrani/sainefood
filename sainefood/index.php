<?php
// Database Authentication
include("authDB.php");
session_start();
if (isset($_GET['id'])) {
    $plat = $_GET['id'];
}
?>
<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Cours de cuisine et Livraison de plats préparés bio à Paris</title>
		<meta charset="utf-8" />
        <meta name="description" content="L’Atelier de Pierre Duclass vous accueille pour des cours de cuisine bio. Avec le service traiteur bio : commandez vos plats cuisinés bio issus des recettes du Chef !">
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
        <meta name="google-site-verification" content="nDG1ybiooS1jbgJstYyNh48ecgPAsmk5jcBbfRRNc5c" />
        
        <script src="http://www.saine-food.fr//cookiechoices.js"></script><script>document.addEventListener('DOMContentLoaded', function(event){cookieChoices.showCookieConsentBar('Ce site utilise des cookies pour vous offrir le meilleur service. En poursuivant votre navigation, vous acceptez l’utilisation des cookies.', 'J’accepte', 'En savoir plus', 'http://www.example.com/mentions-legales/');});</script>
	</head>
	<body class="index">
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
                    if (count($_SESSION['panier']['libelleProduit']) > 0) {
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
                        <li class="current"><a href="index.php">Home</a></li>
                        <li><a href="a%20propos.php">À propos</a></li>
                        <li><a href="cours-cuisine.php">Cours de cuisine</a></li>
                        <li><a href="livraison.php">Livraison</a></li>
                        <li><a href="actualites.php">Actualités</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="bandeau">
        </div>
        

        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" style="" aria-hidden="true">
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

        <div class="container main-content shadow">
            <div class="content">
                <div class="cours-cuisne-home">
                    <div class="first-event border-bloc">
                        <div class="event-info">
                            <?php
                            $rec = "SELECT * FROM `event` LIMIT 1";
                            $result = mysqli_query($maConnexion,$rec);
                            $row = $result->fetch_assoc();
                            setlocale(LC_TIME, 'fr_FR.utf8','fra');
                            echo "
                            <h1 class='semibold'>" . $row['nom'] . "</h1>
                            <h2 style='text-transform: capitalize;'>". strftime('%a %d %B', strtotime($row['date'])) ." à partir de " . strftime('%Hh%M', strtotime($row['heure'])) . "</h2>
                            <h3>42, avenue de Versailles 75012 Paris</h3>
                        </div>
                        <div class='event-btn-res'>
                            <button type='button' onclick=\"location.href='produit.php?idCours=" . $row['id'] . "&amp;action=ajout&amp;l=" . $row['nom'] . "&amp;q=QUANTITEPRODUIT&amp;p=" . $row['prix'] . "';\" class='btn btn-primary sf-button-3'>je réserve ma place</button>
                        </div>
                        <img class='img-fluid' src='images/Events/" . $row['image'] . "' alt='Sainefood'>
                        ";  
                        ?>
                    </div>
                    <div class="first-event-description">
                        <h3 class="title-sf-3">Description</h3><hr class="separateur">
                        <p>
                            <?php
                                $rec = "SELECT * FROM `event` LIMIT 1";
                                $result = mysqli_query($maConnexion,$rec);
                                setlocale(LC_TIME, 'french');
                                while ($row = $result->fetch_assoc()) {    
                                echo "
                                    <p style='height:152px;overflow:hidden;'>" . $row['details'] . "</p>
                                ";
                                }
                        $query = "SELECT * FROM `event` LIMIT 1";
                        $result = mysqli_query($maConnexion,$query);
                        $row = $result->fetch_assoc();
                        echo "</p>
                        <div class='sf-button-3' onclick=\"location.href='produit.php?idCours=" . $row['id'] . "';\"><span>Voir plus</span><span class='icon-right'></span></div>
                        <button type='button' onclick=\"location.href='produit.php?idCours=" . $row['id'] . "&amp;action=ajout&amp;l=" . $row['nom'] . "&amp;q=QUANTITEPRODUIT&amp;p=" . $row['prix'] . "';\" class='btn btn-outline-primary sf-button-3'>je réserve ma place</button>
                        ";
                            
                        ?>
                    </div>
                    <h6 class="title-sf-5">Programmes à venir (9)</h6>
                    <div class="mx-auto my-auto">
                        <div id="" class="carousel slide w-100 scroll">
                            <div class="carousel-inner w-100 scroll">
                                <a class="carousel-control-prev active" href="#recipeCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                
                                <?php
                                $rec = "SELECT * FROM `event` LIMIT 10";
                                $result = mysqli_query($maConnexion,$rec);
                                setlocale(LC_TIME, 'french');
                                while ($row = $result->fetch_assoc()) {    
                                echo "
                                    <div class='carousel-item active'>
                                    <img class='d-block' src='images/Events/" . $row['image'] . "'>
                                    <div class='carousel-info'>
                                        <p class='texte semibold'>" . $row['nom'] . "</p>
                                        <p class='texte' style='text-transform: capitalize;'>". strftime('%a %d %B', strtotime($row['date'])) ."</p>
                                    </div>
                                    </div>
                                ";
                                }
                                ?>
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
                            <?php
                                $rec = "SELECT * FROM `plat` LIMIT 6";
                                $result = mysqli_query($maConnexion,$rec);
                                while ($row = $result->fetch_assoc()) {   
                                echo "
                                <div class='card col-md-4'>
                                    <div class='card-content shadow'>
                                        <div class='card-img-overlay'>
                                            <div class='btn-produit'>
                                            <a class='float-left' href='produit.php?idPlats=" . $row['id'] . "&amp;action=ajout&amp;l=" . $row['nom'] . "&amp;q=QUANTITEPRODUIT&amp;p=" . $row['prix'] . "'><span class='icon-add-panier'></span></a>
                                            <a class='float-right' href='produit.php?idPlats=" . $row['id'] . "'><span class='icon-details'></span></a>
                                        </div>
                                        </div>
                                        <img class='card-img-top' src='images/Plats/" . $row['image'] . "' alt='Card image cap'>
                                        <div class='card-body'>
                                            <h4 class='card-title title-sf-4'>" . $row['nom'] . "</h4>
                                            <span class='card-prix title-sf-4'>" . $row['prix'] . " €</span>
                                            <p class='card-text'>" . $row['details'] . "</p>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                            ?>
                        </div><!-- d-flex justify-content-between -->
                        <div class="d-flex justify-content-end" style="margin-top:15px;">
                            <button type="button" class="btn btn-link" onclick="location.href='livraison.php';">Voir plus<span class="icon-right"></span></button>
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
                                Savoir prendre soin de son alimentation est depuis longtemps au centre de nos préoccupations. Chez Sainefood nous avons parfaitement compris le challenge que cela représente et la difficulté de parvenir à manger sainement tous les jours. A l’heure où il est de plus en plus difficile de bien manger et où <a href="https://www.saine-food.fr/recettes-bio">cuisiner quotidiennement des aliments sains</a> et variés relève du véritable défi, accompagner nos clients est une nécessité absolue. Aussi nous vous proposons la possibilité d’apprendre à préparer sans efforts de vrais plats bio et sains, en utilisant une large gamme de produits frais.
                            </p>
                            <div class="d-flex align-items-end">
                                <button type="button" class="btn btn-link" onclick="location.href='a%20propos.php';">Voir plus<span class="icon-right"></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-bottom:20px;">
                        <img src="images/icons-atelier.svg" class="img-fluid center">
                    </div>
                    <hr class="separateur">
                    <div class="livraison">
                        <h2 class="title-sf-2 semibold">Zone de Livraison</h2>
                        <img src="images/zone-de-livraison.png" class="img-fluid" alt="zone de livraison">
                        <p>
                            Nous vous livrons dans un rayon de 10 km depuis nos locaux situés au 52, avenue Daumesnil dans le 12è arrondissement de Paris. Cela nous permet de vous garantir une livraison dans un délai d’attente de 45 minutes maximum. Si vous souhaitez être livré sur Paris au-delà de notre zone de livraison, merci de nous prévenir minimum 2h à l’avance.
                        </p>
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
                        <div class="p-2 fb"><span class="icon-facebook22"></span></div>
                        <div class="p-2 insta"><span class="icon-instagram2"></span></div>
                    </div>
                    
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
                        <div class="p-2 sous-title-footer">52,<br>avenue Daumesnil,<br> 75012</div>
                    </div>
                </div>
                <div class="d-flex p-2 sous-title-footer end-footer">© 2018<br>Tous droits réservés. Mentions légales</div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript">
            window._chatlio = window._chatlio||[];
            !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline", "page", "open", "showOrHide"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.3");
               n.setAttribute('data-widget-id','c4647cb2-60ec-44fe-6c64-0238350faa1b');
               c.parentNode.insertBefore(n,c);
            }();
        </script>
        <noscript>Your browser does not support JavaScript!</noscript>
    </body>
</html>