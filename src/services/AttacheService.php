<?php
require_once __DIR__ . '/../repository/AttacheRepository.php';
require_once __DIR__ . '/../../src/models/Attache.php';
class AttacheService
{
    private AttacheRepository $attacheRepository;
    public function __construct()
    {
        $this->attacheRepository = new AttacheRepository();
    }

}