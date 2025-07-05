<?php
class Classe{
    private int $id;
    private string $libelle;
    private string $filiere;
    private string $niveau;
    private ?int $idAttache;
    
    public function __construct(int $id, string $libelle, string $filiere, string $niveau, ?int $idAttache = null) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->filiere = $filiere;
        $this->niveau = $niveau;
        $this->idAttache = $idAttache;
    }



    public function getId():int{
        return $this->id;
    }

    public function setId(int $id):void{
        $this->id = $id;
    }

    public function getLibelle():string{
        return $this->libelle;
    }

    public function setLibelle(string $libelle):void{
        $this->libelle = $libelle;
    }

    public function getFiliere():string{
        return $this->filiere;
    }

    public function setFiliere(string $filiere):void{
        $this->filiere = $filiere;
    }

    public function getNiveau():string{
        return $this->niveau;
    }

    public function setNiveau(string $niveau):void{
        $this->niveau = $niveau;
    }


    public function __toString(){
        return "ID :".$this->id."\n Libelle :".$this->libelle."\n Filiere".$this->filiere."\n Niveau :".$this->niveau;
    }

    public static function of(array $row): self {
    return new self(
        (int) $row['id'],
        $row['libelle'],
        $row['filiere'],
        $row['niveau'],
        isset($row['attache_id']) ? (int) $row['attache_id'] : null
    );
    }
    public static function fromArray(array $data): self {
    return new self(
        $data['id'],
        $data['libelle'],
        $data['filiere'],
        $data['niveau'],
    );
}
}
?>