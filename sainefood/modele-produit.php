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
                    <div class="ml-auto p-2 connecter">Se connecter</div>
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
                    <h2 class="title-sf-2 semibold text-left">Seasonal pasta bowl</h2>
                    <img class="img-fluid" src="images/Plats/plat-1.jpg" alt=""><br><br>
                    <h4 class="title-sf-4">Détails</h4>
                    <p>
                        Une entrée healthy & gourmande - des carottes fondantes marinées dans du sirop d'érable, de la cannelle, de l'ail et du cumin. Un peu de menthe et de coriandre pour la fraîcheur et des cacahuète pour le croquant.
                    </p>
                    <h4 class="title-sf-4">Ingrédients</h4>
                    <p>
                        Ail, cumin, poivre, sel, carotte, cannelle, coriandre, cacahuète, menthe, huile de tournesol, sirop d'érable, jus de citron bio
                    </p>
                    <h4 class="title-sf-4">Informations Nutritionnelles</h4>
                    <p>
                        Ail, cumin, poivre, sel, carotte, cannelle, coriandre, cacahuète, menthe, huile de tournesol, sirop d'érable, jus de citron bio
                    </p><br>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">Energie</th>
                                <td scope="col">155 kcal</td>
                            </tr>
                            <tr>
                                <th scope="col">Lipide</th>
                                <td scope="col">10 g</td>
                            </tr>
                            <tr>
                                <th scope="col">Dont acides gras saturés</th>
                                <td scope="col">2g</td>
                            </tr>
                            <tr>
                                <th scope="col">Glucides</th>
                                <td scope="col">13g</td>
                            </tr>
                            <tr>
                                <th scope="col">Dont sucres</th>
                                <td scope="col">10.8g</td>
                            </tr>
                            <tr>
                                <th scope="col">Protéines</th>
                                <td scope="col">3 g</td>
                            </tr>
                            <tr>
                                <th scope="col">Sel</th>
                                <td scope="col">0.5 g</td>
                            </tr>
                            <tr>
                                <th scope="col">Fibres</th>
                                <td scope="col">4 g</td>
                            </tr>
                        </tbody>
                    </table>
                    <h4 class="title-sf-4">Sourcing</h4><br><br>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td scope="col">88% d'ingrédients françaisl</td>
                            </tr>
                            <tr>
                                <td scope="col">100% de légumes/fruits de saison</td>
                            </tr>
                            <tr>
                                <td scope="col">52g d'empreinte CO2</td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
                    <h4 class="title-sf-4">Avis clients</h4>
                </div>
            </div>
            <div id="myFIX" class="col-md-4 p-2 commande-block position-relative">
                <div id="myFIXED" class="main-content p-2 shadow position-fixed">
                    <div class="content">
                        <h2 class="title-sf-2 semibold">Votre commande</h2>
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