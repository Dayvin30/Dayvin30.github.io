<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'Vues/vConnexion.php';

if (isset($_POST['email']) && isset($_POST['motdepasse'])) {
    if(verifier_existence_utilisateur($_POST['email'], $_POST['motdepasse'])){
        $_SESSION['email'] = $_POST['email'];
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
            $_SESSION['role'] = 'utilisateur';
            header('Location: index.php');
        }
        else{
            echo "Erreur lors de la connexion";
        }
    }else{
        if(verifier_existence_conseiller($_POST['email'], $_POST['motdepasse'])){
            $_SESSION['email'] = $_POST['email'];
            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];

            // Vérifier l'existence de l'utilisateur
            $pdo = connect();
            $stmt = $pdo->prepare('SELECT id FROM conseillers WHERE email = :email AND motdepasse = :motdepasse');
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':motdepasse', $motdepasse);
            $stmt->execute();
            $conseiller = $stmt->fetch();
            $pdo = null;

            if($conseiller) {
                $_SESSION['id_conseiller'] = $conseiller['id'];

                if( $_SESSION['email']=="admin@gmail.com" ){
                    $_SESSION['role'] = 'admin';
                }else{
                    $_SESSION['role'] = 'Employe';
                }
                header('Location: index.php');
            }
        }
    }
    // Récupérer les données saisies dans le formulaire
}