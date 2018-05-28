<?php
// Database Authentication
include("authDB.php");
session_start();
ob_start("ob_gzhandler");
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
                        <li><a href="actualites.php">Actualités</a></li>
                        <li class=""><a href="contact.php">Contact</a></li>
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
                <h1 class="title-sf-1">Conditions générales de vente -  Conditions générales d'utilisation</h1>
                <p></p>
                <p class="text-center">
                    Les présentes conditions s’appliquent à toutes les ventes effectuées sur le présent site
                    internet sainefood.fr (ci-après le « <strong>Site Internet</strong> » ou le « <strong>Site</strong> »).
                </p>
                <p class="text-center">
                    Les présentes conditions générales de ventes (ci-après « CGV ») sont conclues entre d’une
                    part Sainefood dont le siège social est sis 52 rue Daumesnil 75012 - Paris, inscrite au
                    Registre du Commerce et des Sociétés (RCS) de Paris sous le numéro 79017694500018
                    (ci-après la « <strong>Société</strong> » ou « <strong>Sainefood</strong> ») et toute personne, particulier ou entreprise,
                    visitant ou effectuant un achat via le Site Internet (ci-après dénommée le « <strong>Client</strong> » ou
                    l’« <strong>Acheteur</strong> »). La Société et le Client sont dénommés ensemble les « <strong>Parties</strong> ».
                </p>
                <p class="text-center">
                    Les CGV détaillent les droits et obligations de Sainefood ainsi que du Client dans le cadre de la vente de cours de cuisine et de produits bio végan sur internet.
                </p>
                <p class="text-center">
                    Les CGV prévalent dans tous les cas sur tout autre document émis qui n’ont qu’une valeur indicative (tels que renseignements fournis de façon directe ou publicitaire sur les produits, description et renseignement de nos prospectus, catalogues, tarifs, reproduction...).
                </p>
                <p class="text-center">
                    Les CGV applicables sont celles en vigueur au jour de la commande effectuée par le Client.
                    La Société se réserve le droit de modifier les présentes CGV sans préavis qui deviendront
                    applicables aux ventes réalisées postérieurement à la modification.
                </p>
                <p class="text-center">
                    Les CGV font partie intégrante de notre offre et sont donc systématiquement portées à la
                    connaissance de tout Client préalablement à la passation d’une commande. Le fait de
                    passer commande implique nécessairement l’acceptation sans aucune réserve et
                    l’adhésion pleine et entière du Client aux présentes conditions. Toute condition contraire
                    opposée par le Client sera inopposable à la Société, à défaut d’acceptation expresse de
                    notre part, et ce quel que soit le moment où elle aura pu être portée à notre connaissance.
                    Aucune signature manuscrite ou électronique n’est nécessaire pour engager le Client, le fait
                    pour ce dernier de cocher la case « j’ai pris connaissance des conditions générales de vente
                    et je les accepte » avant de valider sa commande entraîne automatiquement l’acceptation
                    expresse par ce dernier et sans restriction ni réserve des présentes CGV.
                </p>
                <p class="text-center">
                    L’activité professionnelle de la Société est assurée par MMA Entreprise
                </p>
                <p class="text-center" style="color:#CFCBC2;">
                    Agence de Boulogne Billancourt :<br>
                    85 route de la reine<br>
                    Tél 01 46 03 08 50<br>
                    Fax 01 46 03 96 00<br>
                    Siren n° 485 357 560 – RCS Nanterre (Orias n° 07 011024 – <a href="www.orias.fr">www.orias.fr</a>)
                </p>
                <h2 class="title-sf-2">Produits et services</h2>
                <p class="text-center">
                    Les produits et services de notre offre sont conformes à la réglementation et aux normes en
                    vigueur en France et/ou dans l’Union Européenne à la date de leur livraison. Chaque produit
                    est accompagné d’un descriptif permettant au Client de connaître la composition de son
                    panier et les caractéristiques essentielles du panier conformément à l’article L. 111-1 du
                    code de la consommation ; les photos et illustrations n’ont toutefois qu’une valeur indicative.
                </p>
                <p class="text-center">
                    La Société se réserve le droit de modifier à tout moment et sans préavis son offre. En
                    conséquence, les produits de notre offre sont disponibles tant qu’ils figurent sur le Site et
                    dans la limite des stocks. En cas d’indisponibilité du produit après la passation de la
                    commande, le Client sera informé par mail, et aucun paiement ne sera débité ; si le paiement
                    a déjà été débité, il sera remboursé.
                </p>
                <p class="text-center">
                    Certains produits commandés par le client pourraient ne plus être disponibles le jour prévu
                    de la livraison en raison d’aléas climatiques, de l’indisponibilité des produits chez les
                    fournisseurs pour toute autre cause. Dans cette hypothèse, la Société informera le client
                    dans les plus brefs délais par courrier électronique, SMS ou téléphone et lui proposera une
                    solution de remplacement ou un remboursement total ou partiel de sa commande.
                </p>
                <p class="text-center">
                    La Société ne livre pas le dimanche et les jours fériés.
                </p>
                <p class="text-center">
                    La Société fera ses meilleurs efforts pour prévenir le Client au moins dix (10) jours
                    calendaires à l’avance des modifications de planning de livraison résultant du fait que le jour
                    de livraison prévu au planning tomberait un jour férié.
                </p>
                <h2 class="title-sf-2">Service client</h2>
                <p class="text-center">
                    Pour toutes questions relatives à nos produits ou à notre Site Internet, notre service client
                    est à votre disposition :
                </p>
                <p class="text-center" style="color:#CFCBC2;">
                    52 rue Daumesnil
                    75012 - Paris
                    01 02 54 98 36 (prix d’un appel local)
                    <a href="service.client@saine-food.fr">service.client@saine-food.fr</a>
                </p>
                <h2 class="title-sf-2">Accessibilité des services</h2>
                <p class="text-center">
                    Le Site Internet est accessible 24/24h et 7/7j, sauf interruption, programmée ou non par la
                    Société, notamment pour les besoins de sa maintenance, d’une suspension d’activité ou en
                    cas de force majeure. La Société ne saurait être tenue responsable de tout dommage, quelle
                    qu’en soit la nature, résultant d’une indisponibilité du Site.
                </p>
                <p class="text-center">
                    La mise à disposition du compte du Client ne lui ouvre aucun droit et ne crée aucune
                    obligation à la charge de la Société.
                </p>
                <p class="text-center">
                    La transmission d’informations par internet peut ne pas être totalement sécurisée. Bien que
                    la Société prenne l’ensemble des dispositions requises par la loi pour protéger l’ensemble
                    de vos informations sur notre Site, la Société ne pourra garantir que la transmission des
                    données à notre Site Internet soit protégée. Cette transmission intervient aux risques du
                    Client.
                </p>
                <h2 class="title-sf-2">Commandes</h2>
                <p class="text-center">
                    Les informations contractuelles, présentées au Client en langue française, feront l’objet
                    d’une confirmation au moment de la validation de la commande.
                </p>
                <p class="text-center">
                    Le Client est entièrement responsable des informations saisies dans le bon de commande.
                    A défaut d’être complètement renseigné, le bon de commande ne sera pas validé.
                    En conséquence, notre responsabilité ne saurait être recherchée ni engagée dans le cas où
                    la Société serait dans l’impossibilité de livrer ou d’exécuter la commande en raison d’erreurs,
                    imprécisions ou omissions relativement à ces informations.
                </p>
                <p class="text-center">
                    Le Client, qui souhaite commander un ou plusieurs produits doit obligatoirement :
                </p>
                <p class="text-center">
                    - Se connecter en s’identifiant au moment de passer commande, ou créer un compte client
                    personnel.
                    Pour ce faire, il devra remplir le formulaire d’inscription sur lequel il indiquera toutes les
                    coordonnées demandées et en particulier le lieu de livraison souhaité (qui doit être le plus
                    précis possible et indiquer, notamment le numéro de bâtiment, d’étage, la situation de
                    l’appartement obligatoirement, étant précisé que Sainefood livre partout en France hors îles
                    métropolitaines et hors Dom-Tom) et préciser les éventuelles restrictions d’accessibilité du
                    lieu de livraison (digicode, nom de l’interphone s’il ne correspond pas à celui du client, etc.).
                </p>
                <p class="text-center">
                    Le Client est en outre amené à choisir un mot de passe qui devra rester confidentiel et ne
                    pas être divulgué à un tiers. Le Client demeure responsable de l’utilisation de son compte
                    et de son mot de passe.
                </p>
                <p class="text-center">
                    – Remplir le panier de commande en ligne en sélectionnant les produits ou services choisis
                </p>
                <p class="text-center">
                    – Valider sa commande après l’avoir vérifiée, et notamment le lieu de livraison, ainsi que la
                    date et l’heure de livraison sélectionnées.
                </p>
                <p class="text-center">
                    – Effectuer le paiement dans les conditions prévues.
                </p>
                <p class="text-center">
                    – Confirmer sa commande et son règlement.
                </p>
                <p class="text-center">
                    Préalablement à la conclusion du contrat, la Société porte à la connaissance du Client,
                    conformément à l’article L.221-5 du Code de la consommation, notamment :
                </p>
                <p class="text-center">
                    • Une information sur les caractéristiques essentielles du produit commandé par le Client,<br>
                    • Le prix du produit,<br>
                    • La date de mise à disposition ou de livraison du produit,<br>
                    • Les informations relatives à la Société, notamment ses coordonnées postales et téléphoniques,<br>
                    • L’information selon laquelle le Client ne bénéficie pas du droit de rétractation sur les produits périssables,<br>
                    • Les informations relatives au service après-vente et aux garanties commerciales,<br>
                    • L’identification du numéro de commande,<br>
                    • Le montant total de la commande (prix hors taxe, prix TTC, frais de port ou l’indication
                    de l’absence de frais de port). Il est précisé que les prix sont soumis à la T.V.A.
                    française, soit 5,5%, 10% ou 20% selon les catégories de produits (tout changement
                    du taux légal de cette T.V.A. sera répercuté sur le prix des produits présentés sur le
                    site de la Société, à la date d’entrée en vigueur du décret y afférent).
                </p>
                <p class="text-center">
                    Cette commande n’acquiert valeur contractuelle qu’après notre envoi par e-mail d’un accusé
                    de réception de commande – ARC (confirmation de commande). Cet e-mail reprendra les
                    informations visées ci-dessus. La Société se réserve le droit de ne pas confirmer tout bon
                    de commande d’un Client avec lequel il existe ou existerait un litige ou qui n’aurait pas réglé,
                    ou réglé partiellement, une précédente commande.
                </p>
                <p class="text-center">
                    Les commandes passées sur le site sont destinées un usage personnel. Le Client s’interdit
                    notamment de revendre les produits à un tiers.
                </p>
                <h2 class="title-sf-2">Prix</h2>
                <p class="text-center">
                    Les prix des produits sont ceux en vigueur, c’est-à-dire diffusés sur notre site internet.
                    Sainefood se réserve le droit de modifier les prix à tout moment. Le Client sera informé de
                    toute modification du prix du produit par rapport au prix payé la semaine précédente dans
                    un délai raisonnable. Les produits seront facturés sur la base du tarif en vigueur au moment
                    de la commande.
                </p>
                <p class="text-center">
                    Les prix sont exprimés en euros, toutes taxes comprises hors participation aux frais de
                    transports et de livraison.
                </p>
                <h2 class="title-sf-2">Paiement</h2>
                <p class="text-center">
                    Le paiement s’effectue par carte bancaire (Carte Bleue, Carte Visa ou Carte Mastercard)
                    via le serveur bancaire de notre banque dans un environnement sécurisé c’est-à-dire par
                    un procédé de cryptage des données qui en assure la confidentialité. Le paiement se
                    déroule donc directement entre le Client et la banque, les informations transmises par le
                    Client à partir de son ordinateur ne circulent pas en clair sur le net.
                </p>
                <p class="text-center">
                    Les cartes MAESTRO et certaines cartes virtuelles n'acceptant pas la récurrence ne sont
                    pas acceptés comme moyen de paiement.
                </p>
                <p class="text-center">
                    Les coordonnées restent cependant enregistrées, ce qui signifie que le Client n’aura pas
                    besoin de communiquer ces informations lors de chaque nouvelle commande. Le payement
                    sera débité automatiquement sur sa carte.
                </p>
                <p class="text-center">
                    En cas de refus du centre du paiement bancaire concerné, la commande sera
                    automatiquement annulée. En cas de paiement non validé le Client devra contacter le
                    service client de la Société.
                </p>
                <h2 class="title-sf-2">Impayé</h2>
                <p class="text-center">
                    En cas d’impayé, la commande sera annulée.
                </p>
                <h2 class="title-sf-2">Droit de rétractation</h2>
                <p class="text-center">
                    Conformément à l’article L. 221-28 4° du code de la consommation, le droit de rétractation
                    prévu par l’article L. 221-28 du code de la consommation ne peut pas être exercé par le
                    Client en raison de la nature périssable des produits vendus. Néanmoins, lorsque, de
                    manière exceptionnelle, la Société livrera à ses Clients des produits non-périssables, le droit
                    de rétractation sera ouvert, concernant ces seuls biens.
                </p>
                <p class="text-center">
                    Dans cette hypothèse, le délai de rétractation expire quatorze (14) jours après le jour où le
                    Client, ou un tiers autre que le transporteur et désigné par le Client, prend physiquement
                    possession du bien.
                </p>
                <p class="text-center">
                    Pour exercer le droit de rétractation, le Client devra notifier à la Société, avant l’expiration
                    du délai de rétractation, sa décision de rétractation du présent contrat au moyen d'une
                    déclaration dénuée d'ambiguïté. L’exercice du droit de rétractation peut se faire par
                    l’utilisation du formulaire type annexé aux présentes CGV.
                </p>
                <p class="text-center">
                    Le retour des articles devra faire l’objet d’un accord préalable du service client de la Société.
                </p>
                <p class="text-center">
                    Les frais de livraison de même que les frais de retour demeureront à la charge du Client.
                </p>
                <p class="text-center">
                    En cas d'exercice de ce droit de rétractation, la Société fera tous ses efforts pour rembourser
                    le Client dans un délai raisonnable maximum de quatorze jours à compter du jour où la
                    Société reçoit notification par le Client de sa volonté de se rétracter. La Société se réserve
                    le droit de différer le remboursement jusqu’à récupération des biens ou jusqu’à ce que le
                    Client ait fourni une preuve de l’expédition de ces biens, la date retenue étant celle du
                    premier de ces faits.
                </p>
                <p class="text-center">
                    A VOIR Le Client sera alors remboursé par système de re-crédit (transaction sécurisée) en
                    cas de paiement par carte bancaire, ou par chèque dans les autres cas.
                </p>
                <h2 class="title-sf-2">Livraison</h2>
                <p class="text-center">
                    Les produits ne peuvent être livrés que dans la zone de livraison indiquée sur le site, à
                    savoir en France hors îles métropolitaines et hors Dom-Tom.
                </p>
                <p class="text-center">
                    La Société s’engage à faire ses meilleurs efforts pour livrer dans le créneau horaire et à
                    l’adresse de livraison mentionnée dans le bon de commande et dans le délai choisi par le
                    Client au moment de passer commande.
                </p>
                <p class="text-center">
                    Le Client s’engage donc à être disponible pour réceptionner les produits à l’adresse et au
                    créneau horaire qu’il a indiqué dans sa commande.
                </p>
                <p class="text-center">
                    Dans le cas où les produits commandés n’ont pu être livrés du fait de l’absence du Client
                    ou du fait d’informations erronées ou imprécises sur l’horaire et le lieu de livraison, la
                    responsabilité de la Société ne pourra être engagée. Le Client peut alors contacter la
                    Société par téléphone afin de convenir d’un nouveau rendez-vous de livraison dans les 24h
                    suivants le créneau horaire initialement prévu.
                </p>
                <p class="text-center">
                    Les frais de cette nouvelle livraison seront à la charge du Client.
                </p>
                <p class="text-center">
                    Dans l’hypothèse où un nouveau rendez-vous s’avère impossible dans les délais
                    nécessaires au maintien de la fraicheur des produits, le règlement de la commande (frais
                    de livraison compris) restera acquis à la société à titre d’indemnité.
                </p>
                <p class="text-center">
                    Nos produits sont livrés par transporteur.
                </p>
                <h2 class="title-sf-2">Réception</h2>
                <p class="text-center">
                    Il appartiendra au client de vérifier les produits au moment même de leur livraison. En
                    conséquence :
                </p>
                <p class="text-center">
                    En cas de produits manquants ou abîmés, le client devra faire toutes constatations
                    nécessaires lors de la réception des produits sur le bon de livraison et notifier
                    immédiatement ses observations au service client de la Société afin qu’une solution
                    soit trouvée dans les meilleurs délais.
                </p>
                <p class="text-center">
                    En cas de non-conformité des produits livrés par rapport aux produits commandés ou au
                    bon de livraison, le client devra immédiatement retourner à ses frais et à ses risques le
                    produit non conforme et formuler ses réclamations par écrit au plus tard dans les 3 jours de
                    la réception des produits au siège social de la Société.
                </p>
                <h2 class="title-sf-2">Clause de réserve de propriété</h2>
                <p class="text-center">
                    La Société se réserve la propriété des produits jusqu’à complet paiement du prix facturé.
                </p>
                <h2 class="title-sf-2">Force majeure</h2>
                <p class="text-center">
                    La force majeure et le cas fortuit exonèrent la Société de toute obligation de livrer. Toute inexécution due à la force majeure ou cas fortuit, donnera lieu à remboursement, s’il y a lieu, des sommes réglées mais en aucun cas à des dommages et intérêts.
                </p>
                <h2 class="title-sf-2">Garantie</h2>
                <p class="text-center">
                    La Société garantit les produits conformément aux dispositions légales tant du code civil
                    (articles 1641 à 1649 et 2232) que du code de la consommation (articles L.217-4 à L.217-
                    13), sur présentation de la facture d’achat ou confirmation de commande sur le Site Internet.
                </p>
                <p class="text-center">
                    Toute réclamation devra être adressée à la Société par le client par lettre recommandée
                    avec accusé de réception à l’adresse du siège social de la Société figurant en tête des
                    présentes CVG. Toute réclamation reçue par la Société sera traitée dans un délai
                    raisonnable à compter de leur réception.
                </p>
                <p class="text-center">
                    En raison de la nature périssable des produits vendus, toute réclamation devra être effectuées par le Client dans un délai de 48h à compter de la livraison des produits concernés.
                </p>
                <h2 class="title-sf-2">Codes promotionnels</h2>
                <p class="text-center">
                    Les codes promotionnels et codes délivrés dans les cartes cadeaux sont à usage unique et personnel.
                </p>
                <p class="text-center">
                    Ils ne peuvent être utilisés que lors d’une première inscription.
                </p>
                <p class="text-center">
                    A l’exception des codes de parrainage, aucun code promotionnel ou code de réduction ne
                    peut faire l’objet d’un transfert, d’un partage, d’une copie, d’une reproduction ou d’une
                    publication. Tout usage, direct ou indirect, sous quelque forme et par quelque moyen que
                    ce soit, par une personne autre que le bénéficiaire d'origine du code promotionnel est
                    prohibé.
                </p>
                <p class="text-center">
                    Il est également interdit de diffuser un code promotionnel sur des sites ou forums Internet dits « de bonnes affaires » (dealabs, reddit etc.).
                </p>
                <p class="text-center">
                    Sainefood se réserve le droit à tout moment, et sans préavis, de désactiver ou de modifier
                    unilatéralement un code promotionnel faisant l'objet d’un ou plusieurs des usages prohibés
                    susmentionnés. Les commandes associées à l’usage frauduleux d’un code promotionnel
                    pourront également être annulées sans préavis et, le cas échéant, sans contrepartie.
                </p>
                <h2 class="title-sf-2">Propriété intellectuelle et industrielle</h2>
                <p class="text-center">
                    Le Client s’engage à respecter les droits de propriété intellectuelle et industrielle attachés
                    au Site Internet. Tous les éléments du site www.saine-food.fr sont et restent la propriété
                    intellectuelle et exclusive de Sainefood. Nul n’est autorisé à reproduire, exploiter, rediffuser,
                    ou utiliser à quelque titre que ce soit, même partiellement, des éléments du site qu’ils soient
                    logiciels, visuels ou sonores. Tout lien simple ou par hypertexte est strictement interdit sans
                    un accord écrit exprès de Sainefood.
                </p>
                <h2 class="title-sf-2">Compétence - Contestation</h2>
                <p class="text-center">
                    Les présentes CGV et plus généralement les contrats conclus via le Site Internet sont soumis au droit français.
                </p>
                <p class="text-center">
                    En cas de contestation relative aux présentes CVG et plus généralement aux contrats
                    conclus via le Site Internet, la Société s’efforcera de résoudre avec le Client, dans un délai
                    d’un mois, le différend à l’amiable. A défaut de solution amiable trouvée dans ce délai, les
                    tribunaux de Paris seront seuls compétents, quels qu’en soient le lieu de livraison, le mode
                    de règlement et même en cas d’appel en garantie ou de pluralité de défendeurs.
                </p>
                <p class="text-center">
                    Conformément à l’article L 616-1 du Code de la consommation, en cas de litige, le Client pourra saisir le médiateur à la consommation compétent.
                </p>
                <h2 class="title-sf-2">Informations nominatives</h2>
                <p class="text-center">
                    Le Site Internet www.saine-food.fr a fait l’objet d’une déclaration à la CNIL sous le numéro.1616835V0.
                </p>
                <p class="text-center">
                    Collecte et traitement des données à caractère personnel.
                </p>
                <p class="text-center">
                    Les données à caractère personnel du Client font l’objet d’un traitement automatisé aux fins de gestion et de suivi de la relation clients et prospects, de prospection et d’animation commerciale et de gestion de la relation contractuelle entre la Société et chaque Client.
                </p>
                <p class="text-center">
                    Les informations que nous recueillons proviennent de :
                    – l’enregistrement de l’adresse e-mail de chaque Client permettant de recevoir la newsletter.
                    Le Client peut à tout moment se désabonner de la newsletter en cliquant sur le lien intitulé
                    « se désinscrire » qui figure sur chacune des newsletters ;
                    – la saisie complète des coordonnées de chaque Client dans le formulaire de commande
                    (nom, prénom, adresse email, numéro de téléphone) de manière à pouvoir traiter sa
                    commande ;
                    – la correspondance qui est envoyée à la Société et à ses partenaires de manière à pouvoir
                    traiter les demandes issue de cette correspondance ;
                    – l’utilisation de l’ordinateur de chaque Client en mémorisant des informations transmises
                    automatiquement par celui-ci quand il utilise le Site (notamment : cookies et adresse IP). La
                    Société recueille des informations sur l’utilisation faite par chaque Client du Site afin
                    d’obtenir des statistiques, notamment, sur le nombre de visiteurs sur le Site et de
                    personnaliser et d’optimiser le contenu, la mise en page et les services proposés sur le Site.
                    Les données personnelles sont utilisées exclusivement dans le respect des finalités
                    précitées et approuvées par chaque Client. L’objectif principal de la collecte de données
                    personnelles est de d’offrir des services sûrs, efficaces et personnalisés.
                </p>
                <p class="text-center">
                    Les informations personnelles collectées sont destinées à la Société, responsable du
                    traitement, et peuvent être transmises à nos partenaires commerciaux si vous avez coché
                    la case autorisant cette transmission. Ainsi, la Société ne communique pas à des tiers vos
                    données personnelles sauf si vous avez expressément donné votre consentement ou s’il
                    existe pour la Société une obligation légale de le faire.
                </p>
                <p class="text-center">
                    La Société peut toutefois fournir les informations personnelles identifiables, les données
                    générées par les cookies et les informations agrégées aux fournisseurs et agences de
                    services que la Société peut engager afin de l’aider à fournir ses services à ses clients.
                </p>
                <p class="text-center">
                    Ces tiers seront tenus d’utiliser vos informations personnelles identifiables uniquement dans
                    le cadre des services qu’ils fournissent à la Société.
                </p>
                <p class="text-center">
                    Enfin, en cas de fusion ou de rachat du Site, les données personnelles pourront être
                    transmises à l’acheteur ou à la société absorbante après que les clients en auront été
                    informés par mail et par avertissement clair sur le Site.
                </p>
                <p class="text-center">
                    Les informations personnelles identifiables recueillies dans le cadre de l’utilisation du Site
                    peuvent être stockées en France ou dans tout pays assurant un niveau de protection
                    adéquat ou suffisant de la vie privée et des libertés et droits fondamentaux des personnes.
                    En utilisant le Site, chaque Client accepte expressément le transfert vers la France et
                    ailleurs des informations personnelles identifiables fournis à la Société.
                </p>
                <h2 class="title-sf-2">Droit des clients</h2>
                <p class="text-center">
                    Conformément à la loi n° 78-17 du 6 janvier 1978, chaque Client bénéficie d’un droit d’accès,
                    d’interrogation, de modification, de rectification et de suppression des données le
                    concernant ainsi que d’un droit d’opposition pour motif légitime.
                </p>
                <p class="text-center">
                    Chaque Client a la possibilité de recevoir, sur demande, des informations sur le traitement
                    des données qui le concerne en envoyant une demande à <a href="contact@saine-food.fr">contact@saine-food.fr</a>.
                </p>
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
                    <div class="d-flex flex-column col-md-3" style="padding-left:40px;">
                        <div class="p-2 title-groupe-footer">En savoir plus</div>
                        <div class="p-2 sous-title-footer"><a href="a%20propos.php">Concept</a></div>
                        <div class="p-2 sous-title-footer"><a href="#livraison">Zone de livraison</a></div>
                        <div class="p-2 sous-title-footer"><a href="not-exist.php">FAQ</a></div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2 title-groupe-footer">Nos valeurs</div>
                        <div class="p-2 sous-title-footer"><a href="a%20propos.php">Nos engagements</a></div>
                        <div class="p-2 sous-title-footer"><a href="actualites.php">Blog</a></div>
                        <div class="p-2 sous-title-footer"><a href="not-exist.php">Nos partenaires</a></div>
                    </div>
                    <div class="d-flex flex-column col-md-3">
                        <div class="p-2"><button type="button" onclick="location.href='contact.php'" class="btn btn-outline-primary btn-footer">Nous contacter</button></div>
                        <div class="p-2 title-groupe-footer">PARIS</div>
                        <div class="p-2 sous-title-footer">52,<br>avenue Daumesnil,<br> 75012</div>
                    </div>
                </div>
                <div class="d-flex p-2 sous-title-footer end-footer">© 2018 par Mintea<br>Tous droits réservés.&nbsp;<a href="mentions-legales.php" style="line-height: 4.5;color:#CFCBC2;">Mentions légales.</a>&nbsp;<a href="CGV-CGU.php" style="line-height: 4.5;color:#CFCBC2;">CGV - CGV.</a></div>
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