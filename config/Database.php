<?php
class Database{
    private static PDO|null $pdo=null;
    public static function connexion():void{
       try {
        $server = 'localhost:3306';
        $dbname = 'examen_s4_gestionism';
        $username = 'root';
        $password = '';
        $charset = 'utf8mb4';
        $chaineConnexion = "mysql:host=$server;dbname=$dbname;charset=$charset";
        if (self::$pdo==null) {
            self::$pdo = new PDO($chaineConnexion, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
       } catch (\PDOException $ex) {
            print $ex->getMessage()."\n";
       }
    }

    public static function getPdo():PDO{
        return self::$pdo;
    }
}
?>