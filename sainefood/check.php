<?php  //Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
$result = pg_query($connection, $query) or die(mysqli_error($connection));
$row = pg_fetch_assoc($result);
$user = $row['prenom'];
$pass = $row['password'];
$name = $row['nom'];
$count = pg_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['email'] = $email;
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pass;
$_SESSION['name'] = $name;
    
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['user'])){
$email = $_SESSION['email'];
echo "Hi " . $user . "";
echo "This is the Members Area";
echo "<a href='logout.php'>Logout</a>";
    //header('Location: index.php');
    header('Location: account.php');
 
}else{
    echo "grrr";
}
//3.2 When the user visits the page first time, simple login form will be displayed.
?>