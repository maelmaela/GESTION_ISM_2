<?php
class Demande {
    private int $id;
    private string $motif;
    private string $etat;
    private int $etudiantId;
    private int $inscriptionId;
    private ?Etudiant $etudiant = null; 
    private ?string $nomEtudiant = null; 

    public function __construct(int $id, string $motif, string $etat, int $etudiantId, int $inscriptionId) {
        $this->id = $id;
        $this->motif = $motif;
        $this->etat = $etat;
        $this->etudiantId = $etudiantId;
        $this->inscriptionId = $inscriptionId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getMotif(): string {
        return $this->motif;
    }

    public function setMotif(string $motif): void {
        $this->motif = $motif;
    }

    public function getEtat(): string {
        return $this->etat;
    }

    public function setEtat(string $etat): void {
        $this->etat = $etat;
    }

    public function getEtudiantId(): int {
        return $this->etudiantId;
    }

    public function setEtudiantId(int $id): void {
        $this->etudiantId = $id;
    }

    public function getInscriptionId(): int {
        return $this->inscriptionId;
    }

    public function setInscriptionId(int $id): void {
        $this->inscriptionId = $id;
    }

    public function setEtudiant(?Etudiant $etudiant): void {
        $this->etudiant = $etudiant;
    }

    public function getEtudiant(): ?Etudiant {
        return $this->etudiant;
    }

    public function setNomEtudiant(?string $nom): void {
        $this->nomEtudiant = $nom;
    }

    public function getNomEtudiant(): ?string {
        return $this->nomEtudiant;
    }

    public static function of(array $row): Demande {
        $demande = new Demande(
            (int)$row['id'],
            $row['motif'],
            $row['etat'],
            (int)$row['etudiant_id'],
            (int)$row['inscription_id']
        );
        if (isset($row['nom_etudiant'])) {
            $demande->setNomEtudiant($row['nom_etudiant']);
        }
        return $demande;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'motif' => $this->motif,
            'etat' => $this->etat,
            'etudiant_id' => $this->etudiantId,
            'inscription_id' => $this->inscriptionId
        ];
    }

    public function __toString(): string {
        return "ID: {$this->id}, Motif: {$this->motif}, État: {$this->etat}, Étudiant ID: {$this->etudiantId}, Inscription ID: {$this->inscriptionId}";
    }
}