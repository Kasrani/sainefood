<?php
include("../../authDB.php");
session_start();

$emailUp = null;
$prenomUp = null;
$nomUp = null;
$passwordUp = null;

    //On récupère les variables 
    
	$emailUp=$_POST['emailUp'];
    $prenomUp = $_POST['prenomUp'];
    $nomUp = $_POST['nomUp'];
    $passwordUp = $_POST['passwordUp'];
    $user = $_SESSION['user'];
    $email = $_SESSION['email'];
if (isset($_SESSION['user'])) {
    mysqli_query($maConnexion,"UPDATE user SET email='$emailUp', prenom='$prenomUp', nom='$nomUp', password='$passwordUp' WHERE prenom='$user' AND email='$email' ") or die(mysqli_error($maConnexion));
    echo "Modification effectuer";
    session_reset();  // old session value restored
    $rec = "SELECT prenom FROM `user` WHERE email='$emailUp' AND prenom='$prenomUp' AND nom='$nomUp' AND password='$passwordUp'";
    $result = mysqli_query($maConnexion, $rec) or die(mysqli_error($maConnexion));
    $row = mysqli_fetch_assoc($result);
    $user = $row['prenom'];
    $_SESSION['user'] = $user;
    echo $_SESSION['user'];
    header('Location: ../../account.php');
    /*
    $rec = "SELECT prenom FROM `user`";
    $result = mysqli_query($maConnexion, $rec) or die(mysqli_error($maConnexion));
    $row = mysqli_fetch_assoc($result);
    $user = $row['prenom'];
    $_SESSION['user'] = $user;
    */
} else {
    echo "Update echoué";
}

?>