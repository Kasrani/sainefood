<?php
include("authDB.php");
$article = $_GET['selectOptionArticle'];

if ($article <> "choisir un article") {
mysqli_query($maConnexion,"DELETE from article WHERE titre='$article'") or die(mysqli_error($maConnexion));
echo "Votre article vient d'être supprimer";
} else {
    echo "choisir un article parmi la liste pour supprimer";
}
?>