<?php
require_once __DIR__ . '/../repository/RpRepository.php';
require_once __DIR__ . '/../../src/models/Rp.php';
class RpService
{
    private RpRepository $rpRepository;
    public function __construct()
    {
        $this->rpRepository = new RpRepository();
    }

  
}