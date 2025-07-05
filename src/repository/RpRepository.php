<?php
require_once  __DIR__ ."/../../config/Database.php";
require_once  __DIR__ ."/../../src/models/Rp.php";
class RpRepository
{
    public function __construct()
    {
        Database::connexion();
    }

}