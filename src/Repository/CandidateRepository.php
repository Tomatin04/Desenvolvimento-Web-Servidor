<?php

namespace App\Repository;

use App\Entity\Candidato;
use PDO;

class CandidateRepository
{

    public function __construct(private PDO $pdo){}

    public function add(Candidato $candidato):bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO candidate ( name, idade, email, phone, prof_anterior, description, comment, curriculum, photo) VALUES(:name, :idade, :email, :phone, :prof_anterior, :description, :comment, :curriculum, :photo);");
        $stmt->bindValue(':name', $candidato->name);
        $stmt->bindValue(':idade', $candidato->idade);
        $stmt->bindValue(':email', $candidato->email);
        $stmt->bindValue(':phone', $candidato->phone);
        $stmt->bindValue(':prof_anterior', $candidato->profAnterior);
        $stmt->bindValue(':description', $candidato->description);
        $stmt->bindValue(':comment', $candidato->comment);
        $stmt->bindValue(':curriculum', $candidato->getCurriculum());
        $stmt->bindValue(':photo', $candidato->getPhoto());
        $result = $stmt->execute();

        $candidato->setId(intval($this->pdo->lastInsertId()));
        return $result;
    }



    public function update(Candidato $candidato):bool
    {
        $updatePhoto = '';
        $updateCurriculum = '';
        if ($candidato->getPhoto() !== null) $updatePhoto = ', photo = :photo';
        if ($candidato->getCurriculum() !== null) $updateCurriculum = ', curriculum = :curriculum';

        $stmt = $this->pdo->prepare("UPDATE candidate SET 
            name = :name, idade = :idade, email = :email, phone = :phone, prof_anterior = :prof_anterior
            , description = :description, comment = :comment $updateCurriculum $updatePhoto 
            WHERE id = :id;");
        $stmt->bindParam(':id', $candidato->id, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $candidato->name);
        $stmt->bindParam(':idade', $candidato->idade);
        $stmt->bindParam(':email', $candidato->email);
        $stmt->bindParam(':phone', $candidato->phone);
        $stmt->bindParam(':prof_anterior', $candidato->profAnterior);
        $stmt->bindParam(':description', $candidato->description);
        $stmt->bindParam(':comment', $candidato->comment);
        if($candidato->getCurriculum() !== null) $stmt->bindParam(':curriculum', $candidato->getCurriculum());
        if($candidato->getPhoto() !== null) $stmt->bindParam(':photo', $candidato->getPhoto());
        return $stmt->execute();
    }
    
}