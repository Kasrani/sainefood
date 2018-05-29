<?php

include("../../authDB.php");
$article = $_GET['article'];
$query = "SELECT * FROM `article` WHERE titre='$article'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);

$titreUp = $_GET['titre'];
$detailsUp = $_GET['details'];
$image = $row['image'];
$imageUp = $_GET['imageArticle'];
if ($imageUp != ''){
    $image = $imageUp;
}

mysqli_query($maConnexion,"UPDATE `article` SET titre='$titreUp', details='$detailsUp', image='$imageUp' WHERE titre='$article'") or die(mysqli_error($maConnexion));
 header('Location: ../../account.php');

?>