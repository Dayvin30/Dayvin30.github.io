<?php
session_start();
require_once 'Model/connexionBDD.php';
var_dump($_SESSION['panier']);
// Vérifier si le panier existe dans la session
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Récupérer les informations des produits dans le panier
$produits_panier = array();
foreach ($_SESSION['panier'] as $id_produit => $quantite) {
    $produit = get_produit_by_id($id_produit);
    $produit['quantite'] = $quantite;
    $produits_panier[] = $produit;
}

// Fonction pour supprimer un article du panier
if (isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];
    retirer_article_panier($id_produit);
    header('Location: panier.php');
    exit();
}

// Fonction pour vider le panier
if (isset($_GET['vider_panier'])) {
    vider_panier();
    header('Location: panier.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Panier - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Panier</h2>

    <?php if (count($produits_panier) > 0) : ?>
        <table class="table">
            <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($produits_panier as $produit) : ?>
                <tr>
                    <td><?php echo $produit['libelle']; ?></td>
                    <td><?php echo $produit['quantite']; ?></td>
                    <td><?php echo $produit['prix'] * 1000; ?> €</td>
                    <td><?php echo $produit['prix'] * 1000 * $produit['quantite']; ?> €</td>
                    <td>
                        <a href="panier.php?id_produit=<?php echo $produit['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <p>Total du panier : <?php echo calculer_total_panier(); ?> €</p>
            <p>Nombre total d'articles : <?php echo calculer_total_articles_panier(); ?></p>
            <a href="panier.php?vider_panier" class="btn btn-danger">Vider le panier</a>
        </div>
    <?php else : ?>
    <p>Votre panier est vide. Ajoutez des produits en explorant notre catalogue.</p>
    <?php
    endif; ?>
</div>
</body>
</html>
