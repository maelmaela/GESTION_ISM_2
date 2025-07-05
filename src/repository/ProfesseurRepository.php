<?php
require_once  __DIR__ ."/../../config/Database.php";
require_once  __DIR__ ."/../../src/models/Professeur.php";

class ProfesseurRepository{
     public function __construct()
    {
        Database::connexion();
    }

    public function insert(Professeur $professeur):int{
        try {
            $id=$professeur->getId();
            $nom=$professeur->getNom();
            $adresse=$professeur->getAdresse();
            $telephone=$professeur->getTelephone();
            $grade=$professeur->getGrade();
            $modules=implode(',',$professeur->getModules());
            $classes=implode(',',$professeur->getClasses());
            $sql="INSERT INTO `professeur`(`id`,`nom`,`adresse`,`telephone`,`grade`,`module`,`classe`) VALUES ('$id','$nom','$adresse','$telephone','$grade','$modules','$classes')";
            return Database::getPdo()->exec($sql);
        } catch (\PDOException $ex) {
           print $ex->getMessage()."\n";
        }
        return 0;
    }

    public function selectAll(int|null $id, string $nom = '', string $adresse = '', string $telephone = '', string $grade = '', int $offset = 0, int $size = 5): array {
    $profs = [];
    try {
        $where = "WHERE 1=1";
        if (!is_null($id)) {
            $where .= " AND id = :id";
        }
        if (!empty($nom)) {
            $where .= " AND nom LIKE :nom";
        }
        if (!empty($adresse)) {
            $where .= " AND adresse LIKE :adresse";
        }
        if (!empty($telephone)) {
            $where .= " AND telephone LIKE :telephone";
        }
        if (!empty($grade)) {
            $where .= " AND grade LIKE :grade";
        }
        $sql = "SELECT * FROM professeur ";
        $stmt = Database::getPdo()->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $profs[] = Professeur::of($row);
        }

    } catch (\PDOException $ex) {
        print $ex->getMessage() . "\n";
    }

    return $profs;
}

    public function selectById(int $id): ?Professeur {
        try {
            $sql = "SELECT * FROM professeur WHERE id = :id";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row) {
                return Professeur::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return null;
    }
    public function getNombreTotalProfesseurs(): int {
        try {
            $sql = "SELECT COUNT(*) AS total FROM professeur";
            $stmt = Database::getPdo()->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? (int)$row['total'] : 0;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }
}