<?php
session_start();
require_once 'Model/connexionBDD.php';
require_once 'Vues/vContacterConseiller.php';

if (isset($_POST['message'])) {
    $id_conseiller = $_SESSION['id_conseiller'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $contenu = $_POST['message'];
    contacter_conseiller($id_utilisateur, $id_conseiller, $contenu);
}
?>
