<!-- Suppression d'une données de la TODOLIST -->

<?php

include './database/database.php';

if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $query = $database->prepare('DELETE FROM todo WHERE id = :id');

    $query->execute([
        'id' => $id
    ]);

    header('Location: ./index.php');
}
?>

