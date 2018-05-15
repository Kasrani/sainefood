<?php
include("authDB.php");
$cours = $_GET['selectOptionCours'];

if ($cours <> "choisir un cours") {
mysqli_query($maConnexion,"DELETE from event WHERE nom='$cours'") or die(mysqli_error($maConnexion));
echo "Votre cours vient d'être supprimer";
} else {
    echo "choisir un cours parmi la liste pour supprimer";
}
?>