<?php
// Start the session
session_start();
if (isset($_GET['nom'])) {
    $plat = $_GET['nom'];
}
if (isset($_GET['l'])) {
    $plat = $_GET['l'];
}
$maConnexion = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","bc79c844c05827","11e8e8f1","heroku_a4f632ea2ba8ee3");
$query = "SELECT * FROM `plat` WHERE nom='$plat'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

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
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body class="dd">
        <div id="header" class="navbar navbar-fixed-top">
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
            
        <nav id="nav" class="navbar navbar-fixed-top shadow">
            <div class="container">
                <div class="row headerow">
                    <ul>
                        <a href="index.php"><span class="icon-retour"></span><span class="retour">Retour</span></a>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container d-flex container-model position-relative ">
            <div  class="col-md-7 main-content shadow p-2 position-relative">
                <div class="content">
                    <?php
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
                    ?>
                </div>
            </div>
            <div id="myFIX" class="col-md-4 p-2 commande-block position-relative">
                <div id="myFIXED" class="main-content p-2 shadow position-fixed">
                    <div class="content">
                        <h2 class="title-sf-2 semibold">Votre commande</h2>
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

<form class="panier" method="get" action="produit.php">
<table>
	<!--<tr>
        <td>Quantité</td>
		<td>Libellé</td>
		<td colspan="2">Prix/U</td>
		<td>Action</td>
	</tr>-->


	<?php
	if (creationPanier())
	{
	   $nbArticles=count($_SESSION['panier']['libelleProduit']);
	   if ($nbArticles <= 0)
	   echo "<tr><td>Votre panier est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo "<tr>";
            echo "<td><div class='form-group'><input type=\"number\" class='form-control' name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></div></td>";
	         echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
	         echo "<td colspan='2'>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."  €</td>";
	         echo "<td><a href=\"".htmlspecialchars("produit.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">X</a></td>";
	         echo "</tr>";
	      }

	      echo "<tr>";
	      echo "<td colspan=\"3\">Total (TVA incl.)</td>";
	      echo "<td colspan=\"1\">". MontantGlobal() . " € </td>";
	      echo "</tr>";
	      echo "<tr><td colspan=\"4\">";
	      echo "<input class='btn btn-link' type=\"submit\" value=\"Calculer\"/>";
	      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
           echo "<input type=\"hidden\" name=\"nom\" value='" . $row['nom'] . "'/>";

	      echo "</td></tr>";
	   }
	}
	?>
</table>
</form>
                        <?php
echo "<a class='float-left' href='produit.php?nom=" . $row['nom'] . "&amp;action=ajout&amp;l=" . $row['nom'] . "&amp;q=QUANTITEPRODUIT&amp;p=" . $row['prix'] . "'>Ajouter au panier</a>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer"></div>
        <footer >
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="logo-2"><img src="images/Logo-2.svg" alt="Sainefood"></div>
                    <form class="form-inline">
                        <div class="form-group mb-2">
                            <label>Recevez notre Newsletter !</label>
                            <input type="text" class="form-control" id="staticEmail2" value="" placeholder="Votre e-mail">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">S’inscrire</button>
                    </form>
                </div>
            </div>
            <hr class="separateur">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="icon-footer"><img src="images/icon-footer.png" alt=""></div>
                    <div class="d-flex flex-column">
                        <div class="p-2 title-groupe-footer">En savoir plus</div>
                        <div class="p-2 sous-title-footer">Concept</div>
                        <div class="p-2 sous-title-footer">Zone de livraison</div>
                        <div class="p-2 sous-title-footer">FAQ</div>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="p-2 title-groupe-footer">Nos valeurs</div>
                        <div class="p-2 sous-title-footer">Nos engagements</div>
                        <div class="p-2 sous-title-footer">Blog</div>
                        <div class="p-2 sous-title-footer">Nos partenaires</div>
                    </div>
                    <div class="d-flex flex-column">
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
        <script src="assets/js/content.js"></script>
    </body>
    
</html>