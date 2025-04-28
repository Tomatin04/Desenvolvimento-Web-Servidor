<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Repository\CandidateRepository;
use App\Entity\Candidato;

class ControllerFormCandidato implements Controller
{
    public function __construct(private CandidateRepository $repository){}

    public function request(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var Candidato $candidato */
        $candidato = null;
        if($id!==false && $id!==null){
            $candidato = $this->repository->find($id);
        }
        require_once __DIR__ . "/../Views/view-form.php";
    }
}