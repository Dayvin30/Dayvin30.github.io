<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'vues/vAjouterCategorie.php';

if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    ajouter_categorie($nom);
    header('Location: index.php');
}
?>
