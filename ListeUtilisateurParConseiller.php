<?php
session_start();
require_once 'Model/connexionBDD.php';

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

// Récupérer l'identifiant du conseiller connecté
$pdo = connect();
$stmt = $pdo->prepare('SELECT id FROM conseillers WHERE email = :email');
$stmt->bindValue(':email', $_SESSION['email']);
$stmt->execute();
$conseiller = $stmt->fetch();
$pdo = null;

// Récupérer les utilisateurs associés au conseiller
$utilisateurs = lister_utilisateurs_par_conseiller($conseiller['id']);

// Afficher la vue des utilisateurs
include 'Vues/vListeUtilisateurParConseiller.php';
?>
