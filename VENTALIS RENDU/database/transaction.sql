-- Fichier: ma_transaction.sql

BEGIN TRANSACTION; -- Début de la transaction

-- Première requête SQL
INSERT INTO categories (nom) 
VALUES ('Ordinateurs');

-- Deuxième requête SQL
UPDATE produits 
SET prix = 55 
WHERE id = 1;

COMMIT; -- Fin de la transaction, appliquer toutes les modifications
