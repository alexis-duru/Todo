<?php 

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
