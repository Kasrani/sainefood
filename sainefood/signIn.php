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
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#cfcbc2",
              "text": "#484848"
            },
            "button": {
              "background": "#ff594f",
              "text": "#484848"
            }
          },
          "content": {
            "message": "En poursuivant votre navigation, vous acceptez le dépôt de cookies destinés à améliorer votre expérience sur le site.",
            "dismiss": "Oui, j'accepte",
            "link": "En savoir plus",
            "href": "www.saine-food.fr/cookiespolicy"
          }
        })});
        </script>
	</head>
	<body class="signIn">
        <div id="header" class="navbar navbar-fixed-top container-fluid">
            <div class="container">
                <div class="d-flex">
                    <div class="p-2"><a href="index.php"><img src="images/Logo.svg" alt="Sainefood"></a></div>
                    <div class="p-2 baseline">Cours de cuisine & traiteur <b class="green">bio</b></div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto p-2 connecter"><?php if (isset($_SESSION['user'])){echo "Bonjour ";}?></div>
                    <a href="account.php" class="user">&nbsp;<?php if (isset($_SESSION['user'])){echo $_SESSION['user'];}   else {echo "";}?></a>
                    <div class="ml-auto p-2"><a style="color:#FFF;text-decoration:none;" href="panier.php"><span class="icon-panier"></span></a></div>
                    <?php
                    $nbArticle = count($_SESSION['panier']['libelleProduit']);
                    if (count($_SESSION['panier']['libelleProduit']) > 0) {
                        echo "<div id='totalProduct'><span>" . count($_SESSION['panier']['libelleProduit']) . "</span></div>";
                        }
                    ?>
                </div>
            </div>
        </div>   
        <div class="bandeau">
        </div>
            <div class="content">
                <div id="gridSystemModal" >
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
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/main.js"></script>
        <noscript>Your browser does not support JavaScript!</noscript>
    </body>
</html>