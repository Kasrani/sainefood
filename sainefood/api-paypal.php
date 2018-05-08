<?php
include("fonction_api.php");
$requete = construit_url_paypal();
$requete = $requete."&METHOD=SetExpressCheckout".
			"&CANCELURL=".urlencode("http://127.0.0.1/cancel.php").
			"&RETURNURL=".urlencode("http://127.0.0.1/return.php").
			"&AMT=10.0".
			"&CURRENCYCODE=EUR".
			"&DESC=".urlencode("Magnifique oeuvre d'art (que mon fils de 3 ans a peint.)").
			"&LOCALECODE=FR".
			"&HDRIMG=".urlencode("http://www.siteduzero.com/Templates/images/designs/2/logo_sdz_fr.png");

// Initialise notre session cURL. On lui donne la requête à exécuter
$ch = curl_init($requete);

// Modifie l'option CURLOPT_SSL_VERIFYPEER afin d'ignorer la vérification du certificat SSL. Si cette option est à 1, une erreur affichera que la vérification du certificat SSL a échoué, et rien ne sera retourné. 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// On lance l'exécution de la requête URL.
if (curl_exec($ch)) // Si elle s'est exécutée correctement, on affiche "OK"
	{echo "<p>OK !</p>";}
else // S'il y a une erreur, on affiche "Erreur", suivi du détail de l'erreur.
	{echo "<p>Erreur</p><p>".curl_error($ch)."</p>";}

// On ferme notre session cURL.
curl_close($ch);

?>