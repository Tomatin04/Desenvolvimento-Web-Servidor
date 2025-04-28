<?php 
declare(strict_types= 1);
namespace App\Entity;

class Candidato
{
    public readonly int $id;
    private ?string $curriculum = null;
    private ?string $photo = null;

    public function __construct(
        public readonly string $name,
        public readonly int $idade,
        public readonly string $email,
        public readonly ?string $phone,
        public readonly ?string $profAnterior = null,
        public readonly ?string $description = null,
        public readonly ?string $comment = null
    ){}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setCurriculum(?string $curriculum){
        $this->curriculum = $curriculum;
    }

    public function setPhoto(?string $photo){
        $this->photo = $photo;
    }

    public function getCurriculum():?string
    {
        return $this->curriculum;
    }

    public function getPhoto():?string
    {
        return $this->photo;
    }

}