<?php
require_once __DIR__ . "/../../config/Database.php";
require_once __DIR__ . "/../../src/models/Demande.php";

class DemandeRepository
{
    public function __construct()
    {
        Database::connexion();
    }

    public function insert(Demande $demande): int
    {
        try {
            $motif = $demande->getMotif();
            $etat = $demande->getEtat();
            $etudiantId = $demande->getEtudiantId();
            $inscriptionId = $demande->getInscriptionId();

            $sql = "INSERT INTO demande (motif, etat, etudiant_id, inscription_id)
                    VALUES (:motif, :etat, :etudiant_id, :inscription_id)";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindParam(':motif', $motif);
            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':etudiant_id', $etudiantId, PDO::PARAM_INT);
            $stmt->bindParam(':inscription_id', $inscriptionId, PDO::PARAM_INT);

            $stmt->execute();
            return Database::getPdo()->lastInsertId();
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return 0;
    }

    public function selectAll(int|null $id = null, string $etat = '', int $offset = 0, int $size = 5): array
    {
        $demandes = [];
        try {
            $where = "WHERE 1=1";
            if (!is_null($id)) {
                $where .= " AND d.id = :id";
            }
            if (!empty($etat)) {
                $where .= " AND d.etat = :etat";
            }

            $sql = "SELECT d.*, e.nom AS nom_etudiant 
                    FROM demande d 
                    JOIN etudiant e ON d.etudiant_id = e.id 
                    $where 
                    ORDER BY d.id DESC 
                    LIMIT :offset, :size";

            $stmt = Database::getPdo()->prepare($sql);

            if (!is_null($id)) {
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            }
            if (!empty($etat)) {
                $stmt->bindValue(':etat', $etat, PDO::PARAM_STR);
            }

            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':size', $size, PDO::PARAM_INT);

            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $demandes[] = Demande::of($row);
            }

        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return $demandes;
    }

    public function selectById(int $id): ?Demande
    {
        try {
            $sql = "SELECT * FROM demande WHERE id = :id";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch();
            if ($row) {
                return Demande::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }

        return null;
    }
    public function getNombreTotalDemandes(): int {
        try {
            $sql = "SELECT COUNT(*) AS total FROM demande";
            $stmt = Database::getPdo()->query($sql);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? (int)$row['total'] : 0;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
            return 0;
        }
    }
    
}