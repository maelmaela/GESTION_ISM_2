<?php
require_once __DIR__ . '/../../config/Controller.php';
require_once __DIR__ .'/../../src/models/Connexion.php';
require_once __DIR__ . '/../../src/services/ConnexionService.php';

class ConnexionController extends Controller
{
    private ConnexionService $connexionSerice;
    public function __construct()
    {
        parent::__construct();
        $this->connexionSerice = new ConnexionService();
        $this->handleRequest();
    }

    protected function handleRequest()
    {
        
        $action = $_REQUEST["action"] ?? 'form-login';
        switch ($action) {
            case 'form-login':
                $this->showForm();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'login':
                var_dump(1);
                $this->login();
                break;
            default:
                # code...
                break;
        }
    }

    private function showForm()
    {
        require_once __DIR__ ."/../../views/connexion.html.php";
    }

    private function login()
    {
        $login = $_REQUEST['login'];
        $password = $_REQUEST['password'];
        $this->validator->isEmpty("login", $login, "Nom est obligatoire");
        $this->validator->isEmpty("password", $password, "Mot de passe est obligatoire");

        if ($this->validator->isValid()) {
            $user = $this->connexionSerice->seConnecter($login, $password);
            if ($user == null) {
                $this->validator->addError('connexion', "Identifiants / mot de passe incorrect");
                $_SESSION['errors'] = $this->validator->getErros();
                header("location:index.php");
                exit;
            } else {
                $_SESSION['user'] = $user->toArray();
                if (strtolower(strtolower($user->getRole()) === 'rp')) {
                    header("location:index.php?controller=rp&action=dashboard-rp");
                } elseif(strtolower(strtolower($user->getRole()) === 'attache')){
                    header("location:index.php?controller=attache&action=dashboard-attache");
                }
                else {
                    header("location:index.php?controller=etudiant&action=dashboard-etudiant");
                }
                exit;
            }
        }
    }

    private function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
    }
}
