<?php
require_once __DIR__ . '/../repository/ConnexionRepository.php';
require_once __DIR__ . '/../../src/models/Connexion.php';
class ConnexionService
{
    private ConnexionRepository $connexionRepository;
    public function __construct()
    {
        $this->connexionRepository = new ConnexionRepository();
    }

    public function seConnecter(string $login, string $password)
    {
        return $this->connexionRepository->selectByLoginAndPassword($login, $password);
    }

    public function getAllRp(): array
    {
        return $this->connexionRepository->selectUserByRoleRp();
    }
     public function addConnexion(Connexion $connexion): ?int {
        return $this->connexionRepository->insertConnexion($connexion);
    }

    public function searchConnexionByIdentifiant(string $identifiant): ?Connexion {
        return $this->connexionRepository->selectConnexionByIdentifiant($identifiant);
    }

}
