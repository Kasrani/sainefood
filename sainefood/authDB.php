<?php

$maConnexion = mysqli_connect("localhost","root","","sainefood");
if (!$maConnexion){
    die("Database Connection Failed" . mysqli_error($maConnexion));
}

?>

