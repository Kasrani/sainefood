<?php

//create.php

$email = null;
$prenom = null;
$nom = null;
$password = null;

    //On récupère les variables 
    
	$email=$_POST['email'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];



$maConnexion = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","bc79c844c05827","11e8e8f1","heroku_a4f632ea2ba8ee3");

mysqli_query($maConnexion,"INSERT INTO user (email,prenom,nom,password) VALUES ('$email','$prenom','$nom','$password')") 
or die(mysqli_error($maConnexion));
header('Location: index.php');
?>