<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\CandidateRepository;

class ControllerListCandidate implements Controller
{
    private CandidateRepository $repository;
    
    public function __construct(CandidateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function request(): void
    {
        $candidatos = $this->repository->findAll();
        require_once __DIR__ . "/../Views/view-list.php";
    }
}