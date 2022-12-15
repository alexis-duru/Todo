<?php
    try {
        $database = new PDO('mysql:host=localhost;dbname=todos;charset=utf8',
        'root',
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (\Throwable $th) {
        echo 'Connexion à la base de données a échoué';
    }
?>