<?php
include("authDB.php");
// Start the session
session_start();
//if  authentication successful 
if(!$_SESSION['user']){
   header("location:index.php");
   die;
}
?>
<!DOCTYPE HTML>
<html lang="fr">
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
                    <div class="p-2"><a href="index.php"><img src="images/Logo.svg" alt="Sainefood"></a></div>
                    <div class="p-2 baseline">Cours de cuisine & traiteur <b class="green">bio</b></div>
                </div>
                <div class="d-flex">
                    <div class="ml-auto p-2 connecter" data-toggle="modal" data-target="#gridSystemModal"><?php echo "<a style='color:#FFF;' href='logout.php'>Se deconnecter</a>"; ?></div>
                    <div class="ml-auto p-2"><span class="icon-panier"></span></div>
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
        <div class="container main-content shadow">
            <div class="content account">
            <?php
             //require('check.php');
                if ($_SESSION['email']=="admin@sainefood.fr") {
                    echo "<h2 class='title-sf-2 text-center'>Bonjour  " . $_SESSION['user'] . "</h2> ";
                    echo "<h3 class='title-sf-3 text-center'>Bienvenue sur votre espace Administrateur</h3><br><br>";
                    echo "
                    <div class='contact'>
                        <form action='backOffice/user/updateProfil.php' method='post'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Nom</label>
                                    <input type='text' name='nomUp' value='" . $_SESSION['name'] .  "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Email</label>
                                    <input type='email' name='emailUp' value='" . $_SESSION['email'] .  "' class='form-control' placeholder=''>
                                </div>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Prenom</label>
                                    <input type='text' name='prenomUp' value='" . $_SESSION['user'] .  "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Mot de passe</label>
                                    <input type='password' name='passwordUp' value='" . $_SESSION['pass'] .  "' class='form-control' placeholder=''>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Modifier mes informations</button><br>
                            </div>
                        </form>
                    </div>";
                    echo "<br><br><br><hr id='gestionCours' class='separateur'>";
                    echo "<br><h4 class='title-sf-4 semibold'>Gestion des cours de cuisine :</h4>";
                    echo "<br>";
                            $rec = "SELECT * FROM `event`";
                            $result = mysqli_query($maConnexion,$rec);
                            $selectOptionCours = null;
                            $test = null;
                    echo "
                            <div class='contact'>
                            <form method='GET' action='#gestionCours'>
                            <div class='d-flex contact'>
                                <button type='submit' name='addCours' class='p-2 mr-2 btn btn-primary shadow'>Ajouter</button>
                                <button type='submit' name='updateCours' class='p-2 mr-2 btn btn-primary shadow'>Modifier</button>
                                <button type='submit' name='deleteCours' class='p-2 mr-2 btn btn-primary shadow'>Supprimer</button>
                              </div><br>
                            <div class='d-flex form-row'>
                            <div class='p-2 form-group col-md-5'>
                            <select class='form-control' name='selectOptionCours'>
                                        <option>choisir un cours de cuisine</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option>" . $row['nom'] . "</option>";
                                        }             
                            echo " </select>
                            </div>
                            </form>
                        </div>";

                        if (isset($_GET['addCours'])) {
                            require('backOffice/cours/add.php');
                        } else if (isset($_GET['updateCours'])){
                            require('backOffice/cours/update.php');
                        } else if (isset($_GET['deleteCours'])) {
                            require('backOffice/cours/delete.php');
                        }
                         //require('add.php');
                        
                    echo "</div><br><br><hr id='gestionPlat' class='separateur'>";
                    echo "<br><h4 class='title-sf-4 semibold'>Gestion des plats :</h4>";
                    echo "<br>";
                            $rec = "SELECT * FROM `plat`";
                            $result = mysqli_query($maConnexion,$rec);
                            $selectOption = null;
                            $test = null;
                    echo "
                            <div class='contact'>
                            <form method='GET' action='#gestionPlat'>
                            <div class='d-flex contact'>
                                <button type='submit' name='add' class='p-2 mr-2 btn btn-primary shadow'>Ajouter</button>
                                <button type='submit' name='update' class='p-2 mr-2 btn btn-primary shadow'>Modifier</button>
                                <button type='submit' name='delete' class='p-2 mr-2 btn btn-primary shadow'>Supprimer</button>
                              </div><br>
                            <div class='d-flex form-row'>
                            <div class='p-2 form-group col-md-5'>
                            <select class='form-control' name='selectOption'>
                                        <option>choisir un plat</option>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option>" . $row['nom'] . "</option>";
                                        }             
                            echo " </select>
                            </div>
                            </form>
                        </div>";

                        if (isset($_GET['add'])) {
                            require('backOffice/plats/add.php');
                        } else if (isset($_GET['update'])){
                            require('backOffice/plats/update.php');
                        } else if (isset($_GET['delete'])) {
                            require('backOffice/plats/delete.php');
                        }
                         //require('add.php');
                        
                    // Gestion des articles
                    
                    echo "</div><br><br><hr id='gestionArticle' class='separateur'>";
                    echo "<br><h4 class='title-sf-4 semibold'>Gestion des articles :</h4>";
                    echo "<br>";
                            $rec = "SELECT * FROM `plat`";
                            $result = mysqli_query($maConnexion,$rec);
                            $selectOption = null;
                            $test = null;
                    echo "
                            <div class='contact'>
                            <form method='GET' action='#gestionArticle'>
                            <div class='d-flex contact'>
                                <button type='submit' name='add' class='p-2 mr-2 btn btn-primary shadow'>Nouveau article</button>
                              </div>
                            </form>
                            ";

                        if (isset($_GET['add'])) {
                            require('backOffice/articles/add.php');
                        }
                         //require('add.php');
                    
                    // END Gestion des articles
                    
                    echo "</div>";
                }else {
                echo "<h2 class='title-sf-2 text-center'>Bonjour  " . $_SESSION['user'] . "</h2> ";
                    echo "<h3 class='title-sf-3 text-center'>Bienvenue sur votre espace utilisateur</h3><br><br>";
                    echo "
                    <div class='contact'>
                        <form action='backOffice/user/updateProfil.php' method='post'>
                            <div class='d-flex form-row'>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Nom</label>
                                    <input type='text' name='nomUp' value='" . $_SESSION['name'] .  "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Email</label>
                                    <input type='email' name='emailUp' value='" . $_SESSION['email'] .  "' class='form-control' placeholder=''>
                                </div>
                                <div class='mr-auto p-2 form-group col-md-5'>
                                    <label for=''>Prenom</label>
                                    <input type='text' name='prenomUp' value='" . $_SESSION['user'] .  "' class='form-control' placeholder=''>
                                </div>
                                <div class='p-2 form-group col-md-5'>
                                    <label for=''>Mot de passe</label>
                                    <input type='password' name='passwordUp' value='" . $_SESSION['pass'] .  "' class='form-control' placeholder=''>
                                </div>
                            </div>
                            <div class='p-2'>
                                <button type='submit' class='btn btn-primary float-right shadow'>Modifier mes informations</button><br>
                            </div>
                        </form>
                    </div><br><br><br><hr id='gestionCours' class='separateur'>";
                    echo "<br><h4 class='title-sf-4 semibold'>Historique de commande :</h4><br><br>";
                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM `commande` WHERE email='$email'";
                    $result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
                    echo "
                    <div class='table-responsive'>
                    <table class='table table-striped'>
                        <thead>
                        <tr class='semibold'>
                          <th scope='col'>Nom</th>
                          <th scope='col'>Commande</th>
                          <th scope='col'>Adresse de livraison</th>
                          <th scope='col'>Montant global</th>
                          <th scope='col'>Date</th>
                          <th scope='col'>Commande finalisée ?</th>
                        </tr>
                      </thead>
                        <tbody>";
                            while ($row = $result->fetch_assoc()) {
                                            echo "
                                            <tr>
                                              <th scope='row'>" . $row['nom'] . "</th>
                                              <td>" . $row['liste'] . "</td>
                                              <td>" . $row['adresseLivraison'] . "</td>
                                              <td>" . $row['montant'] . " €</td>
                                              <td>" . $row['date'] . "</td>
                                              <td>" . $row['vente'] . "</td>
                                            </tr>
                                            ";
                                        } 
                          echo "</tbody>
                        </table>
                    </table>
                    </div>
                    ";
                }
                    
            ?>
                
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
        <script src="assets/js/content.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
    
</html>