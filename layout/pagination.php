<?php

require_once './database/database.php';

$query = $database->prepare('SELECT * FROM todo LIMIT 5');

$query->execute();

$todos = $query->fetchAll(PDO::FETCH_ASSOC);

$page = 1;

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int) strip_tags($_GET['page']);
}

$limit = 3;

$offset = ($page - 1) * $limit;

$query = $database->prepare('SELECT * FROM todo LIMIT :limit OFFSET :offset');

$query->bindValue(':limit', $limit, PDO::PARAM_INT);

$query->bindValue(':offset', $offset, PDO::PARAM_INT);

$query->execute();

$todos = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $database->query('SELECT COUNT(*) FROM todo');

$nbTodos = (int) $query->fetchColumn();

$pages = ceil($nbTodos / $limit)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
</head>
<body>
    <div class="pagination">
        <p>Page : </p>
        <?php for ($page = 1; $page <= $pages; $page++) : ?>
            <a href="index.php?page=<?= $page ?>"><?= $page ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>

