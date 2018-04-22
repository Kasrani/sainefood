<?php
$maConnexion = mysqli_connect("localhost","root","","sainefood");
if(!isset($_POST['email']) && !isset($_POST['password']))
{
    header('Location: index.php');
    Exit;
}
else
{
    echo 'nooooo';
}
?>

