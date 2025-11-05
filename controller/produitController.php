<?php

require_once __DIR__ . '/../model/veloModel.php';

class ProduitController
{
    private PDO $pdo;
    private VeloModel $veloModel;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->veloModel = new VeloModel($pdo);
    }

   
    public function index()
    {
        $velos = $this->veloModel->getAll();
        require __DIR__ . '/../view/produit.php';
    }

    
    public function show(int $id)
    {
        $velo = $this->veloModel->findById($id);
        if (!$velo) {
            http_response_code(404);
            echo "<h2>Vélo introuvable</h2>";
            return;
        }
        require __DIR__ . '/../view/produit_detail.php';
    }
}
