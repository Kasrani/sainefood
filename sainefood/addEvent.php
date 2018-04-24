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



$maConnexion = mysqli_connect("localhost","root","","sainefood");

mysqli_query($maConnexion,"INSERT INTO event (nom,date,disponibilite,details) VALUES ('$intitule','$date','$nbParticipants','$details')") 
or die(mysqli_error($maConnexion));
header('Location: account.php');

?>