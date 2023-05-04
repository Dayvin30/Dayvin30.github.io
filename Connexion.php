<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'Vues/vConnexion.php';

if (isset($_POST['email']) && isset($_POST['motdepasse'])) {
    // Récupérer les données saisies dans le formulaire
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Vérifier l'existence de l'utilisateur
    $pdo = connect();
    $stmt = $pdo->prepare('SELECT id, id_conseiller FROM utilisateurs WHERE email = :email AND motdepasse = :motdepasse');
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':motdepasse', $motdepasse);
    $stmt->execute();
    $utilisateur = $stmt->fetch();
    $pdo = null;

    if($utilisateur) {
        $_SESSION['id_utilisateur'] = $utilisateur['id'];
        $_SESSION['id_conseiller'] = $utilisateur['id_conseiller'];
        header('Location: index.php');
    } else {
        echo "Erreur de connexion";
    }
}
