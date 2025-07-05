<?php
require_once __DIR__ . '/../../config/Controller.php';
require_once __DIR__ . '/../../src/services/EtudiantService.php';
require_once __DIR__ . '/../../src/services/InscriptionService.php';
require_once __DIR__ . '/../../src/services/ClasseService.php';
require_once __DIR__ . '/../../src/services/ConnexionService.php';


class AttacheController extends Controller { 
    private EtudiantService $etudiantService;
    private InscriptionService $inscriptionService;
    private ClasseService $classeService;
    private ConnexionService $connexionService;

    public function __construct()
    {
        parent::__construct();
        $this->etudiantService = new EtudiantService();
        $this->inscriptionService = new InscriptionService();
        $this->classeService = new ClasseService();
        $this->connexionService = new ConnexionService();
        $this->handleRequest();
    }

    public function handleRequest() {
        $action = $_REQUEST["action"] ?? 'dashboard-attache';
        switch ($action) {
            case 'form-rp':
                break;
            case 'dashboard-attache':
                $this->showDashboard();
                break;
            case 'gestion-etudiant':
                $this->showEtudiant();
                break;
            case 'add-inscription':
                $this->addInscription();
                break;
            default:
                # code...
                break;
        }
    }

    public function showDashboard(){
        $this->render("Attache/dashboardAttache.html.php",[
        ]);
    }

    
    public function showEtudiant() {
        $nom = $_REQUEST['nom'] ?? "";
        $etudiants = $this->etudiantService->getEtudiants(null, $nom);
        $this->render("Attache/gestionEtudiant.html.php", [
            'etudiants' => $etudiants
        ]);
    }

     public function addEtudiant(){
        $this->render("Attache/ajoutEtudiant.html.php",[
        ]);
    }

    public function addInscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $matricule = $_POST['matricule'] ?? '';
            $adresse = $_POST['adresse'] ?? '';
            $telephone = $_POST['telephone'] ?? '';
            $sexe = $_POST['sexe'] ?? '';
            $classe = $_POST['id_classe'] ?? 0;

            $etudiantExist = $this->etudiantService->searchEtudiantByMatricule($matricule);
            if ($etudiantExist) {
                $idEtudiant = $etudiantExist->getId();
            } else {
                $etudiant = new Etudiant(0, $nom, $matricule, $adresse, $telephone,  $sexe ,$classe);
                $idEtudiant = $this->etudiantService->addEtudiant($etudiant);
                 $connexionExist = $this->connexionService->searchConnexionByIdentifiant($matricule);
                if (!$connexionExist) {
                    $passwordParDefaut = password_hash('passer', PASSWORD_DEFAULT);
                    $connexion = new Connexion();
                    $connexion->setNomComplet($matricule); 
                    $connexion->setPassword($passwordParDefaut);
                    $connexion->setRole('ETUDIANT');
                    $this->connexionService->addConnexion($connexion);
                }
            }
            $etat = $_POST['etat'] ?? '';
            $date = date('Y-m-d');
            $inscription = new Inscription(0, $idEtudiant, $classe, $etat, $date);
            $this->inscriptionService->addInscription($inscription);

            header("Location: index.php?controller=attache&action=gestion-etudiant");
            exit;
        }
        $classes = $this->classeService->getClasses();
        $this->render("Attache/ajoutEtudiant.html.php", [
            'classes' => $classes
        ]);
    }
}