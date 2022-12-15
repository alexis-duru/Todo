<?php 

require_once './database/database.php';

    if (!empty($_POST) && !empty($_POST['name']) && !empty($_POST['content'])) {

        if (!empty($_POST['name']) && !empty($_POST['content'])) {
    
            $title = filter_var(strip_tags($_POST['name']), FILTER_SANITIZE_STRING);
            $content = filter_var(strip_tags($_POST['content']), FILTER_SANITIZE_STRING);
    
            $query = $database->prepare('UPDATE todo SET name = :name, content = :content WHERE id = :id');

            $query->bindParam(':name', $title, PDO::PARAM_STR);  
            $query->bindParam(':content', $content, PDO::PARAM_STR);
            $query->bindParam(':id', $_GET['id']);
            $query->execute();
    
            header('Location: ./index.php');
        }
    }
    
    if (!empty($_GET['id'])) {
    
        $query = $database->prepare('SELECT * FROM todo WHERE id = :id');

        $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $query->execute();
    
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
    <h1>Modifier</h1>
    <form action="" method="POST">
        <label for="title">Titre</label>
        <input type="text" name="name" id="name" value="<?= $name ?>" required minlength="1"  maxlength="30">
        <label for="content">Détails</label>
        <textarea name="content" id="content" required cols="30" rows="10" required minlength="1"  maxlength="50"><?= $content ?></textarea>
        <button type="submit">Modifier</button>
    </form>
</body>

</html>

