<?php

declare(strict_types=1);



$host     = 'localhost';
$database = 'pastorco_fgck_joyland';
$username = '';
$password = '';

$charset = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$database};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {

    $pdo = new PDO(
        $dsn,
        $username,
        $password,
        $options
    );

} catch (PDOException $e) {

    exit(
        'Database connection failed. Please check the database configuration.'
    );
}