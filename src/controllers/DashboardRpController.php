<?php
require_once __DIR__ . '/../../config/Controller.php';
require_once __DIR__ . '/../../src/services/RpService.php';
require_once __DIR__ . '/../../src/services/ModuleService.php';
require_once __DIR__ . '/../../src/services/ProfesseurService.php';
require_once __DIR__ . '/../../src/services/ClasseService.php';
require_once __DIR__ . '/../../src/services/DemandeService.php';
require_once __DIR__ . '/../../src/repository/EtudiantRepository.php';
class DashboardRpController extends Controller{
    private RpService  $rpService;
    private ModuleService $moduleService;
    private ProfesseurService $professeurService;
    private ClasseService $classeService;
    private DemandeService $demandeService;
    private EtudiantRepository $etudiantRepository;
    public function __construct()
    {
        parent::__construct();
        $this->rpService = new RpService();
        $this->moduleService = new ModuleService();
        $this->professeurService = new ProfesseurService();
        $this->classeService = new ClasseService();
        $this->demandeService = new DemandeService();
        $this->etudiantRepository = new EtudiantRepository();
        $this->handleRequest();
    }
    public function handleRequest() {
       $action = $_REQUEST["action"] ?? 'dashboard-rp';
        switch ($action) {
            case 'form-rp':
                
                break;
            case 'dashboard-rp':
                $this->showDashboard();
                break;
            case 'gestion-classe':
                $this->showClasse();
                break;
            case 'gestion-prof':
                $this->showProf();
                break;
            case 'gestion-module':
                $this->showModule();
                break;
             case 'gestion-demande':
                $this->showDemande();
                break;
            case 'add-classe':
                $this->addClasse();
                break;
            case 'add-prof':
                $this->addProf();
                break;
            case 'add-module':
                $this->addModule();
                break;
            case 'save-affectation':
                $this->saveAffectation();
                break;
            default:
                
                break;
        }
    }
     public function showDashboard(){
        $repo = new ClasseRepository();
        $total = $repo->getNombreTotalClasses();
        $repoP = new ProfesseurRepository();
        $totalP = $repoP->getNombreTotalProfesseurs();
        $repoE = new EtudiantRepository();
        $totalE = $repoE->getNombreTotalEtudiants();
        $repoD = new DemandeRepository();
        $totalD = $repoD->getNombreTotalDemandes();
        $this->render("Rp/dashboardRp.html.php",[
            'total' => $total,
            'totalP' => $totalP,
            'totalE' => $totalE,
            'totalD' => $totalD
        ]);
    }
    public function saveAffectation() {
    $idModule = $_POST['id_module'];
    $profs = $_POST['profs'] ?? [];

    foreach ($profs as $idProf) {
        $this->moduleService->affecterProfesseur($idModule, $idProf);
    }
    $this->render("Rp/affecterModule.html.php", []);
    exit;
}
    public function showClasse() {
        $libelle = $_POST['libelle'] ?? '';
        $filiere = $_POST['filiere'] ?? '';
        $niveau = $_POST['niveau'] ?? '';
        if($filiere !="" || $niveau !=""){
             $classes = $this->classeService->getClasses(null, $libelle, $filiere, $niveau);

        }else {
            $classes = $this->classeService->getClasses(null, $libelle);
        }
       
        $this->render("Rp/classe.html.php", [
            'classes' => $classes,
            'libelle' => $libelle,
           
        ]);
    }
    
    public function showProf() {
        $nom = $_REQUEST['nom'] ?? "";
        $libelle = $_REQUEST['libelle'] ?? "";
        $professeurs = $this->professeurService->getProfesseurs(null,$nom);
       
        $modules = $this->moduleService->getModules(null, $libelle);
        $libelle = $_REQUEST['libelle'] ?? "";
        $classes = $this->classeService->getClasses(null, $libelle);
        $this->render("Rp/gestionProf.html.php", [
            'professeurs' => $professeurs,
            'modules' => $modules,
            'classes' => $classes
        ]);
    }
    public function showModule(){
        $libelle = $_REQUEST['libelle'] ?? "";
        $modules = $this->moduleService->getModules(null, $libelle);
        $this->render("Rp/gestionModule.html.php", [
            'modules' => $modules
        ]);

    }
    
    public function showDemande()
        {
            $demandes = $this->demandeService->getDemandes(); 
            $this->render('Rp/traiterDemande.html.php', ['demandes' => $demandes]);
        }
    public function addClasse() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $libelle = $_POST['className'] ?? '';
        $filiere = $_POST['filiere'] ?? '';
        $niveau = $_POST['niveau'] ?? '';
        $this->validator->isEmpty("libelle", $libelle, "Le libellé est obligatoire");
        $this->validator->isEmpty("filiere", $filiere, "La filière est obligatoire");
        $this->validator->isEmpty("niveau", $niveau, "Le niveau est obligatoire");

        if ($this->validator->isValid()) {
            $classe = new Classe(0, $libelle, $filiere,$niveau);
            $classe->setLibelle($libelle);
            $classe->setFiliere($filiere);
            $classe->setNiveau($niveau);
            $this->classeService->addClasse($classe);
            header("location:index.php?controller=rp&action=gestion-classe");
            exit;
        } else {
            $_SESSION['errors'] = $this->validator->errors ?? [];
            header("location:index.php?controller=rp&action=add-classe");
        }
    }

    $this->render("Rp/creerClasse.html.php", []);
    }
    public function addProf() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $modules = $_POST['modules'] ?? [];
            $classes = $_POST['classes'] ?? []; 
            $nom = $_POST['nom'] ?? '';
            $adresse = $_POST['adresse'] ?? '';
            $tel = $_POST['tel'] ?? '';
            $grade = $_POST['filiere'] ?? '';
            $this->validator->isEmpty("nom", $nom, "Le nom est obligatoire");
            $this->validator->isEmpty("adresse", $adresse, "L'adresse est obligatoire");
            $this->validator->isEmpty("tel", $tel, "Le numéro de téléphone est obligatoire");
            $this->validator->isEmpty("filiere", $grade, "Le grade est obligatoire");

            if ($this->validator->isValid()) {
                $professeur = new Professeur(0, $nom, $adresse, $tel, $grade);
                $professeur->setModules($modules);
                $professeur->setClasse($classes);
                $this->professeurService->addProfesseur($professeur);

                header("location:index.php?controller=rp&action=gestion-prof");
                exit;
            } else {
                $_SESSION['errors'] = $this->validator->errors ?? [];
                header("location:index.php?controller=rp&action=add-professeur");
            }
        }

        $modules = $this->moduleService->getModules();
        $classes = $this->classeService->getClasses();
        $this->render("Rp/ajoutProf.html.php", [
            'modules' => $modules,
            'classes' => $classes
        ]);
    }

    public function addModule() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libelle = $_POST['libelle'] ?? '';
            $this->validator->isEmpty("libelle", $libelle, "Le libellé est obligatoire");

            if ($this->validator->isValid()) {
                $module = new Module(0, $libelle);
                $this->moduleService->addModule($module);
                header("location:index.php?controller=rp&action=gestion-module");
                exit;
            } else {
                $_SESSION['errors'] = $this->validator->errors ?? [];
               header("location:index.php?controller=rp&action=add-module");
            }
        }
        $this->render("Rp/creerModule.html.php", []);
    }
   
}