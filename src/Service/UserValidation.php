<?php

namespace App\Service;

use App\Repository\UsersRepository;

class UserValidation 
{
    public function validation(string $email, string $password, \PDO $pdo)
    {
        $repository = new UsersRepository($pdo);
        $userInfo = $repository->find($email);
        if(is_array($userInfo)){
            $correctPassword = password_verify($password, $userInfo['password'] ?? '');
            if($correctPassword){
                $_SESSION['login_on'] = true;
                header('Location: /');
                return ;
            }
        }
        header('Location: /login?error=0');
    }
}