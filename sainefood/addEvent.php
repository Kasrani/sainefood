<?php

//create.php

$intitule = null;
$date = null;
$nbParticipants = null;
$details = null;

    //On récupère les variables 
    
	$intitule=$_POST['intitule'];
    $date = $_POST['date'];
    $nbParticipants = $_POST['nbParticipants'];
    $details = $_POST['details'];



$maConnexion = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","bc79c844c05827","11e8e8f1","heroku_a4f632ea2ba8ee3");

mysqli_query($maConnexion,"INSERT INTO event (nom,date,disponibilite,details) VALUES ('$intitule','$date','$nbParticipants','$details')") 
or die(mysqli_error($maConnexion));
header('Location: account.php');

?>