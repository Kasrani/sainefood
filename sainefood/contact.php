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
        <div class="bandeau bandeau-contact">
        </div>
        <div class="container main-content shadow contact">
            <div class="content">
                <h2 class="title-sf-2 semibold">Comment pouvons-nous vous aider ?</h2>
                <h3 class="title-sf-3 text-center">Vous êtes une entreprise ou un groupe de particuliers ?</h3>
                <h4 class="title-sf-4 text-center">
                    Vous souhaitez obtenir un devis ? Une demande spécifiques ?
                </h4>
                <h4 class="title-sf-4 text-center">
                    Merci de nous adresser votre demande via le formulaire ci-dessous
                </h4>
                <hr class="separateur">
                <p class="text-right">* Obligatoire</p>
                <form action="mailContact.php" method="post">
                    <div class="d-flex form-row">
                        <div class="mr-auto p-2 form-group col-md-5">
                            <label for="">Nom / Prénom  *</label>
                            <input type="text" name="nomPrenom" class="form-control" id="" placeholder="">
                        </div>
                        <div class="p-2 form-group col-md-5">
                            <label for="">Sujet de la demande *</label>
                            <select class="form-control" id="">
                                <option>Choix 1</option>
                                <option>Choix 2</option>
                            </select>
                        </div>
                        <div class="mr-auto p-2 form-group col-md-5">
                            <label for="">Raison social *</label>
                            <input type="text" name="raisonSocial" class="form-control" id="" placeholder="">
                        </div>
                        <div class="p-2 form-group col-md-5">
                            <label for="">Nombre de participants *</label>
                            <select class="form-control" id="">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                            </select>
                        </div>
                        <div class="mr-auto p-2 form-group col-md-5">
                            <label for="">E-mail *</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="">
                            <label for="">Téléphone *</label>
                            <input type="text" name="telephone" class="form-control" id="" placeholder="">
                        </div>
                        <div class="p-2 form-group col-md-5">
                            <label for="">Message *</label>
                            <textarea class="form-control" name="message" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="d-flex form-row">
                        <div class="mr-auto p-2 form-group col-md-5">
                            <img src="images/mail.png">
                        </div>
                        <div class="p-2 form-group col-md-5">
                            <div class="g-recaptcha" data-sitekey="6LclnlMUAAAAAKN_lXJnPRaHzfKLtjYiD8il_dGy"></div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">
                                    Oui, je souhaite recevoir les communications commerciales concernant les produits, services, publications et, événements de SaineFood.<br><br>
                                    En vous enregistrant, vous confirmez que vous consentez à l'hébergement et au traitement de vos données à caractère personnel par SaineFood dans les conditions décrites dans notre <a href="#">politique de confidentialité</a>.
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2 float-right shadow">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer>
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
        <script src="assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    
</html>