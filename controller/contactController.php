<?php
require_once __DIR__ . '/../model/contactModel.php';

class ContactController {
    private $contactModel;

    public function __construct($pdo) {
        $this->contactModel = new ContactModel($pdo);
    }

    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
            $success = $this->contactModel->ajouterContact($_POST);
            if ($success) {
                $_SESSION['message'] = "Votre message a été envoyé avec succès !";
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de l'envoi du message.";
            }
            header('Location: ?page=contact');
            exit;
        }

        require __DIR__ . '/../view/contact.php';
    }
}
?>
