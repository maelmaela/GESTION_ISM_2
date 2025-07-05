<?php
require_once  __DIR__ ."/../../config/Database.php";
require_once  __DIR__ ."/../../src/models/Classe.php";
class ClasseRepository{
    public function __construct()
    {
        Database::connexion();
    }

    public function insert(Classe $classe):int{
        try {
            $id=$classe->getId();
            $libelle=$classe->getLibelle();
            $filiere=$classe->getFiliere();
            $niveau=$classe->getNiveau();
            $sql="INSERT INTO `classe`(`id`,`libelle`,`filiere`,`niveau`) VALUES ('$id','$libelle','$filiere','$niveau')";
            return Database::getPdo()->exec($sql);
        } catch (\PDOException $ex) {
           print $ex->getMessage()."\n";
        }
        return 0;
    }

    public function selectAll(int|null $id, string $libelle, string $filiere = '', string $niveau = '', int $offset = 0, int $size = 5): array {
        $classes = [];
        try {
            $where = "WHERE 1=1";
            if (!is_null($id)) {
                $where .= " AND id = :id";
            }
            if (!empty($libelle)) {
                $where .= " AND libelle LIKE :libelle";
            }
            if (!empty($filiere)) {
                $where .= " AND filiere LIKE :filiere";
            }
            if (!empty($niveau)) {
                $where .= " AND niveau LIKE :niveau";
            }
            $sql = "SELECT * FROM classe $where LIMIT :offset, :size";
            $stmt = Database::getPdo()->prepare($sql);

            if (!is_null($id)) {
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            }
            if (!empty($libelle)) {
                $stmt->bindValue(':libelle', '%' . $libelle . '%', PDO::PARAM_STR);
            }
            if (!empty($filiere)) {
                $stmt->bindValue(':filiere', '%' . $filiere . '%', PDO::PARAM_STR);
            }
            if (!empty($niveau)) {
                $stmt->bindValue(':niveau', '%' . $niveau . '%', PDO::PARAM_STR);
            }
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':size', $size, PDO::PARAM_INT);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $classes[] = Classe::of($row);
            }

        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return $classes;
    }

    public function SelectById(int $id): ?Classe {
        try {
            $sql = "SELECT * FROM classe WHERE id = :id";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row) {
                return Classe::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return null;
    }

    public function getClassesByFiliere(string $filiere): array {
    $classes = [];
    try {
        $sql = "SELECT * FROM classe";
        if (!empty($filiere)) {
            $sql .= " WHERE filiere = :filiere";
        }

        $stmt = Database::getPdo()->prepare($sql);

        if (!empty($filiere)) {
            $stmt->bindValue(':filiere', $filiere, PDO::PARAM_STR);
        }

        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $classes[] = Classe::fromArray($row); 
        }

    } catch (\PDOException $ex) {
        echo $ex->getMessage();
    }

    return $classes;
    }

    public function getNombreTotalClasses(): int {
        try {
            $sql = "SELECT COUNT(*) AS total FROM classe";
            $stmt = Database::getPdo()->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? (int)$row['total'] : 0;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }
}