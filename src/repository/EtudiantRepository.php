<?php
require_once __DIR__ . "/../../config/Database.php";
require_once __DIR__ . "/../../src/models/Etudiant.php";

class EtudiantRepository
{
    public function __construct()
    {
        Database::connexion();
    }

    public function insert(Etudiant $etudiant): int
    {
        try {
            $nom = $etudiant->getNom();
            $matricule = $etudiant->getMatricule();
            $adresse = $etudiant->getAdresse();
            $telephone = $etudiant->getTelephone();
            $sexe = $etudiant->getSexe();
            $classe = $etudiant->getClasse();

            $sql = "INSERT INTO etudiant (nom, matricule, adresse, telephone,sexe, id_classe)
            VALUES (:nom, :matricule, :adresse, :telephone, :sexe, :idClasse)";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':matricule', $matricule);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':sexe', $sexe);
            $stmt->bindParam(':idClasse', $classe, PDO::PARAM_INT);

            $stmt->execute();
            return Database::getPdo()->lastInsertId();
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return 0;
    }

    public function selectAll(int|null $id = null, string $nom = '',string $sexe='', int $offset = 0, int $size = 5): array
    {
        $etudiants = [];
        try {
            $where = "WHERE 1=1";
            if (!is_null($id)) {
                $where .= " AND id = :id";
            }
            if (!empty($nom)) {
                $where .= " AND nom LIKE :nom";
            }
            if (!empty($sexe)) {
                $where .= " AND sexe LIKE :sexe";
            }
            $sql = "SELECT * FROM etudiant ";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $etudiants[] = Etudiant::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return $etudiants;
    }

    public function selectByMatricule(string $matricule): ?Etudiant
    {
        try {
            $sql = "SELECT * FROM etudiant WHERE matricule = :matricule";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':matricule', $matricule, PDO::PARAM_STR);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row) {
                return Etudiant::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return null;
    }
    public function getNombreTotalEtudiants(): int {
        try {
            $sql = "SELECT COUNT(*) AS total FROM etudiant";
            $stmt = Database::getPdo()->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? (int)$row['total'] : 0;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }
    public function getNombreEtudiantsParAttache(int $idAttache): int {
        try {
            $sql = "
                SELECT COUNT(*) AS total
                FROM etudiant
                WHERE id_classe IN (
                    SELECT id FROM classe WHERE id_attache = :idAttache
                )
            ";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':idAttache', $idAttache, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? (int)$row['total'] : 0;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
    }
}
