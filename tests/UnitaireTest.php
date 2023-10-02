<?php

use PHPUnit\Framework\TestCase;

require 'Model/connexionBDD.php'; // Changez ceci vers le fichier qui contient votre fonction.

class UnitaireTest extends TestCase {

    public function testVerifierExistenceConseiller() {
        // Mock de l'objet PDOStatement
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())
            ->method('bindValue')
            ->with(':email', 'test@example.com');
        $stmt->expects($this->once())
            ->method('execute');
        $stmt->expects($this->once())
            ->method('fetchColumn')
            ->willReturn(1);

        // Mock de l'objet PDO
        $pdo = $this->createMock(PDO::class);
        $pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($stmt);

        // Remplacez votre méthode connect() par cette version mockée
        // Pour cela, vous pourriez avoir besoin de refactoriser votre code
        // pour injecter l'objet PDO au lieu de l'appeler directement dans la fonction.

        $result = verifier_existence_conseiller('test@example.com', $pdo);  // Notez l'ajout du paramètre $pdo
        $this->assertTrue($result);
    }

    
}
