<?php
require_once  __DIR__ ."/../../config/Database.php";
require_once  __DIR__ ."/../../src/models/Attache.php";
class AttacheRepository
{
    public function __construct()
    {
        Database::connexion();
    }

}