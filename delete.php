<?php

include './database/database.php';

if (!empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);

    $query = $database->prepare('DELETE FROM todo WHERE id = :id');

    $query->execute([
        'id' => $id
    ]);

    header('Location: ./index.php');
}
?>

