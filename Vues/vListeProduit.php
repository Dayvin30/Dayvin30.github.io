<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Liste des produits</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Libellé</th>
            <th>Lot de 1000</th>
            <th>Voir les détails</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($produits as $produit) { ?>
            <tr>
                <td><?php echo $produit['libelle']; ?></td>
                <td><?php echo $produit['prix'] * 1000; ?> €</td>
                <td> <a href="DetailProduit.php?id=<?php echo $produit['id']; ?>" class="btn btn-primary">Voir les détails</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
