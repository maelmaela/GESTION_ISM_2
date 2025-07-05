<?php
class Etudiant{
    private int $id;
    private string $nom;
    private string $matricule;
    private string $adresse;
    private string $telephone;
    private string $sexe;
    private string $classe;
    private $nomClasse;

    public function setNomClasse($nomClasse) {
    $this->nomClasse = $nomClasse;
    }

    public function getNomClasse() {
        return $this->nomClasse;
    }

    public function __construct(int $id, string $nom, string $matricule, string $adresse, string $telephone,string $sexe, string $classe) {
        $this->id = $id;
        $this->nom = $nom;
        $this->matricule = $matricule;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->sexe = $sexe;
        $this->classe = $classe;
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
    public function getMatricule(): string {
        return $this->matricule;
    }
    public function setSexe(string $sexe): void {
        $this->sexe = $sexe;
    }
    public function getSexe(): string {
        return $this->sexe;
    }
    public function setMatricule(string $matricule): void {
        $this->matricule = $matricule;
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
    public function getClasse(): string {
        return $this->classe;
    }
    public function setClasse(string $classe): void {
        $this->classe = $classe;
    }
    public function __toString(): string {
        return "ID: {$this->id}, Nom: {$this->nom}, Matricule: {$this->matricule}, Adresse: {$this->adresse}, Telephone: {$this->telephone}, ID Classe: {$this->classe}";
    }
    public static function of(array $row): Etudiant {
        $etudiant = new Etudiant(
            (int)$row['id'],
            $row['nom'],
            $row['matricule'],
            $row['adresse'],
            $row['telephone'],
            $row['sexe'],
            (int)$row['id_classe']
        );
        $etudiant->setNomClasse($row['nom_classe'] ?? '');
        return $etudiant;
    }
    public function toArray(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'matricule' => $this->matricule,
            'adresse' => $this->adresse,
            'telephone' => $this->telephone,
            'id_classe' => $this->classe
        ];
    }

}