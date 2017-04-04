<?php
    $host = "localhost";
    $user = "0405993209";
    $pass = "realshit";
    $db = "0405993209_example";
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if (isset($_GET["q"])) {
        $sql = $_GET["q"];
    }
    else
    {
        $sql = "SELECT * FROM mytable";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo json_encode($result);
?>