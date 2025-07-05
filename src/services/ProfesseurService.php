<?php
require_once __DIR__ . '/../repository/ProfesseurRepository.php';
require_once __DIR__ . '/../../src/models/Professeur.php';
class ProfesseurService{
    private ProfesseurRepository $professeurRepository;
    public function __construct()
    {
        $this->professeurRepository = new ProfesseurRepository();
    }

    public function addProfesseur(Professeur $professeur):void
    {
        $this->professeurRepository->insert($professeur);
    }
    public function getProfesseurs(?int $id = null, string $nom = "", int $offset = 0, int $size = 5): array {
        return $this->professeurRepository->selectAll($id, $nom, $offset, $size);
    }
    public function searchProfesseurById(int $id):Professeur|null
    {
        return $this->professeurRepository->SelectById($id);
    }

    public function getNbreProfesseur(): int {
        $repo = new ProfesseurRepository();
        $total = $repo->getNombreTotalProfesseurs();
        return $total;
    }
}