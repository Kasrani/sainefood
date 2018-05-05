<?php

//create.php

$intitule = null;
$prix = null;
$details = null;
$ingredients = null;
$nutrition = null;
$sourcing = null;
$image = null;

    //On récupère les variables 
    
	$intitule=$_POST['intitule'];
    $prix = $_POST['prix'];
    $details = $_POST['details'];
    $ingredients = $_POST['ingredients'];
    $nutrition = $_POST['nutrition'];
    $image = $_POST['image'];
/*
if(isset($_FILES['image'])){
    echo $_FILES['image']['name'];
}*/
    //$image = basename($_FILES['image']['name']);
    //$image = $_FILES['image'];
    $nutrition = implode(',' , $nutrition);
    var_dump($nutrition);
    $sourcing = $_POST['sourcing'];
    $sourcing = implode(',' , $sourcing);
    var_dump($sourcing);
    echo $image;


$maConnexion = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","bc79c844c05827","11e8e8f1","heroku_a4f632ea2ba8ee3");

mysqli_query($maConnexion,"INSERT INTO plat (nom,prix,details,image,ingredients,nutrition,sourcing) VALUES ('$intitule','$prix','$details','$image','$ingredients','$nutrition','$sourcing')") 
or die(mysqli_error($maConnexion));

header('Location: account.php');
//$rec = "SELECT nutrition FROM `plat`";
//$nutrition = rec['nutrition'];
//$choix = "A louer,A vendre" ou "A louer" ou "A vendre"
 
//$nutrition = explode(',' , $nutrition);

// $choix = array("A louer", "A vendre")
?>