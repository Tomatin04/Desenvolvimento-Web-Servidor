<?php


declare(strict_types=1);

$pdo = new PDO("sqlite:" . __DIR__ . "/../../BD.sqlite");

$email = $argv[1];
$password = $argv[2];
$hash = password_hash($password, PASSWORD_ARGON2ID);

$sql = 'INSERT INTO users (email, password) VALUES (?, ?);';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $email);
$stmt->bindValue(2, $hash);
$stmt->execute();