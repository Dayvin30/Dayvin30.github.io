<!DOCTYPE html>
<html>
<head>
    <title>Réinitialiser le mot de passe - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Réinitialiser le mot de passe</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Adresse e-mail :</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail" required>
        </div>
        <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
    </form>
</div>
</body>
</html>
