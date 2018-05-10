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



include("authDB.php");

mysqli_query($maConnexion,"INSERT INTO user (email,prenom,nom,password) VALUES ('$email','$prenom','$nom','$password')") 
or die(mysqli_error($maConnexion));
header('Location: index.php');
?>