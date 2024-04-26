<?php

function connectDB(): PDO
{
    try {

        $host = "localhost";
        $databaseName = "dauphineexam";
        $username = "root";
        $password = "";

        $pdo = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $databaseName . ";charset=utf8", $username, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {

        echo ("Connexion non établie : " .  $e->getMessage());

        exit();
    }
}

function configPdo(PDO $pdo): void
{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
