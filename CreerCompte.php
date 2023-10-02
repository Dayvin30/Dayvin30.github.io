<?php
session_start();

require_once 'Model/connexionBDD.php';
require_once 'Vues/vCreerCompte.php';

if (isset($_POST['login'], $_POST['mot_de_passe'], $_POST['nom_societe'], $_POST['prenom'], $_POST['nom'])) {
    // Récupérer les données saisies dans le formulaire
    $login = $_POST['login'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $nom_societe = $_POST['nom_societe'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];

    // Hacher le mot de passe
    $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Si les données sont valides, ajouter l'utilisateur à la base de données
    ajouter_utilisateur($login, $hashed_password, $nom_societe, $prenom, $nom);
    header('Location: index.php');
}


