<!DOCTYPE html>
<html>
<head>
    <title>Liste des commandes - Mon Espace</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Mes commandes</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Libellé</th>
            <th>Date</th>
            <th>Total TTC</th>
            <th>Statut</th>
        </tr>
        </thead>
        <tbody>
        <!-- Boucler sur la liste des commandes -->
        <?php foreach ($commandes as $commande): ?>
            <tr>
                <td><?php echo $commande['id']; ?></td>
                <td><?php echo $commande['libelle']; ?></td>
                <td><?php echo $commande['date_commande']; ?></td>
                <td><?php echo $commande['prix']; ?> €</td>
                <td><?php echo $commande['statut']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
