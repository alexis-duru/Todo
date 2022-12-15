<?php 

require_once './database/database.php';

if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['content'])) {

    if (!empty($_POST['name']) && !empty($_POST['content'])) {

        $title = strip_tags($_POST['name']);
        $content = strip_tags($_POST['content']);

        $query = $database->prepare('INSERT INTO todo (name, content) VALUES (:name, :content)');

        $query->execute([
            'name' => $title,
            'content' => $content
        ]);

        header('Location: ./index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Todo List - Create</title>
</head>
<body>
    <h1>Create</h1>
    <form action="" method="POST">
        <label for="title">Titre</label>
        <input type="text" name="name" id="name">
        <label for="content">Détails</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
