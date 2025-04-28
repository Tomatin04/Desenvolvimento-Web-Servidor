<?php

namespace App\Service;

use App\Repository\UsersRepository;

class UserValidation 
{
    public function validation(string $email, string $password, \PDO $pdo)
    {
        $repository = new UsersRepository($pdo);
        $userInfo = $repository->find($email);
        if($userInfo !== null){
            $correctPassword = password_verify($password, $userData['password'] ?? '');
            if($correctPassword){
                $_SESSION['logado'] = true;
                header('Location: /');
                return ;
            }
        }
        header('Location: /login?error=0');
    }
}