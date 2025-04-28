<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Repository\CandidateRepository;
use App\Service\RemoveFilesCandidato;

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
        $filesRemove = new RemoveFilesCandidato();
        $filesRemove->removeFiles($id, $this->repository);

        if(!$this->repository->delete($id)){
            header('Location: /?sucesso=0');
        }else{
            header('Location: /?sucesso=1');
        }
    }
}