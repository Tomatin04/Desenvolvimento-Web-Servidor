<?php 

namespace App\Repository;

use PDO;

class UsersRepository
{
    public function __construct(private PDO $pdo){}

    public function find(string $email):?array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) return null;
        return $result;
    }
}