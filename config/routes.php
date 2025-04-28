<?php

declare(strict_types= 1);

return [
    "GET|/login" => \App\Controllers\ControllerFormLogin::class,
    "GET|/" => \App\Controllers\ControllerListCandidate::class,
    "POST|/login" => \App\Controllers\ControllerLogin::class,
    "GET|/logout" => \App\Controllers\ControllerLogout::class,
    "GET|/novo-candidato" => \App\Controllers\ControllerFormCandidato::class,
    "POST|/novo-candidato" => \App\Controllers\ControllerInsertCandidate::class,
    "GET|/editar-candidato" => \App\Controllers\ControllerFormCandidato::class,
    "POST|/editar-candidato" => \App\Controllers\ControllerEditCandidate::class,
    "GET|/remove-candidato" => \App\Controllers\ControllerDeleteCandidate::class,
    "GET|/rphoto-candidato" => \App\Controllers\ControllerRPhotoCandidate::class,
    "GET|/info-candidato" => \App\Controllers\ControllerInfoCandidato::class,
];