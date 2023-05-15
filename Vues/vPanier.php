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
<?php
session_start();
include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Panier</h2>

    <?php if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) : ?>
        <table class="table">
            <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['panier'] as $id_produit => $quantite) : ?>
                <?php $produit = get_produit_by_id($id_produit); ?>
                <tr>
                    <td><?php echo $produit['libelle']; ?></td>
                    <td><?php echo $quantite; ?></td>
                    <td><?php echo $produit['prix']; ?></td>
                    <td><?php echo $produit['prix'] * $quantite; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <p>Total du panier : <?php echo calculer_total_panier(); ?></p>
        </div>

        <div class="text-center">
            <a href="ValiderPanier.php" class="btn btn-primary">Valider le panier</a>
        </div>
    <?php else : ?>
        <p>Votre panier est vide.</p>
    <?php endif; ?>
</div>
</body>
</html>
