<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'Vues/vCreerProduit.php';

if (isset($_POST['libelle']) && isset($_POST['image']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['categorie'])){
    // Récupérer les données saisies dans le formulaire
    $libelle = $_POST['libelle'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $categorie_id = $_POST['categorie'];

        creer_produit($libelle, $image, $description, $prix, $categorie_id);
        header('Location: index.php');

}
?>
