<?php
class Professeur{
    private int $id;
    private string $nom;
    private string $adresse;
    private string $telephone;
    private string $grade;
    private array $modules=[];
    private array $classes=[];

    public function __construct(int $id, string $nom, string $adresse, string $telephone, string $grade, array $modules=[],array $classes=[]) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->grade = $grade;
        $this->modules = $modules;
        $this->classes = $classes;
    }
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getNom(): string {
        return $this->nom;
    }
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }
    public function getAdresse(): string {
        return $this->adresse;
    }
    public function setAdresse(string $adresse): void {
        $this->adresse = $adresse;
    }
    public function getTelephone(): string {
        return $this->telephone;
    }
    public function setTelephone(string $telephone): void {
        $this->telephone = $telephone;
    }
    public function getGrade(): string {
        return $this->grade;
    }
    public function setGrade(string $grade): void {
        $this->grade = $grade;
    }
    public function getModules(): array {
        return $this->modules;
    }
    public function setModules(array $modules): void {
        $this->modules = $modules;
    }
    public function getClasses(): array {
        return $this->classes;
    }
    public function setClasse(array $classes): void {
        $this->classes = $classes;
    }
    public function addModuleToProf(Module $module):void{
        $this->modules[] = $module;
    }
    public function addClasseToProf(Classe $classe):void{
        $this->classes[] = $classe;
    }
    public function __toString(): string {
        return "ID: " . $this->id . "\nNom: " . $this->nom . "\nAdresse: " . $this->adresse . "\nTéléphone: " . $this->telephone . "\nGrade: " . $this->grade;
    }
    public static function of(array $row): Professeur {
        $professeur = new Professeur((int)$row['id'], $row['nom'], $row['adresse'], $row['telephone'], $row['grade'],explode(",",$row['module']),explode(",",$row['classe']));
        return $professeur;
    }
}
?>