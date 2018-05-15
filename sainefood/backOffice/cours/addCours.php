<?php

//create.php

$intitule = null;
$date = null;
$nbParticipants = null;
$details = null;
$image = null;

    //On récupère les variables 
    
	$intitule=$_POST['intitule'];
    $date = $_POST['date'];
    $nbParticipants = $_POST['nbParticipants'];
    $details = $_POST['details'];
    $image = $_POST['imageCours'];



include("../../authDB.php");

mysqli_query($maConnexion,"INSERT INTO event (nom,date,disponibilite,details,image) VALUES ('$intitule','$date','$nbParticipants','$details','$image')") 
or die(mysqli_error($maConnexion));
header('Location: ../../account.php');

?>