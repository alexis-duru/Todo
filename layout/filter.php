<?php 

require_once './database/database.php';

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
    <title>Filtre de recherche</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="search" id="search">
        <button type="submit">Rechercher</button>
        <button type="submit" name="reset">Réinitialiser</button>
    </form>
</body>
</html>