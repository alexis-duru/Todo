<?php 

include './database/database.php';

if (!empty($_POST)) {

    if (!empty($_POST['name']) && !empty($_POST['content'])) {

        $title = htmlspecialchars($_POST['name']);
        $content = htmlspecialchars($_POST['content']);
        $id = htmlspecialchars($_POST['id']);

        $query = $database->prepare('UPDATE todo SET name = :name, content = :content WHERE id = :id');

        $query->execute([
            'name' => $title,
            'content' => $content,
            'id' => $id
        ]);

        header('Location: ./index.php');
    }
}

if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $query = $database->prepare('SELECT * FROM todo WHERE id = :id');

    $query->execute([
        'id' => $id
    ]);

    $todo = $query->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Todo List - Update</title>
</head>
<body>
    <p>Modifier</p>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
        <label for="title">Titre</label>
        <input type="text" name="name" id="name" value="<?= $todo['name'] ?>">
        <label for="content">Détails</label>
        <textarea name="content" id="content" cols="30" rows="10"><?= $todo['content'] ?></textarea>
        <button type="submit">Modifier</button>
    </form>
</body>

</html>

