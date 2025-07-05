<?php
require_once __DIR__ . '/../repository/ModuleRepository.php';
require_once __DIR__ . '/../../src/models/Module.php';
class ModuleService
{
    private ModuleRepository $moduleRepository;
    public function __construct()
    {
        $this->moduleRepository = new ModuleRepository();
    }

    public function addModule(Module $module):void
    {
        $this->moduleRepository->insert($module);
    }
    public function getModules(?int $id = null, string $libelle = "", int $offset = 0, int $size = 5): array
    {
        return $this->moduleRepository->selectAll($id, $libelle, $offset, $size);
    }
    public function searchModuleById(int $id):Module|null
    {
        return $this->moduleRepository->SelectById($id);
    }

    public function affecterProfesseur(int $idProf, int $idModule): bool {
    try {
        $sqlCheck = "SELECT COUNT(*) FROM prof_module WHERE id_prof = :idProf AND id_module = :idModule";
        $stmtCheck = Database::getPdo()->prepare($sqlCheck);
        $stmtCheck->bindValue(':idProf', $idProf, PDO::PARAM_INT);
        $stmtCheck->bindValue(':idModule', $idModule, PDO::PARAM_INT);
        $stmtCheck->execute();
        if ($stmtCheck->fetchColumn() > 0) {
            return false;
        }
        $sql = "INSERT INTO prof_module (id_prof, id_module) VALUES (:idProf, :idModule)";
        $stmt = Database::getPdo()->prepare($sql);
        $stmt->bindValue(':idProf', $idProf, PDO::PARAM_INT);
        $stmt->bindValue(':idModule', $idModule, PDO::PARAM_INT);
        return $stmt->execute();

    } catch (\PDOException $ex) {
        echo "Erreur : " . $ex->getMessage();
        return false;
    }
}
    
}