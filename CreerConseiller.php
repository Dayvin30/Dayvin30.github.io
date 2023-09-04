<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'Vues/vCreerConseiller.php';

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['motdepasse'])) {
    // Récupérer les données saisies dans le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Appeler la fonction pour créer un conseiller
    creer_conseiller($nom, $prenom, $email, $motdepasse);

    // Rediriger vers la page d'accueil
    header('Location: index.php');
}

?>
