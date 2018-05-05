<?php
$plat = $_GET['selectOption'];

if ($plat <> "choisir un plat") {
mysqli_query($maConnexion,"DELETE from plat WHERE nom='$plat'") or die(mysqli_error($maConnexion));
echo "Votre plat vient d'être supprimer";
} else {
    echo "choisir un plat parmi la liste pour supprimer";
}
?>