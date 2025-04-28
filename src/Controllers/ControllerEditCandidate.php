<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Repository\CandidateRepository;
use App\Entity\Candidato;

class ControllerEditCandidate implements Controller
{
    public function __construct(private CandidateRepository $repository){}

    public function request(): void
    {
        $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
        if(!$id){
            header('Location: /?sucesso=0');
            exit();
        }

        $name = filter_input(INPUT_POST,"name");
        if(!$name){
            header('Location: /?sucesso=0');
            exit();
        }
        $idade = filter_input(INPUT_POST,"idade", FILTER_VALIDATE_INT);
        if(!$idade){
            header('Location: /?sucesso=0');
            exit();
        }
        $email = filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
        if(!$email){
            header('Location: /?sucesso=0');
            exit();
        }
        $phone = filter_input(INPUT_POST,"phone");
        $profAnterior = filter_input(INPUT_POST,"profAnterior");
        $description = filter_input(INPUT_POST,"description");
        $comment = filter_input(INPUT_POST,"comment");

        $candidato = new Candidato($name, $idade, $email, $phone, $profAnterior, $description, $comment);
        $candidato->setId($id);


        
        if($_FILES['photo']['error'] === UPLOAD_ERR_OK){
            $nomeArquivo = uniqid(). $_FILES['photo']['name'];
            move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                __DIR__ . '/../../public/arquivos/' .  $nomeArquivo

            );
            $candidato->setPhoto($nomeArquivo);
        }

        if($_FILES['curriculum']['error'] === UPLOAD_ERR_OK){
            $nomeArquivo = uniqid()."_".$_FILES['curriculum']['name'];
            move_uploaded_file(
                $_FILES['curriculum']['tmp_name'],
                __DIR__ . '/../../public/arquivos/' .  $nomeArquivo

            );
            $candidato->setCurriculum($nomeArquivo);
        }

        
        if(!$this->repository->update($candidato)){
            header('Location: /?sucesso=0');
        }else{
            header('Location: /?sucesso=1');
        }
    }
}