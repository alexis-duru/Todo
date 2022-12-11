<?php 

// Le fichier update_status.php récupérera l'id de la todo à modifier en GET, et modifiera le status de la todo correspondante en BDD

// On commence par inclure le fichier de connexion à la BDD
include './database/database.php';

if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $query = $database->prepare('UPDATE todo SET done = 1 WHERE id = :id');

    $query->execute([
        'id' => $id
    ]);

    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Update Status</title>
</head>
<body>
    <p>Update Status</p>
</body>
</html>
