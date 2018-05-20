<?php

$intitule = null;
$prix = null;
$date = null;
$heure = null;
$nbParticipants = null;
$details = null;
$image = null;
    
$intitule = $_POST['intitule'];
$prix = $_POST['prix'];
$date = $_POST['date'];
$heure = $_POST['heure'];
$nbParticipants = $_POST['nbParticipants'];
$details = $_POST['details'];
$image = $_POST['imageCours'];

include("../../authDB.php");

mysqli_query($maConnexion,"INSERT INTO event (nom,prix,date,heure,disponibilite,details,image) VALUES ('$intitule','$prix','$date','$heure','$nbParticipants','$details','$image')") 
or die(mysqli_error($maConnexion));
header('Location: ../../account.php');

?>