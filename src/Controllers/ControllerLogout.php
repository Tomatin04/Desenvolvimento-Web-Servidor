<?php

declare(strict_types=1);

namespace App\Controllers;

class ControllerLogout implements Controller
{
    public function request(): void
    {
        session_destroy();
        header("Location: \login");
    }
}