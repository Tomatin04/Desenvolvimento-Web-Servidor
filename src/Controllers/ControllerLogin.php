<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repository\UsersRepository;
use App\Service\UserValidation;

class ControllerLogin implements Controller
{

    private \PDO $pdo;

    public function __construct()
    {
        $path = __DIR__ . "/../../BD.sqlite";
        $this->pdo = new \PDO("sqlite:$path");
    }

    public function request(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        $userValidation = new UserValidation();
        $userValidation->validation($email, $password, $this->pdo);
    }
}