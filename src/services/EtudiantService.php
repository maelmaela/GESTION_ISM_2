<?php
require_once __DIR__ . '/../repository/EtudiantRepository.php';
require_once __DIR__ . '/../../src/models/Etudiant.php';

class EtudiantService
{
    private EtudiantRepository $etudiantRepository;

    public function __construct()
    {
        $this->etudiantRepository = new EtudiantRepository();
    }

    public function addEtudiant(Etudiant $etudiant): int
    {
        return $this->etudiantRepository->insert($etudiant);
    }

    public function getEtudiants(?int $id = null, string $nom = "", int $offset = 0, int $size = 5): array
    {
        return $this->etudiantRepository->selectAll($id, $nom, $offset, $size);
    }

    public function searchEtudiantByMatricule(string $matricule): ?Etudiant
    {
        return $this->etudiantRepository->selectByMatricule($matricule);
    }
    public function getNbreEtudiant(): int {
        $repo = new EtudiantRepository();
        $total = $repo->getNombreTotalEtudiants();
        return $total;
    }
}