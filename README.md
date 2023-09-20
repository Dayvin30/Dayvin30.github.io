Ventalis

Pré-requis
PHP >= 7.4
MySQL
phpMyAdmin (optionnel, pour la gestion de la base de données)


Installation

Cloner le dépôt :
git clone https://github.com/Dayvin30/Ventalis

Configurer la base de données :
Ouvrez phpMyAdmin et créez une nouvelle base de données Ventalis
Importez le fichier SQL fourni pour initialiser la structure et les données initiales.

Configurer la connexion à la base de données:
Renommez le fichier config-sample.php en config.php.

Modifiez les informations de connexion selon votre environnement :
    $servername = "localhost";
    $dbname = "ventalis";
    $username = "root";
    $password = "";
Démarrer votre serveur

Si vous utilisez le serveur intégré à PHP :
php -S localhost:8000
Ouvrez votre navigateur et allez à l'adresse : http://localhost:8000