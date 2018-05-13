<?php

$maConnexion = mysqli_connect("us-cdbr-iron-east-04.cleardb.net","bc79c844c05827","11e8e8f1","heroku_a4f632ea2ba8ee3");
if (!$maConnexion){
    die("Database Connection Failed" . mysqli_error($maConnexion));
}

?>

