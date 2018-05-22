<?php

include("../../authDB.php");
$cours = $_GET['cours'];
$query = "SELECT * FROM `event` WHERE nom='$cours'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

$intituleUp = $_GET['intitule'];
$prixUp = $_GET['prix'];
$dateUp = $_GET['date'];
$heureUp = $_GET['heure'];
$nbParticipantsUp = $_GET['nbParticipants'];
$detailsUp = $_GET['details'];
$image = $row['image'];
$imageUp = $_GET['imageCours'];
if (($imageUp != '') or ($image = '')){
    $image = $imageUp;
}


mysqli_query($maConnexion,"UPDATE event SET nom='$intituleUp', prix='$prixUp', date='$dateUp', heure='$heureUp', disponibilite='$nbParticipantsUp', details='$detailsUp', image='$image' WHERE nom='$cours'") or die(mysqli_error($maConnexion));
 header('Location: ../../account.php');

?>