<?php
//create.php
$email = null;
$prenom = null;
$nom = null;
$password = null;
//On récupère les variables  
$email=$_POST['email'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$password = $_POST['password'];
include("authDB.php");
mysqli_query($maConnexion,"INSERT INTO user (email,prenom,nom,password) VALUES ('$email','$prenom','$nom','$password')") 
or die(mysqli_error($maConnexion));
//On envoie un mail de cofirmation
date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "kasrani.mourad@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "aqwzsxedc123";
//Set who the message is to be sent from
$mail->setFrom('kasrani.mourad@gmail.com', "L'equipe sainefood");
//Set an alternative reply-to address
$mail->addReplyTo('kasrani.mourad@gmail.com', "L'equipe sainefood");
//Set who the message is to be sent to
$mail->addAddress($email, $prenom);
//Set the subject line
$mail->Subject = 'Confirmation de creation de votre compte';
$mail->Body = "<body style='width:612px; margin:auto; text-align:center;'>
<center>
<img src='https://sainefood.herokuapp.com/images/mail-en-tete.png' alt='Sainefood'>
<br><br><br>
<h1 style='color:#ff594f; font-size:22px;'>Confirmation demande d'ouverture de compte</h1>
<br><br><br>
<h3 style='color:#484848;text-align:left;'>Cher(e)" .$prenom. "</h3><br>
<p style='color:#484848;font-size:14px;text-align:left;line-height:20px;'>Votre demande d'ouverture de compte est terminée.</p>
<p style='color:#484848;font-size:14px;text-align:left;line-height:20px;'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et hendrerit metus, sit amet efficitur ante. Sed euismod dictum nisl, eget congue libero dictum eu. Nunc eget tincidunt tellus, sed porta ante. Fusce feugiat urna maximus sapien varius congue. Pellentesque elementum lorem non sem feugiat, eu gravida erat gravida. Proin lacinia purus ut suscipit imperdiet. Nullam pharetra elementum volutpat.</p>
<p style='color:#484848;font-size:14px;text-align:left;line-height:20px;'>A bientôt sur votre Espace Client,</p>
<h3 style='color:#484848;text-align:left;'>L'équipe Sainefood</h3>
<a style='color:#FF594F;font-size:18px;text-align:left;text-decoration:none;' href='saine-food.fr'>saine-food.fr</a>
</center>
</body>
";
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
    header('Location: confirmation-ouverture-compte.php');
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}
?>