<?php
class Module{
    private int $id;
    private string $libelle;
    /** @var Prof[] */
    private array $profs;

    public function __construct(?string $id = null,?string $libelle) {
        $this->id = $id ?? uniqid(); 
        $this->libelle = $libelle;
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
    public function getProfs():array{
        return $this->profs;
    }
    public function setProfs(array $profs):void{
        $this->profs = $profs;
    }
    public function __toString()
    {
        return "ID :".$this->id."\n Libelle :".$this->libelle;
    }
    public static function of(array $row): Module {
        return new Module((int)$row['id'], $row['libelle']);
    }
}