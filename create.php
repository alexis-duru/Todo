<?php 

include './database/database.php';

if (!empty($_POST)) {

    if (!empty($_POST['name']) && !empty($_POST['content'])) {

        $title = htmlspecialchars($_POST['name']);
        $content = htmlspecialchars($_POST['content']);
 
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
    <p>Create</p>
    <form action="" method="POST">
        <label for="title">Title</label>
        <input type="text" name="name" id="name">
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <button type="submit">Create</button>
    </form>
</body>
</html>
