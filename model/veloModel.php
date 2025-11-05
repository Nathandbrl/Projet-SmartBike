<?php
class VeloModel {
    private $pdo;

    public function __construct($db) {
        $this->pdo = $db;
    }

    #Récupère le dernier vélo pour l'afficher sur la page d'accueil par la suite
    public function getLastVelo() {
        $sql = "SELECT * FROM velos ORDER BY date_ajout DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

