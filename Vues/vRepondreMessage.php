
<!DOCTYPE html>
<html>
<head>
    <title>Répondre au message - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'Vues/navbar.php'; ?>

<div class="container">
    <h2>Répondre au message</h2>

    <div class="panel panel-default">
        <div class="panel-heading">Message d'origine</div>
        <div class="panel-body">
            <p><strong>Sujet :</strong> <?php echo $_GET['objet']; ?></p>
            <p><strong>Contenu :</strong> <?php echo $_GET['contenu']; ?></p>
        </div>
    </div>
    <form action="" method="post">
    <input type="hidden" name="id_message" value="<?php echo $_GET['id']; ?>">
        <div class="form-group">
            <label for="reponse">Réponse :</label>
            <textarea class="form-control" id="reponse" name="reponse" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer la réponse</button>
    </form>
</div>

</body>
</html>
