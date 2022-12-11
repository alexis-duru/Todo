<?php 

include './layout/header.php';
include './layout/footer.php';
include './database/database.php';

$query = $database->query('SELECT * FROM todo ORDER BY id DESC');

$todos = $query->fetchAll();

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
            <a href="create.php">Ajouter un élèment à la todo-list</a>
        </div>
    
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
    </section>
</body>
</html>

