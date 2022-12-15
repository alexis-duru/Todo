<?php 

require_once './layout/header.php';
require_once './database/database.php';

    $query = $database->query('SELECT * FROM todo ORDER BY id DESC');

    $todos = $query->fetchAll();
?>

<?php 

if (!empty($_POST['search'])) {
    $search = filter_var(strip_tags($_POST['search']), FILTER_SANITIZE_STRING);

    $query = $database->prepare('SELECT * FROM todo WHERE name LIKE :search');
    $query->bindParam(':search', $search, PDO::PARAM_STR);
    $query->execute();

    $todos = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    $query = $database->prepare('SELECT * FROM todo');
    $query->execute();

    $todos = $query->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['reset'])) {
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
    <title>Todo List - Index</title>
</head>

<body>
    <section>
        <div class="title">
            <h1>Todo List</h1>
            <a class="submit-button" href="create.php">Ajouter un élèment à la todo-list</a>
        </div>

        <?php include('./layout/filter.php') ?>
    
        <?php foreach ($todos as $todo) : ?>
            <div class="todo">
                <table>
                    <tr>
                        <td>
                            <?php if ($todo['done'] == 0) : ?>
                                <h2><?= $todo['name'] ?></h2>
                            <?php else : ?>
                                <h2 style="text-decoration: line-through;"><?= $todo['name'] ?></h2>
                            <?php endif; ?>

                            <?php if ($todo['done'] == 0) : ?>
                                <p class="todo__element"><?= $todo['content'] ?></p>
                            <?php else : ?>
                                <p class="todo__element" style="text-decoration: line-through;"><?= $todo['content'] ?></p>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="wrapper_todos_task">
                                <a href="update.php?id=<?= $todo['id'] ?>">Modifier</a>
                                <a href="delete.php?id=<?= $todo['id'] ?>">Supprimer</a>
                                <a href="update_status.php?id=<?= $todo['id'] ?>">Terminer</a>
                            </div>

                            <div class="wrapper_status">
                                <?php if ($todo['done'] == 0) : ?>
                                    <p>Status :</p><p class="status" style="color: red;">À faire</p>
                                <?php else : ?>
                                    <p>Status :</p><p class="status" style="color: green;">Terminée</p>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
        
        <?php include './layout/pagination.php' ?>

    </section>
</body>
</html>


