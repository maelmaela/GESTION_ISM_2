<?php
require_once  __DIR__ ."/../../config/Database.php";
require_once  __DIR__ ."/../../src/models/Module.php";

class ModuleRepository{
    public function __construct()
    {
        Database::connexion();
    }

    public function insert(Module $module):int{
        try {
            $id=$module->getId();
            $libelle=$module->getLibelle();
            $sql="INSERT INTO `module`(`id`,`libelle`) VALUES ('$id','$libelle')";
            return Database::getPdo()->exec($sql);
        } catch (\PDOException $ex) {
           print $ex->getMessage()."\n";
        }
        return 0;
    }

    public function associerProfesseurs(int $moduleId, array $professeurs): void {
        $pdo = Database::getPdo();
        $stmt = $pdo->prepare("INSERT INTO module_professeur (module_id, professeur_id) VALUES (?, ?)");
        foreach ($professeurs as $profId) {
            $stmt->execute([$moduleId, $profId]);
        }
    }

    public function selectAll(int|null $id, string $libelle, int $offset = 0, int $size = 5): array {
    $modules = [];
    try {
        $where = "WHERE 1=1"; 
        if (!is_null($id)) {
            $where .= " AND id = :id";
        }
        if (!empty($libelle)) {
            $where .= " AND libelle LIKE :libelle";
        }
        $sql = "SELECT * FROM module $where ORDER BY id ASC LIMIT :offset, :size";
        $stmt = Database::getPdo()->prepare($sql);
        if (!is_null($id)) {
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }
        if (!empty($libelle)) {
            $stmt->bindValue(':libelle', '%' . $libelle . '%', PDO::PARAM_STR);
        }
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':size', $size, PDO::PARAM_INT);

        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $modules[] = Module::of($row); 
        }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return $modules;
    }

    public function SelectById(int $id): ?Module {
        try {
            $sql = "SELECT * FROM module WHERE id = :id";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row) {
                return Module::of($row); 
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return null; 
    }

    public function findModulesByProfId(int $profId, int $offset = 0, int $size = 5): array {
    $modules = [];
        try {
            $sql = "SELECT m.* 
                    FROM module m
                    JOIN module_prof mp ON m.id = mp.id_module
                    WHERE mp.id_prof = :profId
                    LIMIT :offset, :size";

            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':profId', $profId, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':size', $size, PDO::PARAM_INT);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $modules[] = Module::of($row); 
            }

        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return $modules;
    }
    public function affecterProfesseur($idModule, $idProf) {
        $sql = "INSERT IGNORE INTO module_prof (id_module, id_prof) VALUES (:idModule, :idProf)";
        $stmt = Database::getPdo()->prepare($sql);
        $stmt->bindValue(':idModule', $idModule, PDO::PARAM_INT);
        $stmt->bindValue(':idProf', $idProf, PDO::PARAM_INT);
        $stmt->execute();
    }
}   