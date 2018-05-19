<?php

$intitule = null;
$date = null;
$heure = null;
$nbParticipants = null;
$details = null;
$image = null;
    
$intitule=$_POST['intitule'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$nbParticipants = $_POST['nbParticipants'];
$details = $_POST['details'];
$image = $_POST['imageCours'];

include("../../authDB.php");

mysqli_query($maConnexion,"INSERT INTO event (nom,date,heure,disponibilite,details,image) VALUES ('$intitule','$date','$heure','$nbParticipants','$details','$image')") 
or die(mysqli_error($maConnexion));
header('Location: ../../account.php');

?>