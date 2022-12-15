<?php 

require_once './database/database.php';

    if (!empty($_POST['name']) && !empty($_POST['content'])) {

        $title = filter_var(strip_tags($_POST['name']), FILTER_SANITIZE_STRING);
        $content = filter_var(strip_tags($_POST['content']), FILTER_SANITIZE_STRING);

        $query = $database->prepare('INSERT INTO todo (name, content) VALUES (:name, :content)');

        $query->bindParam(':name', $title, PDO::PARAM_STR);  
        $query->bindParam(':content', $content, PDO::PARAM_STR);
        $query->execute();

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
    <title>Todo List - Create</title>
</head>
<body>
    <p>Create</p>
    <form action="" method="POST">
        <label for="title">Titre</label>
        <input type="text" name="name" id="name" required minlength="1"  maxlength="30">
        <label for="content">Détails</label>
        <textarea name="content" id="content" cols="30" rows="10" required minlength="1" maxlength="50"></textarea>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
