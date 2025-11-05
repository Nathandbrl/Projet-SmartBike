<?php
class Contacts {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public fonction ajouterContacts($data){
        $sql = "INSERT INTO contacts (nom, prénom, email, message) VALUES (:name, :email, :message)";
        $data['nom'] . "', '" .
        $data['prenom'] . "', '" .
        $data['email'] . "', '" .
        $data['message'] . "')";
     $this->pdo->query($sql);
    }
}
