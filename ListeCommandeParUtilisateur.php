<?php

session_start();
require_once 'Model/connexionBDD.php';


// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit();
}

// Récupérer la liste des commandes de l'utilisateur connecté
$commandes = lister_commandes_utilisateur($_SESSION['id_utilisateur']);
include 'Vues/vListeCommandeParUtilisateur.php';
// Afficher la liste des commandes avec la vue vListeCommandesUtilisateur
