<?php
require_once 'model/veloModel.php';

class homeController {
    private $veloModel;

    public function __construct($db) {
        $this->veloModel = new VeloModel($db);
    }

    public function index() {
        $dernierVelo = $this->veloModel->getLastVelo();
        include 'view/home.php';
    }
}