<?php
use PHPUnit\Framework\TestCase;
class FonctionnelTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        // Configuration de la connexion à la base de données de test.
        $host = '127.0.0.1';
        $db   = 'test_db';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function tearDown(): void
    {
        // Suppression des données de test de la table conseillers après chaque test
        $this->pdo->exec("DELETE FROM conseillers WHERE email LIKE 'test@%'");
    }

    public function testVerifierExistenceConseillerTrue()
    {
        $email = "test@example.com";
        $this->pdo->exec("INSERT INTO conseillers (email) VALUES ('$email')");

        $result = verifier_existence_conseiller($email, $this->pdo);
        $this->assertTrue($result);
    }

    public function testVerifierExistenceConseillerFalse()
    {
        $email = "not_exist@example.com";
        $result = verifier_existence_conseiller($email, $this->pdo);
        $this->assertFalse($result);
    }
}

