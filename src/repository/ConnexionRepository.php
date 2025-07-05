<?php
require_once  __DIR__ ."/../../config/Database.php";
require_once  __DIR__ ."/../../src/models/Connexion.php";
class ConnexionRepository
{
    public function __construct()
    {
        Database::connexion();
    }

    public function insertConnexion(Connexion $connexion): ?int
    {
        try {
            $sql = "INSERT INTO `connexion` (`nom`, `password`, `role`) VALUES (:nom, :password, :role)";
            $stmt = Database::getPdo()->prepare($sql);
            $nom = $connexion->getNomComplet();
            $password = $connexion->getPassword();
            $role = $connexion->getRole();

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);

            if ($stmt->execute()) {
                return (int)Database::getPdo()->lastInsertId(); 
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return null;
    }

    public function selectByLoginAndPassword(string $login, string $password)
    {
        try {
            $sql = "SELECT * FROM `connexion` WHERE `nom` = :login AND `password` = :password";
            $stmt = Database::getPdo()->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            if ($row = $stmt->fetch()) {
                return Connexion::of($row);
            }
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return null;
    }


    public function selectUserByRoleRp(string $role = "RP"): array
    {
        try {
            $sql = "SELECT * FROM `connexion` WHERE role ='$role' ";
            $cursor = Database::getPdo()->query($sql);
            $users = [];
            while ($row = $cursor->fetch()) {
                $users[] = Connexion::of($row);
            }
            return $users;
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return [];
    }

    public function selectUserByRoleAttache(string $role = "ATTACHE"): array
    {
        try {
            $sql = "SELECT * FROM `connexion` WHERE role ='$role' ";
            $cursor = Database::getPdo()->query($sql);
            $users = [];
            while ($row = $cursor->fetch()) {
                $users[] = Connexion::of($row);
            }
            return $users;
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return [];
    }

    public function selectUserByRoleEtudiant(string $role = "ETUDIANT"): array
    {
        try {
            $sql = "SELECT * FROM `connexion` WHERE role ='$role' ";
            $cursor = Database::getPdo()->query($sql);
            $users = [];
            while ($row = $cursor->fetch()) {
                $users[] = Connexion::of($row);
            }
            return $users;
        } catch (\PDOException $ex) {
            print $ex->getMessage() . "\n";
        }
        return [];
    }
    public function selectConnexionByIdentifiant(string $identifiant): ?Connexion {
    try {
        $sql = "SELECT * FROM connexion WHERE nom = :identifiant";
        $stmt = Database::getPdo()->prepare($sql);
        $stmt->bindParam(':identifiant', $identifiant);
        $stmt->execute();
        if ($row = $stmt->fetch()) {
            return Connexion::of($row);
        }
    } catch (\PDOException $ex) {
        print $ex->getMessage() . "\n";
    }
    return null;
}
}
