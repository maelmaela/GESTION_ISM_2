<?php
class Connexion{
    private int $id;
    private string $nomComplet;
    private string $password;
    private string $role;

    public function getId():int{
        return $this->id;
    }
    public function setId(int $id):void{
        $this->id = $id;
    }
    public function getNomComplet():string{
        return $this->nomComplet;
    }
    public function setNomComplet(string $nomComplet):void{
        $this->nomComplet = $nomComplet;
    }
    public function getPassword():string{
        return $this->password;
    }
    public function setPassword(string $password):void{
        $this->password = $password;
    }
    public function getRole():string{
        return $this->role;
    }
    public function setRole(string $role):void{
        $this->role = $role;
    }
    public static function of($row):Connexion{
        $connexion = new Connexion();
        $connexion->setId($row['id']);
        $connexion->setNomComplet($row['nom']);
        $connexion->setPassword($row['password']);
        $connexion->setRole($row['role']);
        return $connexion;
    }

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'nomComplet' => $this->getNomComplet(),
            'password' => $this->getPassword(),
            'role' => $this->getRole()
        ];
    }
}
?>