<!DOCTYPE html>
<html>
<head>
    <title>Détail du produit - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>


        <style>
         .diagonal-banner-bottom {
             position: relative;
             height: 0;
             width: 100%;
             padding-bottom: 30px;
             overflow: hidden;
         }

        .diagonal-banner-bottom:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            background-color: #337ab7;
            transform: skewY(6deg);
            transform-origin: bottom left;
            z-index: -1;
        }


        .container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="diagonal-banner-top"></div>

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
                <form action="Panier.php" method="POST">
                    <input type="hidden" name="id_produit" value="<?php echo $produit['id']; ?>">
                    <div class="form-group">
                        <label for="quantite">Quantité (minimum 1000) :</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" min="1000" required value="1000">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>
            <?php else: ?>
                <p>Connectez vous pour ajouter un article au panier</p>
                <?php endif; ?>
        </div>
    </div>
</div>
<br><br>
<div class="diagonal-banner-bottom"></div>

</body>
</html>
