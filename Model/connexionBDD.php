<?php
// Connexion à la base de données MySQL avec PDO
function connect() {
    $servername = "localhost";
    $dbname = "ventilis";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connexion échouée : " . $e->getMessage());
    }
}
?>
