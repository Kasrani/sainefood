<?php
include("../../authDB.php");
$plat = $_GET['plat'];
$query = "SELECT * FROM `plat` WHERE nom='$plat'";
$result = mysqli_query($maConnexion, $query) or die(mysqli_error($maConnexion));
$row = mysqli_fetch_assoc($result);



    //On récupère les variables 
    
	$nomUp=$_GET['intitule'];
    $prixUp = $_GET['prix'];
    $detailsUp = $_GET['details'];
    $ingredientsUp = $_GET['ingredients'];
    $nutritionUp = $_GET['nutrition'];
    $image = $row['image'];
    $imageUp = $_GET['image'];
    if ($imageUp != ''){
    $image = $imageUp;
    }
    $sourcingUp = $_GET['sourcing'];

    $nutritionUp = implode(',' , $nutritionUp);
    var_dump($nutritionUp);
    $sourcingUp = implode(',' , $sourcingUp);
    var_dump($sourcingUp);

mysqli_query($maConnexion,"UPDATE plat SET nom='$nomUp', prix='$prixUp', details='$detailsUp', image='$image', nutrition='$nutritionUp', ingredients='$ingredientsUp', sourcing='$sourcingUp' WHERE nom='$plat'") or die(mysqli_error($maConnexion));
 header('Location: ../../account.php');

?>