<?php
session_start();
require_once 'Model/connexionBDD.php';

// Vérifier si l'ID du produit est passé dans l'URL
if (isset($_GET['id'])) {
    $produitId = $_GET['id'];

    // Appeler la fonction pour trouver le produit par son ID
    $produit = trouver_produit_par_id($produitId);
    require_once 'Vues/vDetailProduit.php';
    // Vérifier si le produit a été trouvé
    if ($produit) {
        // Inclure la vue pour afficher les détails

    } else {
        // Si le produit n'a pas été trouvé, afficher un message d'erreur
        echo "Le produit demandé n'existe pas.";
    }
} else {
// Si l'ID du produit n'est pas passé dans l'URL, afficher un message d'erreur
    echo "Aucun produit spécifié.";
}