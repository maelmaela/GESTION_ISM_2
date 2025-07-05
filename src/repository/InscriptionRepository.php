<?php
require_once __DIR__ . "/../../config/Database.php";
require_once __DIR__ . "/../../src/models/Inscription.php";

class InscriptionRepository {
    public function __construct()
    {
        Database::connexion();
    }

    public function insert(Inscription $inscription): int {
        try {
            $pdo = Database::getPdo();
            $sql = "INSERT INTO inscription (id_etudiant, id_classe, etat, date_inscription)
                    VALUES (:idEtudiant, :idClasse, :etat, :dateInscription)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idEtudiant', $inscription->getIdEtudiant(), PDO::PARAM_INT);
            $stmt->bindValue(':idClasse', $inscription->getClasse(), PDO::PARAM_INT);
            $stmt->bindValue(':etat', $inscription->getEtat(), PDO::PARAM_STR);
            $stmt->bindValue(':dateInscription', $inscription->getDateInscription(), PDO::PARAM_STR);
            $stmt->execute();

            return $pdo->lastInsertId();
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return 0;
    }

    public function selectAll(int|null $id = null, int $idEtudiant = 0, int $offset = 0, int $size = 5): array {
        $inscriptions = [];
        try {
            $where = "WHERE 1=1";
            if (!is_null($id)) {
                $where .= " AND id = :id";
            }
            if (!empty($idEtudiant)) {
                $where .= " AND id_etudiant = :idEtudiant";
            }

            $sql = "SELECT * FROM inscription $where ORDER BY id DESC LIMIT :offset, :size";
            $stmt = Database::getPdo()->prepare($sql);

            if (!is_null($id)) {
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            }
            if (!empty($idEtudiant)) {
                $stmt->bindValue(':idEtudiant', $idEtudiant, PDO::PARAM_INT);
            }

            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':size', $size, PDO::PARAM_INT);
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $inscriptions[] = Inscription::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return $inscriptions;
    }

    public function selectById(int $id): ?Inscription {
        try {
            $sql = "SELECT * FROM inscription WHERE id = :id";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row) {
                return Inscription::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return null;
    }
    
}