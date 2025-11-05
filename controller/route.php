<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        require_once 'controller/homeController.php';
        $controller = new homeController($pdo);
        $controller->index();
        break;

    case 'produits':
        require_once 'controller/produitController.php';
        $controller = new produitController($pdo);
        $controller->index();
        break; 

    
    case 'produit':
        require_once 'controller/produitController.php';
        if (isset($_GET['id'])) {
            $ctrl = new ProduitController($pdo);
            $ctrl->show((int)$_GET['id']);
        } else {
            header('Location: ?page=produits');
        }
        break;

    case 'commander':
        require_once 'controller/commanderController.php';
        $controller = new CommandeController($pdo);
        $controller->form();
        break;

    case 'contact':
        require_once 'controller/contactController.php';
        $controller = new contactController($pdo);
        $controller->index();
        break; 

    default:
        echo "<h2>Erreur 404 : page non trouvée</h2>";
        break;
}
