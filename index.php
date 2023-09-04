<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil - Ventalis</title>
    <!-- Inclure les fichiers CSS et JavaScript de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Inclure le fichier CSS pour la page d'accueil -->
    <link rel="stylesheet" href="Public/css/index.css">
    <style>
        .intro {
            background-color: #f8f8f8;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .intro h2 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #337ab7;
        }

        .intro p {
            font-size: 16px;
            line-height: 1.5;
            color: #555;
        }

        .intro .btn {
            margin-top: 20px;
            background-color: #337ab7;
            color: #fff;
        }

        .intro .btn:hover {
            background-color: #23527c;
        }

        .welcome-title {
            color: #337ab7;
            padding: 10px;
            text-align: center;
            font-size: 48px;
        }
        footer {
            background-color: #f8f8f8;
            padding: 20px;
            text-align: center;
            color: #333333;
            font-size: 14px;
            margin-bottom: 0;
        }

    </style>
</head>
<body>
<!-- Inclure la navbar de Bootstrap -->

<?php include 'Vues/navbar.php'; ?>
<div class="welcome-title">
    Bienvenue chez Ventalis
</div>

<!-- Contenu de la page d'accueil ici -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="intro bg-primary" style="background-color: #33b799">
                <h2 class="text-center">Nos Produits</h2>
                <p>Ventalis propose une large gamme de produits marketing de haute qualité, conçus pour aider nos clients à accroître leur visibilité et leur réussite. Que ce soit des articles promotionnels, des supports imprimés ou des produits personnalisés, nous avons tout ce dont vous avez besoin pour faire briller votre entreprise.</p>
                <a href="ListeProduit.php" class="btn btn-default btn-block">Découvrir nos produits</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="intro bg-success">
                <h2 class="text-center">Notre Équipe</h2>
                <p>L'équipe de Ventalis est composée d'experts passionnés par le marketing et dévoués à la satisfaction de nos clients. Nous mettons notre expertise et notre créativité au service de votre entreprise pour vous offrir des solutions sur mesure et des conseils avisés. Faites confiance à notre équipe pour vous accompagner dans toutes vos démarches marketing.</p>
                <a href="#" class="btn btn-default btn-block">Rencontrez notre équipe</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="intro bg-info">
                <h2 class="text-center">Contactez-nous</h2>
                <p>Nous sommes là pour répondre à toutes vos questions, discuter de vos besoins et vous aider à trouver les solutions marketing les plus adaptées à votre entreprise. N'hésitez pas à nous contacter par téléphone, par email ou en remplissant le formulaire de contact. Notre équipe se fera un plaisir de vous assister et de vous fournir les informations dont vous avez besoin.</p>
                <a href="ContacterConseiller.php" class="btn btn-default btn-block">Nous contacter</a>
            </div>
        </div>
    </div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Coordonnées</h4>
                <p>Adresse : 123 Rue du Commerce, 75000 Paris</p>
                <p>Téléphone : 01 23 45 67 89</p>
                <p>Email : info@ventalis.com</p>
            </div>
            <div class="col-md-4">
                <h4>Liens utiles</h4>
                <ul>
                    <li><a href="#">Conditions d'utilisation</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

</body>
</html>
</body>
</html>
