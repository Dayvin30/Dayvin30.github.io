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
<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Panier</h2>
    <?php
    $produits_panier = obtenir_contenu_panier();

    if (count($produits_panier) > 0) :
        ?>
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
            <?php
            foreach ($produits_panier as $id_produit => $quantite) :
                $produit = get_produit_by_id($id_produit);
                ?>
                <tr>
                    <td><?php echo $produit['libelle']; ?></td>
                    <td><?php echo $quantite; ?></td>
                    <td><?php echo $produit['prix']; ?></td>
                    <td><?php echo $produit['prix'] * $quantite; ?></td>
                    <td>
                        <a href="panier.php?action=supprimer&id=<?php echo $id_produit; ?>"
                           class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-right">
            <p>Total du panier : <?php echo calculer_total_panier(); ?> €</p>
            <p>Nombre total d'articles : <?php echo count($produits_panier); ?></p>
            <a href="panier.php?action=vider" class="btn btn-danger">Vider le panier</a>
        </div>
    <?php else: ?>
        <p>Votre panier est vide. Ajoutez des produits en explorant notre catalogue.</p>
    <?php endif; ?>
</div>
</body>
</html>