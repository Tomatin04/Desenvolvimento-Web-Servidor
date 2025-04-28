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
        $stmt->bindValue(':id', $candidato->id, \PDO::PARAM_INT);
        $stmt->bindValue(':name', $candidato->name);
        $stmt->bindValue(':idade', $candidato->idade);
        $stmt->bindValue(':email', $candidato->email);
        $stmt->bindValue(':phone', $candidato->phone);
        $stmt->bindValue(':prof_anterior', $candidato->profAnterior);
        $stmt->bindValue(':description', $candidato->description);
        $stmt->bindValue(':comment', $candidato->comment);
        if($candidato->getCurriculum() !== null) $stmt->bindValue(':curriculum', $candidato->getCurriculum());
        if($candidato->getPhoto() !== null) $stmt->bindValue(':photo', $candidato->getPhoto());
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM candidate WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    /** @return Candidato[] */
    public function findAll():array
    {
        return array_map(function (array $candidatos){
            return $this->hydrate($candidatos);   
        }, $this->pdo->query("SELECT * FROM candidate;")
        ->fetchAll(\PDO::FETCH_ASSOC)
        );
    }

    public function find(int $id): ?Candidato
    {
        $stmt = $this->pdo->prepare("SELECT * FROM candidate WHERE id = :id;");
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $this->hydrate($stmt->fetch(\PDO::FETCH_ASSOC));
    }

    public function removePhoto(int $id):bool
    {
        $stmt = $this->pdo->prepare("UPDATE candidate SET photo = null WHERE id = :id;");
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function findFiles(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT curriculum, photo FROM candidate WHERE id = :id");
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function hydrate(array $candidatoData): Candidato
    {
        $candidato = new Candidato($candidatoData['name'], $candidatoData['idade'], $candidatoData['email'], $candidatoData['phone'], $candidatoData['prof_anterior'], $candidatoData['description'], $candidatoData['comment']);
        $candidato->setId(intval($candidatoData['id']));
        if($candidatoData['photo'] !== null) $candidato->setPhoto($candidatoData['photo']);
        if($candidatoData['curriculum'] !== null) $candidato->setCurriculum($candidatoData['curriculum']);
        return $candidato;
    }
    
}