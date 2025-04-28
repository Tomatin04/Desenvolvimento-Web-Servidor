<?php

declare(strict_types= 1);

return [
    "GET|/login" => \App\Controllers\ControllerFormLogin::class,
    "GET|/" => \App\Controllers\ControllerListCandidate::class,
    "POST|/login" => \App\Controllers\ControllerLogin::class,
    "GET|/logout" => \App\Controllers\ControllerLogout::class,
    "GET|/novo-candidato" => \App\Controllers\ControllerFormCandidato::class,
    "POST|/novo-candidato" => \App\Controllers\ControllerInsertCandidate::class,
    

];