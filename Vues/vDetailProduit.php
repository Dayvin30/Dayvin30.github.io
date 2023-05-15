<!DOCTYPE html>
<html>
<head>
    <title>Détail du produit - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Détail du produit</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>" class="img-thumbnail">
        </div>
        <div class="col-md-6">
            <h3><?php echo $produit['libelle']; ?></h3>

            <hr>

            <h4>Description :</h4>
            <p><?php echo $produit['description']; ?></p>

            <hr>

            <h4>Catégorie :</h4>
            <p><?php echo $produit['categorie']; ?></p>

            <hr>

            <h4>Prix pour 1000 :</h4>
            <p><?php echo $produit['prix'] * 1000; ?> €</p>

            <?php if (isset($_SESSION['email'])) : ?>
                <form action="AjouterPanier.php" method="POST">
                    <input type="hidden" name="id_produit" value="<?php echo $produit['id']; ?>">
                    <div class="form-group">
                        <label for="quantite">Quantité (minimum 1000) :</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" min="1000" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>
            <?php else: ?>
                <p>Connectez-vous pour pouvoir ajouter cet article à votre panier.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
