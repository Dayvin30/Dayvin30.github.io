<?php
session_start();

// Fonction pour ajouter un produit au panier
function ajouter_au_panier($id_produit, $quantite = 1) {
    // Vérifier si le panier existe dans la session
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    // Vérifier si le produit est déjà dans le panier
    if (isset($_SESSION['panier'][$id_produit])) {
        // Ajouter la quantité à celle existante
        $_SESSION['panier'][$id_produit] += $quantite;
    } else {
        // Ajouter le produit avec la quantité spécifiée
        $_SESSION['panier'][$id_produit] = $quantite;
    }
}

// Fonction pour retirer un produit du panier
function retirer_du_panier($id_produit) {
    // Vérifier si le panier existe dans la session
    if (isset($_SESSION['panier'])) {
        // Vérifier si le produit est dans le panier
        if (isset($_SESSION['panier'][$id_produit])) {
            // Supprimer le produit du panier
            unset($_SESSION['panier'][$id_produit]);
        }
    }
}

// Fonction pour vider le panier
function vider_panier() {
    // Vérifier si le panier existe dans la session
    if (isset($_SESSION['panier'])) {
        // Vider le panier en supprimant tous les produits
        $_SESSION['panier'] = array();
    }
}

// Fonction pour obtenir le contenu du panier
function obtenir_contenu_panier() {
    // Vérifier si le panier existe dans la session
    if (isset($_SESSION['panier'])) {
        return $_SESSION['panier'];
    } else {
        return array();
    }
}

// Fonction pour calculer le total du panier
function calculer_total_panier() {
    $total = 0;

    // Obtenir le contenu du panier
    $panier = obtenir_contenu_panier();

    // Parcourir les produits du panier
    foreach ($panier as $id_produit => $quantite) {
        // Récupérer les informations du produit depuis la base de données
        $produit = get_produit_by_id($id_produit);

        // Calculer le prix total du produit en fonction de la quantité
        $prix_total = $produit['prix'] * $quantite;

        // Ajouter le prix total au total du panier
        $total += $prix_total;
    }

    return $total;
}
?>
