<?php

$titre = null;
$details = null;
$image = null;

    
$titre = $_POST['titre'];
$details = $_POST['details'];
$image = $_POST['imageArticle'];

include("../../authDB.php");

mysqli_query($maConnexion,"INSERT INTO article (titre,details,image) VALUES ('$titre','$details','$image')") 
or die(mysqli_error($maConnexion));
header('Location: ../../account.php');

?>