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



    
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT id, nom, prix, photo, description FROM velos ORDER BY date_ajout DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM velos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}

