<!DOCTYPE html>
<html>
<head>
    <title>Liste des clients</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Liste des clients</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($utilisateurs as $utilisateur) {
            echo '<tr>';
            echo '<td>'.$utilisateur['id'].'</td>';
            echo '<td>'.$utilisateur['nom'].'</td>';
            echo '<td>'.$utilisateur['prenom'].'</td>';
            echo '<td>'.$utilisateur['email'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
