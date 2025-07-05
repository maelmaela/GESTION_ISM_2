<?php
require_once __DIR__ . '/../repository/InscriptionRepository.php';
require_once __DIR__ . '/../../src/models/Inscription.php';

class InscriptionService
{
    private InscriptionRepository $inscriptionRepository;

    public function __construct()
    {
        $this->inscriptionRepository = new InscriptionRepository();
    }

    public function addInscription(Inscription $inscription): int
    {
        return $this->inscriptionRepository->insert($inscription);
    }

    public function getInscriptions(?int $id = null, int $idEtudiant = 0, int $offset = 0, int $size = 5): array
    {
        return $this->inscriptionRepository->selectAll($id, $idEtudiant, $offset, $size);
    }

    public function searchInscriptionById(int $id): ?Inscription
    {
        return $this->inscriptionRepository->selectById($id);
    }
}