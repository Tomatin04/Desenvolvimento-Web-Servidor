<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Repository\CandidateRepository;

class ControllerDeleteCandidate implements Controller
{
    public function __construct(private CandidateRepository $repository){}

    public function request(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if(!$id || is_null($id)){
            header('Location: /?sucesso=0');
            exit();
        }

        if(!$this->repository->delete($id)){
            header('Location: /?sucesso=0');
        }else{
            header('Location: /?sucesso=1');
        }
    }
}