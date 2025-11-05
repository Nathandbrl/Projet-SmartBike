<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        require_once 'controller/homeController.php';
        $controller = new homeController($pdo);
        $controller->index();
        break;

    /* case 'produits':
        require_once 'controller/produitsController.php';
        $controller = new produitsController($pdo);
        $controller->index();
        break;

    case 'commander':
        require_once 'controller/commanderController.php';
        $controller = new commanderController($pdo);
        $controller->index();
        break;

    case 'contact':
        require_once 'controller/contactController.php';
        $controller = new contactController($pdo);
        $controller->index();
        break; */

    default:
        echo "<h2>Erreur 404 : page non trouvée</h2>";
        break;
}
