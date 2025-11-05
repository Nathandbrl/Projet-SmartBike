<?php
require_once '../models/Contacts.php';

class ContactController {
    private $contactsModel;

    public function __construct($pdo) {
        $this->contactsModel = new Contacts($pdo);
    }

    public function afficherFormulaire() {
        global $message;
        if (isset($_POST['nom'])) {
            $this->contactsModel->ajouterContact($_POST);
            $message = "Message envoyé ! Peut-être...";
        }
        include '../views/contact.php';
    }
}
?>
