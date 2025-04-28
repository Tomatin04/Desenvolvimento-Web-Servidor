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
        require_once __DIR__ . "/../../views/view-list.php";
    }
}