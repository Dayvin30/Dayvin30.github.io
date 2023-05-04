<?php
// Connexion à la base de données MySQL avec PDO

function connect() {
    $servername = "localhost";
    $dbname = "ventalis";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connexion échouée : " . $e->getMessage());

    }

}

function verifier_existence_utilisateur($email, $motdepasse) {
    // Se connecter à la base de données
    $pdo = connect();

    // Préparer la requête SQL
    $requete = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email and motdepasse = :motdepasse";
    $stmt = $pdo->prepare($requete);

    // Binder les paramètres de la requête
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':motdepasse', $motdepasse);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer le résultat de la requête
    $resultat = $stmt->fetchColumn();
    if($resultat > 0){
    return true;
    }else{
    return false;
    }

    // Fermer la connexion à la base de données

}

function ajouter_utilisateur($email, $motdepasse, $nom_societe, $prenom, $nom) {
    // Se connecter à la base de données
    $pdo = connect();

    // Vérifier si l'utilisateur existe déjà
    if (verifier_existence_utilisateur($email, $motdepasse)) {
        return false;
    }

    // Récupérer l'ID du conseiller qui a le moins de clients
    $requete_conseiller = "SELECT id_conseiller, COUNT(*) AS nombre_clients
                           FROM utilisateurs
                           GROUP BY id_conseiller
                           ORDER BY nombre_clients ASC 
                           LIMIT 1";
    $stmt_conseiller = $pdo->prepare($requete_conseiller);
    $stmt_conseiller->execute();
    $id_conseiller = $stmt_conseiller->fetchColumn();

    // Préparer la requête SQL pour insérer l'utilisateur dans la base de données
    $requete = "INSERT INTO utilisateurs (email, motdepasse, nomsociete, prenom, nom, id_conseiller)
                VALUES (:email, :motdepasse, :nom_societe, :prenom, :nom, :id_conseiller)";
    $stmt = $pdo->prepare($requete);

    // Binder les paramètres de la requête
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':motdepasse', $motdepasse);
    $stmt->bindValue(':nom_societe', $nom_societe);
    $stmt->bindValue(':prenom', $prenom);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':id_conseiller', $id_conseiller);

    // Exécuter la requête
    $stmt->execute();

    // Fermer la connexion à la base de données
    $pdo = null;

    return true;
}

function creer_conseiller($nom, $prenom, $email, $motdepasse) {
    // Se connecter à la base de données
    $pdo = connect();

    // Préparer la requête SQL
    $requete = "INSERT INTO conseillers (matricule, email, motdepasse, nom, prenom) VALUES (:matricule, :email, :motdepasse, :nom, :prenom)";

    $stmt = $pdo->prepare($requete);
    $matricule = generer_matricule();

    // Binder les paramètres de la requête
    $stmt->bindValue(':matricule', $matricule);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':motdepasse', $motdepasse);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':prenom', $prenom);

    // Exécuter la requête
    $stmt->execute();

    // Fermer la connexion à la base de données
    $pdo = null;
}



// Fonction pour créer un produit
function creer_produit($libelle, $image, $description, $prix, $categorie) {
    // Se connecter à la base de données
    $pdo = connect();

    // Préparer la requête SQL
    $requete = "INSERT INTO produits (libelle, image, description, prix, id_categorie) VALUES (:libelle, :image, :description, :prix, :categorie)";
    $stmt = $pdo->prepare($requete);

    // Binder les paramètres de la requête
    $stmt->bindValue(':libelle', $libelle);
    $stmt->bindValue(':image', $image);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':prix', $prix);
    $stmt->bindValue(':categorie', $categorie);

    // Exécuter la requête
    $stmt->execute();

    // Fermer la connexion à la base de données
    $pdo = null;
}

function ajouter_categorie($nom) {
    // Se connecter à la base de données
    $pdo = connect();

    // Préparer la requête SQL
    $requete = "INSERT INTO categories (nom) VALUES (:nom)";
    $stmt = $pdo->prepare($requete);

    // Binder les paramètres de la requête
    $stmt->bindValue(':nom', $nom);

    // Exécuter la requête
    $stmt->execute();

    // Fermer la connexion à la base de données
    $pdo = null;
}

function lister_utilisateurs_par_conseiller($id_conseiller) {
    // Se connecter à la base de données
    $pdo = connect();

    // Préparer la requête SQL avec une jointure entre les tables utilisateurs et conseillers
    $requete = "SELECT utilisateurs.id, utilisateurs.nom, utilisateurs.prenom, utilisateurs.email
                FROM utilisateurs
                INNER JOIN conseillers
                ON utilisateurs.id_conseiller = conseillers.id
                WHERE conseillers.id = :id_conseiller";
    $stmt = $pdo->prepare($requete);

    // Binder les paramètres de la requête
    $stmt->bindValue(':id_conseiller', $id_conseiller);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats de la requête
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fermer la connexion à la base de données
    $pdo = null;

    // Retourner les résultats
    return $resultats;
}


function lister_commandes_utilisateur($id_utilisateur) {
    // Se connecter à la base de données
    $pdo = connect();

    // Préparer la requête SQL
    $requete = "SELECT c.id, c.date_commande, c.prix, c.statut, p.libelle 
FROM commandes c 
JOIN produits p ON c.id_produit = p.id 
WHERE c.id_utilisateur = :id_utilisateur";
    $stmt = $pdo->prepare($requete);

    // Binder les paramètres de la requête
    $stmt->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats de la requête
    $commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fermer la connexion à la base de données
    $pdo = null;

    // Retourner les résultats de la requête
    return $commandes;
}

function contacter_conseiller($id_utilisateur, $objet, $message) {
    // Se connecter à la base de données
    $pdo = connect();

    // Récupérer l'id du conseiller correspondant à l'utilisateur
    $requete = "SELECT id_conseiller FROM utilisateurs WHERE id = :id_utilisateur";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_conseiller = $resultat['id_conseiller'];
    echo $id_conseiller;

    // Insérer un nouveau message dans la table messages
    $requete = "INSERT INTO message (id_utilisateur, id_conseiller, objet, contenu) VALUES (:id_utilisateur, :id_conseiller, :objet, :contenu)";
    $stmt = $pdo->prepare($requete);
    $stmt->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $stmt->bindValue(':id_conseiller', $id_conseiller, PDO::PARAM_INT);
    $stmt->bindValue(':objet', $objet);
    $stmt->bindValue(':contenu', $message);
    $stmt->execute();

    // Fermer la connexion à la base de données
    $pdo = null;
}
















function generer_matricule() {
    $longueur = 8; // Longueur du matricule
    $chiffres = '0123456789'; // Chiffres possibles
    $lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Lettres possibles
    $matricule = '';

    // Ajouter des caractères aléatoires au matricule jusqu'à atteindre la longueur désirée
    for ($i = 0; $i < $longueur; $i++) {
        // Choisir aléatoirement un chiffre ou une lettre
        $type = rand(0, 1);
        if ($type == 0) {
            $caractere = $chiffres[rand(0, strlen($chiffres) - 1)];
        } else {
            $caractere = $lettres[rand(0, strlen($lettres) - 1)];
        }
        // Ajouter le caractère au matricule
        $matricule .= $caractere;
    }

    return $matricule;
}



?>
