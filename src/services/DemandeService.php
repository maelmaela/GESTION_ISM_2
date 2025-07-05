<?php
require_once __DIR__ . '/../repository/DemandeRepository.php';
require_once __DIR__ . '/../../src/models/Demande.php';

class DemandeService
{
    private DemandeRepository $demandeRepository;

    public function __construct()
    {
        $this->demandeRepository = new DemandeRepository();
    }

    public function addDemande(Demande $demande): int
    {
        return $this->demandeRepository->insert($demande);
    }

    public function getDemandes(?int $id = null, string $etat = "", int $offset = 0, int $size = 5): array
    {
        return $this->demandeRepository->selectAll($id, $etat, $offset, $size);
    }

    public function getDemandeById(int $id): ?Demande
    {
        return $this->demandeRepository->selectById($id);
    }
    
}