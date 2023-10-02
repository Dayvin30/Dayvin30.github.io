<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'Vues/vConnexion.php';

if (isset($_POST['email']) && isset($_POST['motdepasse'])) {
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    $pdo = connect();

    if(verifier_existence_utilisateur($email)) {
        // Récupérer le hachage du mot de passe stocké dans la base de données pour cet email
        $stmt = $pdo->prepare('SELECT id, id_conseiller, motdepasse FROM utilisateurs WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $utilisateur = $stmt->fetch();

        if ($utilisateur && password_verify($motdepasse, $utilisateur['motdepasse'])) {
            $_SESSION['id_utilisateur'] = $utilisateur['id'];
            $_SESSION['id_conseiller'] = $utilisateur['id_conseiller'];
            $_SESSION['role'] = 'utilisateur';
            $_SESSION['email'] = $email;
            header('Location: index.php');
        } else {
            echo "Erreur lors de la connexion";
        }
    }
    elseif(verifier_existence_conseiller($email)) {
        // Récupérer le hachage du mot de passe stocké dans la base de données pour cet email
        $stmt = $pdo->prepare('SELECT id, motdepasse FROM conseillers WHERE email = :email');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $conseiller = $stmt->fetch();

        if ($conseiller && password_verify($motdepasse, $conseiller['motdepasse'])) {
            $_SESSION['id_conseiller'] = $conseiller['id'];
            $_SESSION['email'] = $email;

            if ($email == "admin@gmail.com") {
                $_SESSION['role'] = 'admin';
            } else {
                $_SESSION['role'] = 'Employe';
            }

            header('Location: index.php');
        } else {
            echo "Erreur lors de la connexion";
        }
    } else {
        echo "Email non reconnu";
    }

    $pdo = null;
}
