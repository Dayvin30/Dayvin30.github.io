<!DOCTYPE html>
<html>
<head>
    <title>Connexion - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h2>Connexion à Ventalis</h2>
            <form method="post" action="connexion.php">
                <div class="form-group">
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="motdepasse">Mot de passe :</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
                </div>
                <h6><a href="ResetPassword.php">Mot de passe oublié ?</a></h6>
                <button type="submit" class="btn btn-default">Se connecter</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

