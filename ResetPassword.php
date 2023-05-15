<?php
session_start();

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "
");
$smtpServer = 'smtp.example.com';
$smtpPort = 587;

// Create a new instance of PHPMailer or another email library you are using
$mail = new PHPMailer();

// Enable SMTP debugging if needed
$mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to DEBUG_SERVER for more detailed debugging

// Set the SMTP server and port
$mail->isSMTP();
$mail->Host = $smtpServer;
$mail->Port = $smtpPort;

// Enable STARTTLS encryption
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
// Rest of your code


require_once 'Vues/vResetPassword.php';
$to = "dayvin30@gmail.com";
$subject = "Demande de réinitialisation de votre mot de passe";
$message="Votre nouveau mot de passe : 55555";
$headers = "From: "."zahoutdayvin@gmail.com". "\r\n" .
    "X-Mailer: PHP/" . phpversion();
if (mail($to, $subject, $message, $headers)) {
    $_SESSION['message'] = "La demande de réinitialisation a été prise en compte. Vérifiez votre boîte mail.";
    header('Location: connexion.php');

} else {
    $_SESSION['commande'] = "Une erreur s'est produite. Veuillez réessayer.";
    header('Location: connexion.php');


}
