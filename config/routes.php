<?php

declare(strict_types= 1);

return [
    "GET|/login" => \App\Controllers\ControllerFormLogin::class,
    "GET|/" => \App\Controllers\ControllerListCandidate::class,
];