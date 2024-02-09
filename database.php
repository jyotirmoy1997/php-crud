<?php

    // Database Credentials
    $host = 'localhost';
    $port = 3306;
    $dbName = 'blog';
    $username = 'joe';
    $password = '12345';

    // DSN : The string that holds the info about database connection
    $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Connection Failed...' . $e->getMessage();
    }
?>