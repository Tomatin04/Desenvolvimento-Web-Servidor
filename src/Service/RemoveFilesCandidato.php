<?php

namespace App\Service;

use App\Repository\CandidateRepository;

class RemoveFilesCandidato
{
    public function removeFiles(int $id, CandidateRepository $repository): void
    {
        $files = $repository->findFiles($id);
        if($files['curriculum'] !== null && !unlink(__DIR__ . "/../../public/arquivos/" . $files['curriculum'])){
            header('Location: /?sucesso=0');
            exit();
        }
        if($files['photo'] !== null && !unlink(__DIR__ ."/../../public/arquivos/" . $files['photo'])){
            header('Location: /?sucesso=0');
            exit();
        }
    }
}