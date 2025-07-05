<?php
require_once __DIR__ . '/../repository/ClasseRepository.php';
require_once __DIR__ . '/../../src/models/Classe.php';
class ClasseService
{
    private ClasseRepository $classeRepository;
    public function __construct()
    {
        $this->classeRepository = new ClasseRepository();
    }

    public function addClasse(Classe $classe):void
    {
        $this->classeRepository->insert($classe);
    }
    public function getClasses(?int $id = null, string $libelle = "", string $filiere = "", string $niveau = "", int $offset = 0, int $size = 5): array
        {
            return $this->classeRepository->selectAll($id, $libelle, $filiere, $niveau, $offset, $size);
        }
    public function searchClasseById(int $id):Classe|null
    {
        return $this->classeRepository->SelectById($id);
    }

    public function getNbreClasse(): int {
        $repo = new ClasseRepository();
        $total = $repo->getNombreTotalClasses();
        return $total;
    }
}