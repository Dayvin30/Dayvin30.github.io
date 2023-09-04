<?php
$to      = 'dayvin30@gmail.com';
$subject = 'le sujet';
$message = 'Bonjour !';
$headers = 'From: zahoutdayvin@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
