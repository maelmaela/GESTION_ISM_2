<?php
class Inscription{
    private int $id;
    private int $idEtudiant;
    private string $classe;
    private string $etat;
    private string $dateInscription;

    public function __construct(int $id, int $idEtudiant, string $idClasse, string $etat, string $dateInscription) {
        $this->id = $id;
        $this->idEtudiant = $idEtudiant;
        $this->classe = $idClasse;
        $this->etat = $etat;
        $this->dateInscription = $dateInscription;
    }   
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getIdEtudiant(): int {
        return $this->idEtudiant;
    }
    public function setIdEtudiant(int $idEtudiant): void {
        $this->idEtudiant = $idEtudiant;
    }
    public function getClasse(): string {
        return $this->classe;
    }
    public function setClasse(string $idClasse): void {
        $this->classe = $idClasse;
    }
    public function getEtat(): string {
        return $this->etat;
    }
    public function setEtat(string $etat): void {
        $this->etat = $etat;
    }
    public function getDateInscription(): string {
        return $this->dateInscription;
    }
    public function setDateInscription(string $dateInscription): void {
        $this->dateInscription = $dateInscription;
    }
    public function __toString(): string {
        return "ID: {$this->id}, ID Etudiant: {$this->idEtudiant}, ID Classe: {$this->classe}, Etat: {$this->etat}, Date Inscription: {$this->dateInscription}";
    }
    public static function of(array $row): Inscription {
        return new Inscription(
            (int)$row['id'],
            (int)$row['id_etudiant'],
            (int)$row['id_classe'],
            $row['etat'],
            $row['date_inscription']
        );
    }
    public function toArray(): array {
        return [
            'id' => $this->id,
            'id_etudiant' => $this->idEtudiant,
            'id_classe' => $this->classe,
            'etat' => $this->etat,
            'date_inscription' => $this->dateInscription
        ];
    }
}
?>