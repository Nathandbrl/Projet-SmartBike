<?php
class ContactModel {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterContact($data) {
        $sql = "INSERT INTO contacts (nom, prenom, email, message) VALUES (:nom, :prenom, :email, :message)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':email' => $data['email'],
            ':message' => $data['message']
        ]);
    }
}
