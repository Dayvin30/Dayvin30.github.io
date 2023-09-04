<!DOCTYPE html>
<html>
<head>
    <title>Messages du conseiller - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->
<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Messages du conseiller</h2>

    <?php foreach ($messages as $message) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Message ID <?php echo $message['id']; ?></h3>
            </div>
            <div class="panel-body">
                <p><?php echo $message['contenu']; ?></p>
                <p>Date : <?php echo $message['date_message']; ?></p>
                <a href="RepondreMessage.php?id=<?php echo $message['id']; ?>&contenu=<?php echo $message['contenu'] ?>&objet=<?php echo $message['objet'] ?>
                &id_utilisateur=<?php echo $message['id_utilisateur'] ?>" class="btn btn-primary">Répondre</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
