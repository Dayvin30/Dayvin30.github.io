<?php
session_start();
require_once 'Model/connexionBDD.php';


require_once 'Vues/vRepondreMessage.php';

var_dump($_POST);
if(isset($_POST['reponse'])){
    $id_conseiller = $_SESSION['id_conseiller'];
    $id_utilisateur = $_GET['id_utilisateur'];
    $objet = "Re : ". $_GET['objet'];
    $contenu = $_POST['reponse'];
    repondre_message($id_utilisateur, $id_conseiller, $objet, $contenu);
}
else{
    echo "Erreur lors de l'envoie de la réponse";
}


?>
