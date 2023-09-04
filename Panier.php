<?php
require_once 'Model/functionsPanier.php';
require_once 'Model/connexionBDD.php';

// Fonction pour obtenir les informations d'un produit par son ID depuis la base de données


if (isset($_POST['id_produit']) && isset($_POST['quantite'])) {
    // Récupérer les données du formulaire
    $id_produit = $_POST['id_produit'];
    $quantite = $_POST['quantite'];

    // Appeler la fonction pour ajouter au panier
    ajouter_au_panier($id_produit, $quantite);
    var_dump($_SESSION['panier']);
    // Rediriger vers la page du panier ou une autre page
    header('Location: panier.php');

}
if(isset($_GET['action'])) {
    if($_GET['action'] == 'supprimer') {
        retirer_du_panier($_GET['id']);
    }
    elseif($_GET['action'] == 'vider') {
        vider_panier();
    }
}

function get_produit_by_id($id_produit) {
    // Connexion à la base de données
    $connexion = connect();

    // Requête SQL pour récupérer les informations du produit
    $requete = "SELECT * FROM produits WHERE id = :id";
    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':id', $id_produit, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérer le produit
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fermer la connexion à la base de données
    $connexion = null;

    return $produit;
}

// Appel de la vue du panier
include 'Vues/vPanier.php';
?>
