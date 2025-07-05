<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$controllerName = $_REQUEST["controller"] ?? 'user';
switch ($controllerName) {
    case 'user':
        require_once "../src/controllers/ConnexionController.php";
        $controller = new ConnexionController();
        break;
    case 'attache':
        require_once "../src/controllers/AttacheController.php";
        $controller = new AttacheController();
        break;
    case 'rp':
        require_once "../src/controllers/DashboardRpController.php";
        $controller = new DashboardRpController();
        break;
    case 'etudiant':
        require_once "../src/controllers/EtudiantController.php";
        $controller = new EtudiantController();
        break;
    default:

        break;
}
