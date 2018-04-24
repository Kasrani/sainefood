<?php
//$maConnexion = mysqli_connect("localhost","root","","sainefood");

$connection = mysqli_connect("localhost","root","","sainefood");
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

?>

