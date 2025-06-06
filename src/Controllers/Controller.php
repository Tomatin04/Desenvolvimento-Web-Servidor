<?php

declare(strict_types=1);

namespace App\Controllers;

interface Controller 
{
    public function request(): void;
}