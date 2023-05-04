<!DOCTYPE html>
<html>
<head>
    <title>Créer un conseiller - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Créer un produit</h2>
    <form action="CreerProduit.php" method="POST">
    <div class="form-group">
        <label for="libelle">Libellé :</label>
        <input type="text" class="form-control" id="libelle" name="libelle" required>
    </div>
    <div class="form-group">
        <label for="image">Image :</label>
        <input type="text" class="form-control" id="image" name="image" required>
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
        <label for="prix">Prix :</label>
        <input type="number" class="form-control" id="prix" name="prix" required>
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie :</label>
        <select class="form-control" id="categorie" name="categorie" required>
            <!-- Afficher la liste des catégories existantes -->
            <?php
            $pdo = connect();
            $resultat = $pdo->query('SELECT * FROM categories');
            while ($categorie = $resultat->fetch()) {
                echo '<option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';
            }
            $pdo = null;
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Créer le produit</button>
</form>
