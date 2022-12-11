<?php
    $database = new PDO('mysql:host=localhost;dbname=todos;charset=utf8',
    'root',
    'root',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    // echo 'Connexion à la base de données réussie';
?>