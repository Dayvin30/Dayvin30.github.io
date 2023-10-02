<?php

function connexionBDD() 
{
  $PARAM_hote='localhost'; // le chemin vers le serveur
  $PARAM_port='3306';
  $PARAM_nom_bd='nbvpqgck_patisstefy'; // le nom de votre base de données
  $PARAM_utilisateur='nbvpqgck_ADMIN'; // nom d'utilisateur pour se connecter
  $PARAM_mot_passe='lm494m494Nlhr'; // mot de passe de l'utilisateur pour se connecter
  $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
  //mysql://bc512329ebcf08:0878f9e2@eu-cdbr-west-03.cleardb.net/heroku_a830c7ae8f4467a?reconnect=true
    
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}

function CreerGateau($Intitule, $Repertoire, $Description, $Prix, $Categorie)
{

  $connexion=connexionBDD();



 
      $requete='insert into gateau (intitule, repertoire, description, prix, categorie) VALUES (:Intitule, :Repertoire, :Description, :Prix, :Categorie);';
    echo($requete);

      $reponse=$connexion->prepare($requete);
      $reponse->execute(array(
      'Intitule' => $Intitule,
      'Repertoire' => $Repertoire,
      'Description' => $Description,
      'Prix' => $Prix,
      'Categorie' => $Categorie));
   
      
    


   

}

function ModifierGateau($Intitule , $Description, $Prix, $Categorie, $id) {
  $connexion=connexionBDD();
  $requete = "update gateau set intitule = :Intitule, description = :Description, prix = :Prix, categorie = :Categorie where  id = :id";
  $reponse = $connexion->prepare($requete);

  $reponse->execute(array(
    'Intitule' => $Intitule,
    'Description' => $Description,
    'Prix' => $Prix,
    'Categorie' => $Categorie,
    'id' => $id));

}


function ListerGateaux()
{
  $connexion = connexionBDD();
      
   $requete="Select id, intitule, repertoire, description, prix, categorie from gateau ";

      
  $ListeIntervetion=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeIntervetion[$i]['id']=$ligne->id;
          $ListeIntervetion[$i]['intitule']=$ligne->intitule;
          $ListeIntervetion[$i]['repertoire']=$ligne->repertoire;
          $ListeIntervetion[$i]['description']=$ligne->description;
          $ListeIntervetion[$i]['prix']=$ligne->prix;
          $ListeIntervetion[$i]['categorie']=$ligne->categorie;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}


function SupprimerGateau($id)
{

  $connexion=connexionBDD();



$requete='delete from gateau where id = :id;'; 


$reponse=$connexion->prepare($requete);
$reponse->execute(array('id' => $id));


}


    function ListerGateauxByCategorie($Categorie)
{
  $connexion = connexionBDD();
      
   $requete="Select id, intitule, repertoire, description, prix, categorie from gateau where categorie ='".$Categorie."'";

      
  $ListeIntervetion=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeIntervetion[$i]['id']=$ligne->id;
          $ListeIntervetion[$i]['intitule']=$ligne->intitule;
          $ListeIntervetion[$i]['repertoire']=$ligne->repertoire;
          $ListeIntervetion[$i]['description']=$ligne->description;
          $ListeIntervetion[$i]['prix']=$ligne->prix;
          $ListeIntervetion[$i]['categorie']=$ligne->categorie;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}

function getGateauById($id)
{
  $connexion = connexionBDD();
      
   $requete="Select id, intitule, repertoire, description, prix, categorie from gateau where id =".$id;

      
  $ListeIntervetion=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeIntervetion[$i]['id']=$ligne->id;
          $ListeIntervetion[$i]['intitule']=$ligne->intitule;
          $ListeIntervetion[$i]['repertoire']=$ligne->repertoire;
          $ListeIntervetion[$i]['description']=$ligne->description;
          $ListeIntervetion[$i]['prix']=$ligne->prix;
          $ListeIntervetion[$i]['categorie']=$ligne->categorie;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}


function countGateaux()
{
    $connexion = connexionBDD();

    $requete="SELECT COUNT(*) as count FROM gateau;";


   $count=null;

    $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet
    $i = 0;
    $ligne = $reponse->fetch();


            $count=$ligne->count;



    $reponse->closeCursor();   // fermer le jeu de résultat
    // deconnecterServeurBD($idConnexion);
    return $count;
}
function connexion($Email)
{
  $connexion = connexionBDD();
      
  $requete="select pass from admin where email = :Email"; // ajouter where DATE(DateIntervention) >= DATE(NOW())
      
  $mdp="null";
  $reponse=$connexion->prepare($requete);
  $reponse->execute(array(
  'Email' => $Email));

  


  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse->rowCount()==0){

    echo('Identifiants incorrects');
       
          

      }else{
        $mdp=$ligne->pass;
      }

      
return($mdp);
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
    }
    
    ?>

