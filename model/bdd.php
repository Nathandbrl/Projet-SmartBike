<?php
try {
    $pdo = new PDO("pgsql:host=localhost;dbname=smartbike", "postgres", "Vaillant");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
