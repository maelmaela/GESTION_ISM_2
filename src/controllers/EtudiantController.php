<?php
require_once __DIR__ . '/../../config/Controller.php';
require_once __DIR__ . '/../../src/services/EtudiantService.php';
require_once __DIR__ . '/../../src/services/InscriptionService.php';
require_once __DIR__ . '/../../src/services/DemandeService.php';
class EtudiantController extends Controller{
    private EtudiantService $etudiantService;
    private InscriptionService $inscriptionService;
    private DemandeService $demandeService;

    public function __construct()
    {
        $this->etudiantService = new EtudiantService();
        $this->inscriptionService = new InscriptionService();
        $this->demandeService = new DemandeService();
        $this->validator = new Validator();
        $this->handleRequest();
    }
    public function handleRequest() {
        $action = $_REQUEST["action"] ?? 'dashboard-etudiant';
        switch ($action) {
            case 'dashboard-etudiant':
                $this->showDashboard();
                break;
            case 'add-demande':
                $this->addDemande();
                break;
            case 'gestion-demande':
                $this->showDemandes();
                break;
            default:
                # code...
                break;
        }
    }

    public function showDashboard(){
        $etudiant = $this->etudiantService->searchEtudiantByMatricule($_SESSION['user']['nomComplet']);
        $_SESSION['etudiant']= $etudiant->toArray();;
        $this->render("Etudiant/dashboardEtudiant.html.php");
    }
    public function addDemande() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $motif = $_POST['motif'] ?? '';
            $etat = $_POST['etat'] ?? '';
            $etudiantId = $_POST['etudiant_id'] ?? '';
            $inscriptionId = $_POST['inscription_id'] ?? '';
            $this->validator->isEmpty("motif", $motif, "Le motif est obligatoire");
            $this->validator->isEmpty("etat", $etat, "L'état est obligatoire");
            $this->validator->isEmpty("etudiant_id", $etudiantId, "L'étudiant est obligatoire");
            $this->validator->isEmpty("inscription_id", $inscriptionId, "L'inscription est obligatoire");

            if ($this->validator->isValid()) {
                $demande = new Demande(0, $motif, $etat, $etudiantId, $inscriptionId);
                $demande->setMotif($motif);
                $demande->setEtat($etat);
                $demande->setEtudiantId($etudiantId);
                $demande->setInscriptionId($inscriptionId);

                $this->demandeService->addDemande($demande);

                header("Location: index.php?controller=etudiant&action=gestion-demande");
                exit;
            } else {
                $_SESSION['errors'] = $this->validator->errors ?? [];
                header("Location: index.php?controller=etudiant&action=add-demande");
            }
        }

        $etudiants = $this->etudiantService->getEtudiants();
        $inscriptions = $this->inscriptionService->getInscriptions();

        $this->render("Etudiant/faireDemande.html.php", [
            "etudiants" => $etudiants,
            "inscriptions" => $inscriptions
        ]);
    }

    public function showDemandes() {
        $demandes = $this->demandeService->getDemandes(); 
        $etat = $_POST['etat'] ?? '';
            if($etat !=""){
                $demandes = $this->demandeService->getDemandes(null, $etat);

            }else {
                $demandes = $this->demandeService->getDemandes();
            }
        $this->render("Etudiant/gestionDemande.html.php", [
            "demandes" => $demandes
        ]);
    }
}
?>