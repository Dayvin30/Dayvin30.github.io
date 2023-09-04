<?php
session_start();
require_once 'Model/connexionBDD.php';

// ID du conseiller
$id_conseiller = 1;

// Appel de la fonction pour lister les messages du conseiller
$messages = lister_messages_conseiller($_SESSION['id_conseiller']);

// Inclure la vue pour afficher les messages
include 'Vues/vMessageConseiller.php';
?>
<?php
