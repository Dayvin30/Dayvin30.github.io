<!DOCTYPE html>
<html>
<head>
    <title>Contacter le conseiller - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Contacter votre conseiller</h2>
    <form action="ContacterConseiller.php" method="POST">
        <div class="form-group">
            <label for="sujet">Sujet :</label>
            <input type="text" class="form-control" id="sujet" name="sujet" required>
        </div>
        <div class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer le message</button>
    </form>
</div>
</body>
</html>
