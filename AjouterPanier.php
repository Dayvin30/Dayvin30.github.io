<?php

session_start();
require_once 'Model/connexionBDD.php';

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

