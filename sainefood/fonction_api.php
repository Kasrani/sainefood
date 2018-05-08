<?php
  function construit_url_paypal()
  {
	$api_paypal = 'https://api-3t.sandbox.paypal.com/nvp?'; // Site de l'API PayPal. On ajoute déjà le ? afin de concaténer directement les paramètres.
	$version = 56.0; // Version de l'API
	
	$user = 'Afl68vN8kFWHLxiJcpXUDPJ6iPiMcyoHt5Zl_cB7IC4tKhMCRglROaNeQ4dmxLVLeW7ehK3JkCVNRXHE'; // Utilisateur API
	$pass = 'EDamyiaMkmy-v8GmptD8CekayZ0Qbe0zl90uoIAu3-FCvKxfGzKqewAyh2mByw_v9aWwevRY7O2dfXFk'; // Mot de passe API
	$signature = 'ZWg4tSHZZ0GQIK8U6VKGWO1mxrtOAJzAGFNRnFpDWRKX-fv8q5Tuj64n'; // Signature de l'API

	$api_paypal = $api_paypal.'VERSION='.$version.'&USER='.$user.'&PWD='.$pass.'&SIGNATURE='.$signature; // Ajoute tous les paramètres

	return 	$api_paypal; // Renvoie la chaîne contenant tous nos paramètres.
  }
?>