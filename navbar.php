<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Ventalis</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Accueil</a></li>



                <?php if(!isset($_SESSION['email'])) { ?>
                    <li><a href="Connexion.php">Se connecter</a></li>
                    <li><a href="CreerCompte.php">Créer un compte</a></li>
                    <li><a href="ListeProduit.php">Liste des produits</a></li>

                <?php } ?>



                <?php if(isset($_SESSION['email'])){ ?>
                    <?php if($_SESSION['role']=="admin"){ ?>
                        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Création <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="AjouterCategorie.php">Ajouter une catégorie</a></li>
                        <li><a href="CreerConseiller.php">Créer un conseiller</a></li>
                        <li><a href="CreerProduit.php">Créer un produit</a></li>
                    </ul>
                </li>
                    <?php } ?>



                <?php if($_SESSION['role']=="Employe"){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Création <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="AjouterCategorie.php">Ajouter une catégorie</a></li>
                                <li><a href="CreerConseiller.php">Créer un conseiller</a></li>
                                <li><a href="CreerProduit.php">Créer un produit</a></li>
                            </ul>
                        </li>

             <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilisateurs <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ListeUtilisateurParConseiller.php">Liste des utilisateurs</a></li>
                        <li><a href="ListeCommandeParUtilisateur.php">Mes commandes</a></li>
                    </ul>
                </li>  <?php } ?>


                <?php if($_SESSION['role']=="utilisateur") { ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon espace <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="ListeCommandeParUtilisateur.php">Mes commandes</a></li>
                        <li><a href="ContacterConseiller.php">Contacter mon conseiller</a></li>
                    </ul>
                </li>
                    <li><a href="ListeProduit.php">Liste des produits</a></li>
                    <?php } ?>

                    <?php if($_SESSION['role']=="utilisateur") { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mon espace <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="MessageConseiller.php">Mes messages</a></li>
                            </ul>
                        </li>
                        <li><a href="ListeProduit.php">Liste des produits</a></li>
                    <?php } ?>
                <?php } ?>



                <?php if(isset($_SESSION['email'])){ ?> <li><a href="Logout.php">Déconnexion</a> </li>  <?php } ?>
            </ul>
        </div>
    </div>
</nav>
