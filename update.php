<?php 

include './database/database.php';

if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['content'])) {

    if (!empty($_POST['name']) && !empty($_POST['content'])) {

        $title = strip_tags($_POST['name']);
        $content = strip_tags($_POST['content']);

        $query = $database->prepare('UPDATE todo SET name = :name, content = :content WHERE id = :id');

        $query->execute([
            'name' => $title,
            'content' => $content,
            'id' => $_GET['id']
        ]);

        header('Location: ./index.php');
    }
}

if (!empty($_GET['id'])) {

    $query = $database->prepare('SELECT * FROM todo WHERE id = :id');

    $query->execute([
        'id' => $_GET['id']
    ]);

    $todo = $query->fetch();

    if (!empty($todo)) {

        $name = $todo['name'];
        $content = $todo['content'];

    } else {

        header('Location: ./index.php');
    }

} else {

    header('Location: ./index.php');
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
        <label for="title">Titre</label>
        <input type="text" name="name" id="name" value="<?= $name ?>">
        <label for="content">Détails</label>
        <textarea name="content" id="content" cols="30" rows="10"><?= $content ?></textarea>
        <button type="submit">Modifier</button>
    </form>
</body>

</html>

