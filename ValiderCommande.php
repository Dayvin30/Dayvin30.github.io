<?php
session_start();
require_once 'Model/functionsPanier.php';

if (isset($_GET['id']) && isset($_GET['date']) && isset($_GET['prix']) && isset($_GET['statut']) && isset($_GET['idproduit'])){
    // Récupérer les données saisies dans le formulaire
    $id = $_GET['id'];
    $date = $_GET['date'];
    $prix = $_GET['prix'];
    $statut = $_GET['statut'];
    $idproduit = $_GET['idproduit'];

    creer_commande($id, $date, $prix, $statut, $idproduit);
    header('Location: Panier.php');

}
?>
