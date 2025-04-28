<?php

namespace App\Repository;

use App\Entity\Candidato;
use PDO;

class CandidateRepository
{

    public function __construct(private PDO $pdo){}

    public function add(Candidato $candidato):bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO candidato ( name, idade, email, phone, prof_anterior, description, comment, curriculum, photo) VALUES(:name, :idade, :email, :phone, :prof_anterior, :description, :comment, :curriculum, :photo);");
        $stmt->bindParam(':name', $candidato->name);
        $stmt->bindParam(':idade', $candidato->idade);
        $stmt->bindParam(':email', $candidato->email);
        $stmt->bindParam(':phone', $candidato->phone);
        $stmt->bindParam(':prof_anterior', $candidato->profAnterior);
        $stmt->bindParam(':description', $candidato->description);
        $stmt->bindParam(':comment', $candidato->comment);
        $stmt->bindParam(':curriculum', $candidato->getCurriculum());
        $stmt->bindParam(':photo', $candidato->getPhoto());
        $result = $stmt->execute();

        $candidato->setId(intval($this->pdo->lastInsertId()));
        return $result;
    }
    
}