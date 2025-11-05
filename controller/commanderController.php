<?php

require_once __DIR__ . '/../model/veloModel.php';
require_once __DIR__ . '/../model/commandeModel.php';

class CommandeController
{
    private PDO $pdo;
    private VeloModel $veloModel;
    private Commande $commandeModel;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->veloModel = new VeloModel($pdo);
        $this->commandeModel = new Commande($pdo);
    }

    
    public function form()
    {
        $bikes = $this->veloModel->getAll();
        
        require __DIR__ . '/../view/commander.php';
    }

    
    public function submit()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $errors = [];

        $velo_id = isset($_POST['velo_id']) ? (int)$_POST['velo_id'] : 0;
        $nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
        $prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $message = isset($_POST['message']) ? trim($_POST['message']) : null;

        if ($velo_id <= 0) {
            $errors[] = "Veuillez sélectionner un vélo.";
        } else {
          
            if ($this->veloModel->findById($velo_id) === null) {
                $errors[] = "Le vélo sélectionné n'existe pas.";
            }
        }

        if ($nom === '') $errors[] = "Le nom est requis.";
        if ($prenom === '') $errors[] = "Le prénom est requis.";
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Un e-mail valide est requis.";

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = ['velo_id'=>$velo_id,'nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'message'=>$message];
            header('Location: ?page=commander');
            exit;
        }

        try {
            $insertId = $this->commandeModel->create($velo_id, $nom, $prenom, $email, $message);
            $_SESSION['success'] = "Commande enregistrée (ID #{$insertId}). Nous vous contacterons bientôt.";
            header('Location: ?page=produits'); 
            exit;
        } catch (Exception $e) {
            $_SESSION['errors'] = ["Erreur serveur : " . $e->getMessage()];
            $_SESSION['old'] = ['velo_id'=>$velo_id,'nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'message'=>$message];
            header('Location: ?page=commander');
            exit;
        }
    }
}
