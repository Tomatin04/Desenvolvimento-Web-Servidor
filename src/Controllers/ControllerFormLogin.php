<?php
declare(strict_types=1);

namespace App\Controllers;

class ControllerFormLogin implements Controller
{

    public function request(): void
    {
        if(array_key_exists('login_on', $_SESSION) && $_SESSION['login_on'] === true){
            header('Location: /');  
            return ;
        }
        require_once __DIR__ . '/../Views/view-login.php';
    }
}
    