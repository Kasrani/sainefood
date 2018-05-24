<?php
// Start the session
include("authDB.php");
session_start();
if (isset($_GET['idPlats'])) {
    $plat = $_GET['idPlats'];
    $query = "SELECT * FROM `plat` WHERE id='$plat' or nom='$plat'";
    $result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
    $row = mysqli_fetch_assoc($result);
}
if (isset($_GET['idCours'])) {
    $cours = $_GET['idCours'];
    $query = "SELECT * FROM `event` WHERE id='$cours' or nom='$cours'";
    $result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
    $row = mysqli_fetch_assoc($result);
}
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
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
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
                                      <input type="email" class="form-control" name="email" value="" placeholder="Adresse e-mail">
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
        <nav id="nav" class="navbar navbar-fixed-top shadow container-fluid">
            <div class="container">
                <div class="row headerow">
                    <ul>
                        <a href="javascript:history.back()"><span class="icon-retour"></span><span class="retour">Retour</span></a>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container d-flex container-model position-relative ">
            <div  class="col-md-7 main-content shadow p-2 position-relative">
                <div class="content">
                    <?php
                    if (isset($_GET['idPlats'])){
                    echo "
                    <h2 class='title-sf-2 semibold text-left'>" . $row['nom'] . "</h2>
                    <img class='img-fluid' src='images/Plats/" . $row['image'] . "' alt=''><br><br>
                    <h4 class='title-sf-4'>Détails</h4>
                    <p>
                        " . $row['details'] . "
                    </p>
                    <h4 class='title-sf-4'>Ingrédients</h4>
                    <p>
                        " . $row['ingredients'] . "
                    </p>
                    <h4 class='title-sf-4'>Informations Nutritionnelles</h4>
                    <p>
                        Ail, cumin, poivre, sel, carotte, cannelle, coriandre, cacahuète, menthe, huile de tournesol, sirop d'érable, jus de citron bio
                    </p><br>
                    <table class='table table-striped'>
                        <tbody>
                            <tr>
                                <th scope='col'>Energie</th>
                                <td scope='col''>155 kcal</td>
                            </tr>
                            <tr>
                                <th scope='col'>Lipide</th>
                                <td scope='col'>10 g</td>
                            </tr>
                            <tr>
                                <th scope='col'>Dont acides gras saturés</th>
                                <td scope='col'>2g</td>
                            </tr>
                            <tr>
                                <th scope='col'>Glucides</th>
                                <td scope='col'>13g</td>
                            </tr>
                            <tr>
                                <th scope='col'>Dont sucres</th>
                                <td scope='col'>10.8g</td>
                            </tr>
                            <tr>
                                <th scope='col'>Protéines</th>
                                <td scope='col'>3 g</td>
                            </tr>
                            <tr>
                                <th scope='col'>Sel</th>
                                <td scope='col'>0.5 g</td>
                            </tr>
                            <tr>
                                <th scope='col'>Fibres</th>
                                <td scope='col'>4 g</td>
                            </tr>
                        </tbody>
                    </table>
                    <h4 class='title-sf-4'>Sourcing</h4><br><br>
                    <table class='table table-striped'>
                        <tbody>
                            <tr>
                                <td scope='col'>88% d ingrédients françaisl</td>
                            </tr>
                            <tr>
                                <td scope='col'>100% de légumes/fruits de saison</td>
                            </tr>
                            <tr>
                                <td scope='col'>52g d empreinte CO2</td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                    <h4 class='title-sf-4'>Avis clients</h4>
                    ";
                        }else if (isset($_GET['idCours'])) {
                        echo "
                    <h2 class='title-sf-2 semibold text-left'>" . $row['nom'] . "</h2>
                    <img class='img-fluid' src='images/Events/" . $row['image'] . "' alt=''><br><br>
                    <div class='disponibilite'>Plus que " . $row['disponibilite'] . " places disponibles</div>
                    <h4 class='title-sf-4'>Détails</h4>
                    <p>
                        " . $row['details'] . "
                    </p>
                    <h4 class='title-sf-4'>Prix</h4>
                    <p class='semibold'>" . $row['prix'] . " €</p>
                    <h4 class='title-sf-4'>Comment y aller ?</h4>
                    <p class='semibold'>Transport public<p/>
                    <p>Métro Franklin D. Roosevelt (M1, m9)<p/>
                    ";
                    }
                    ?>
                </div>
            </div>
            <div id="myFIX" class="col-md-4 p-2 commande-block position-relative">
                <div id="myFIXED" class="main-content p-2 shadow position-fixed">
                    <div class="content">
                        <h2 class="title-sf-2 semibold">Votre commande</h2><br>
                        <?php
//session_start();
include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

?>

<form name="panier" class="panier d-flex align-items-start flex-column" method="get" action="produit.php">
<table class="commande mb-auto p-2">
	<!--<tr>
        <td>Quantité</td>
		<td>Libellé</td>
		<td colspan="2">Prix/U</td>
		<td>Action</td>
	</tr>-->
    <tbody class="commande-block-max" style="position:relative;top:65px;">
	<?php
	if (creationPanier())
	{
	   $nbArticles=count($_SESSION['panier']['libelleProduit']);
	   if ($nbArticles <= 0){
	   echo "<div id='vide' class='btn-commander' style='width: calc(100% - 60px);'><button class='btn btn-primary btn-block shadow semibold'><a href=''>Votre panier est vide</a></button></div>";
        echo "
           <div class='nav-panier'>
            <hr class='separateur'>
            <div class='nav-element'>
            <label style='position:relative;top:26px;'>Panier</label>
            <div class='cercle-nav-panier'></div>
            </div>
            <div class='nav-element'>
            <label style='position:relative;top:26px;left:16px;'>Coordonnées</label>
            <div class='cercle-nav-panier'></div>
            </div>
            <div class='nav-element'>
            <label style='position:relative;top:26px;left:28px;'>Paiement</label>
            <div class='cercle-nav-panier'></div>
            </div>
            </div>
           ";
        }
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo "<tr class='border-panier'>";
              echo "<td><div class='quantite'><input style='display:none;' type=\"text\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/><input type=\"button\" value=\"-\" onclick=\"document.forms['panier'].elements[".(3 * $i)."].value = parseFloat(document.forms['panier'].elements[".(3 * $i)."].value) - 1; document.forms['panier'].submit();\"><input style='z-index: 1000;position:relative;left:-16px;' type=\"button\" value=\"+\" onclick=\"document.forms['panier'].elements[".(3 * $i)."].value = parseFloat(document.forms['panier'].elements[".(3 * $i)."].value) + 1; document.forms['panier'].submit();\"></div></td>";
            echo "<td><span>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</span></td>";
              echo "<td><span>x</span></td>";
	         echo "<td class='red_sf' style='padding-left:5px;'>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
	         echo "<td class='' style='text-align: right;' colspan='2'>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."  €</td>";
              if (isset($_GET['idPlats'])) {
	         echo "<td class='delete-block'><a style='font-size:12px;' class='delete semibold' href=\"".htmlspecialchars("produit.php?action=suppression&idPlats=" . $row['id'] . "&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">x</a></td>";
              }
              if (isset($_GET['idCours'])) {
	         echo "<td class='delete-block'><a style='font-size:12px;' class='delete semibold' href=\"".htmlspecialchars("produit.php?action=suppression&idCours=" . $row['id'] . "&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">x</a></td>";
              }
	         echo "</tr>";
	      }
	      echo "<tr class='total-panier'>";
	      echo "<td class='semibold' colspan=\"4\">Total <span>(TVA incl.)</span></td>";
	      echo "<td class='semibold' colspan=\"1\">". MontantGlobal() . " € </td>";
	      echo "</tr>";
	      echo "<tr><td colspan=\"4\">";
	      //echo "<input class='btn btn-link' type=\"submit\" value=\"Calculer\"/>";
	      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
           if (isset($_GET['idPlats'])) {
           echo "<input type=\"hidden\" name=\"idPlats\" value='" . $row['id'] . "'/>";
               }
           if (isset($_GET['idCours'])) {
           echo "<input type=\"hidden\" name=\"idCours\" value='" . $row['id'] . "'/>";
               }
	      echo "</td></tr>";
           echo "<div id='vide' class='btn-commander' style='width: calc(100% - 60px);z-index:1000;'><div class='btn btn-primary btn-block shadow semibold'><a href='#' id='etapes'>Commander</div></a></div>";
           echo "<center class='none' id='paypal-btn' class='' style='position: absolute;left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%); top:300px;z-index:1000;'><div id='paypal-button'></div></center>";
           echo "
           <div class='nav-panier nav-panier-panier'>
            <hr class='separateur'>
            <div class='nav-element active'>
            <label>Panier</label>
            <span class='icon-panier'></span>
            </div>
            <div class='nav-element'>
            <label style='position:relative;top:26px;left:16px;'>Coordonnées</label>
            <div class='cercle-nav-panier'></div>
            </div>
            <div class='nav-element'>
            <label style='position:relative;top:26px;left:28px;'>Paiement</label>
            <div class='cercle-nav-panier'></div>
            </div>
            </div>
           ";
	   }
        
	}
    
	?>
    </tbody>
</table>
    
    <?php
    if (isset($_GET['idPlats'])) {
        echo "<a id='ajout-article' class='btn btn-link' style='width:100%;z-index: 10000;' href='produit.php?idPlats=" . $row['id'] . "&amp;action=ajout&amp;l=" . $row['nom'] . "&amp;q=QUANTITEPRODUIT&amp;p=" . $row['prix'] . "'>Ajouter ce produit à votre panier</a>";
        }
    if (isset($_GET['idCours'])) {
        echo "<a id='ajout-article' class='btn btn-link' style='width:100%;z-index: 10000;' href='produit.php?idCours=" . $row['id'] . "&amp;action=ajout&amp;l=" . $row['nom'] . "&amp;q=QUANTITEPRODUIT&amp;p=" . $row['prix'] . "'>Ajouter ce cours à votre panier</a>";
        }
    ?>
</form>
<div class='nav-panier nav-panier-coordonnees none'>
<hr class='separateur'>
<div class='nav-element active'>
<label>Panier</label>
<span class='icon-panier'></span>
</div>
<div class='nav-element active'>
<label style='position:relative;top:-27px;left:16px;'>Coordonnées</label>
<span class='icon-user' style='position:relative;top:-33px;left:42px;'></span>
</div>
<div class='nav-element'>
<label style='position:relative;top:26px;left:28px;'>Paiement</label>
<div class='cercle-nav-panier'></div>
</div>
</div>
<div class='nav-panier nav-panier-payment none'>
<hr class='separateur'>
<div class='nav-element active'>
<label>Panier</label>
<span class='icon-panier'></span>
</div>
<div class='nav-element active'>
<label style='position:relative;top:-27px;left:16px;'>Coordonnées</label>
<span class='icon-user' style='position:relative;top:-33px;left:42px;'></span>
</div>
<div class='nav-element active'>
<label style='position:relative;top:-33px;left:28px;'>Paiement</label>
<span class='icon-payment' style='position:relative;top:0px;left:-20px;'></span>
</div>
</div>
 <div class='recapulatif none'>
     <p>
        Vous allez recevoir un email récapitulatif aprés le paiement de votre commande
     </p>
    <p>
        A bientôt
    </p>
    <p class="semibold red_sf">
        L'équipe sainefood
    </p>
</div>                       
<form id='coordonnees' name="coordonnees" action="" class='none contact' method="GET">
    <div class='mr-auto p-2 form-group'>
        <input type='text' name='nom' id='nom' value='' style='height:34px;' class='form-control' placeholder='Nom'>
    </div>
    <div class='mr-auto p-2 form-group'>
        <input type='text' id='prenom' name='prenom' value='' style='height:34px;' class='form-control' placeholder='Prenom'>
    </div>
    <div class='p-2 form-group'>
        <input type='email' id='email' name='email' value='' style='height:34px;' class='form-control' placeholder='Email'>
    </div>
    <div class='p-2 form-group'>
        <?php
        
        function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
        {
            $nb_lettres = strlen($chaine) - 1;
            $generation = '';
            
            for($i=0; $i < $nb_car; $i++)
            {
                $pos = mt_rand(0, $nb_lettres);
                $car = $chaine[$pos];
                $generation .= $car;
            }
            return $generation;
            }
            echo "<input type='hidden' id='password' value='" . chaine_aleatoire(8) . "' name='password' class='form-control'>";
        ?>
    </div>
    <?php
    if (isset($_GET['idPlats'])) {
        echo "<input type=\"hidden\" id='idPlats' name=\"idPlats\" value='" . $row['id'] . "'/>";
    }
    if (isset($_GET['idCours'])) {
        echo "<input id='idCours' type=\"hidden\" name=\"idCours\" value='" . $row['id'] . "'/>";
    }
    ?>
    <input id='btn-coordonnees' class='btn btn-primary btn-block shadow semibold' type="button" value="Finaliser votre commande" onclick="submitForm()" name="submit"/>
</form>

   <?php 
date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

  if ((isset($_GET['nom'])) and (isset($_GET['prenom'])) and (isset($_GET['email'])) and (isset($_GET['password']))) {
      $nom = $_GET['nom'];
      $prenom = $_GET['prenom'];
      $email = $_GET['email'];
      $password = $_GET['password'];
      mysqli_query($maConnexion,"INSERT INTO commande (nom,prenom,email) VALUES ('$nom','$prenom','$email')") 
or die(mysqli_error($maConnexion));
    $query = "SELECT * FROM `user`";
      $result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
      $row = mysqli_fetch_assoc($result);
      
      if ($row['email'] != $email) {
      mysqli_query($maConnexion,"INSERT INTO user (email,prenom,nom,password) VALUES ('$email','$prenom','$nom','$password')") 
or die(mysqli_error($maConnexion));
      //On envoie un mail de cofirmation
    
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 1;
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "kasrani.mourad@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "aqwzsxedc123";
    //Set who the message is to be sent from
    $mail->setFrom('kasrani.mourad@gmail.com', "L'equipe sainefood");
    //Set an alternative reply-to address
    $mail->addReplyTo('kasrani.mourad@gmail.com', "L'equipe sainefood");
    //Set who the message is to be sent to
    $mail->addAddress($email, $prenom);
    //Set the subject line
    $mail->Subject = 'Creation de votre espace utilisateur';
    $mail->Body = "<body style='width:612px; margin:auto; text-align:center;'>
    <img src='https://sainefood.herokuapp.com/images/mail-en-tete.png' alt='Sainefood'>
    <br><br><br>
    <h1 style='color:#ff594f; font-size:22px;'>Votre espace utilisateur</h1>
    <br><br><br>
    <h3 style='color:#484848;text-align:left;'>Cher(e) " .$prenom. "</h3><br>
     <p style='color:#484848;font-size:14px;text-align:left;line-height:20px;'>Vous pouvez acceder a votre compte utilisateur a l'aide des identifiants suivants</p><br>
     <p style='color:#484848;font-size:14px;text-align:left;line-height:20px;font-weight:600;'>Identifiant : " .$email. "</p>
    <p style='color:#484848;font-size:14px;text-align:left;line-height:20px;font-weight:600;'>Mot de passe : " .$password. "</p><br>
    <p style='color:#484848;font-size:14px;text-align:left;line-height:20px;'>A bientôt sur votre Espace Client,</p>
    <h3 style='color:#484848;text-align:left;'>L'équipe Sainefood</h3>
    </body>
    ";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
        header('Location: confirmation-ouverture-compte.php');
    }
    //Section 2: IMAP
    //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
    //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
    //You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
    //be useful if you are trying to get this working on a non-Gmail IMAP server.
    function save_mail($mail)
    {
        //You can change 'Sent Mail' to any other folder or tag
        $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
        //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
        $imapStream = imap_open($path, $mail->Username, $mail->Password);
        $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
        imap_close($imapStream);
        return $result;
    }   
}
  }
    
      


?>
                        

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<?php
echo "
<script>
    paypal.Button.render({

        env: 'production', // Or 'sandbox'
        
        commit: true, // Show a 'Pay Now' button

      style: {
        color: 'silver',
        size: 'small',
      },

        client: {
            sandbox:    'Afl68vN8kFWHLxiJcpXUDPJ6iPiMcyoHt5Zl_cB7IC4tKhMCRglROaNeQ4dmxLVLeW7ehK3JkCVNRXHE',
            production: 'AWdrr0AhrLc8S2cPbWJRc3yE7tOs-fo-MUuROSa6oHUufYLHU-1mblbSSoZKHaypdrOVi3Q9yWMa_o76'
        },

        commit: true, // Show a 'Pay Now' button

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '" . MontantGlobal() . "', currency: 'EUR' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(payment) {

                // The payment is complete!
                // You can now show a confirmation message to the customer
            });
        }

    }, '#paypal-button');
</script>
";
    ?>

                        
                    </div>
                </div>
            </div>
        </div>
        <div id="footer"></div>
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
        <script src="assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="assets/js/content.js"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript">
            window._chatlio = window._chatlio||[];
            !function(){ var t=document.getElementById("chatlio-widget-embed");if(t&&window.ChatlioReact&&_chatlio.init)return void _chatlio.init(t,ChatlioReact);for(var e=function(t){return function(){_chatlio.push([t].concat(arguments)) }},i=["configure","identify","track","show","hide","isShown","isOnline", "page", "open", "showOrHide"],a=0;a<i.length;a++)_chatlio[i[a]]||(_chatlio[i[a]]=e(i[a]));var n=document.createElement("script"),c=document.getElementsByTagName("script")[0];n.id="chatlio-widget-embed",n.src="https://w.chatlio.com/w.chatlio-widget.js",n.async=!0,n.setAttribute("data-embed-version","2.3");
               n.setAttribute('data-widget-id','c4647cb2-60ec-44fe-6c64-0238350faa1b');
               c.parentNode.insertBefore(n,c);
            }();
        </script>
    </body>
    <div id="printResult"></div>
</html>