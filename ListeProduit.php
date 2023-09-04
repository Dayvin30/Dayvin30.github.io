<?php
session_start();
require_once 'Model/connexionBDD.php';

// Appeler la fonction du modèle pour récupérer les produits
$produits = getProduits();

// Inclure la vue pour afficher la liste des produits
include 'Vues/vListeProduit.php';
?>
