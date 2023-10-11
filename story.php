<?php

if (!isset($_GET['id'])) {
    require_once '404.html';
    die();
}

$id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=kaamelott', 'root', '');

$query = "SELECT title, content, author FROM story WHERE id = :id";

$statement = $pdo->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$story = $statement->fetch();

$title = htmlentities($story['title']);
$content = htmlentities($story['content']);
$author = htmlentities($story['author']);
?>
<html>
<head>
    <title>COURS PDO - <?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>
    <span><?= $author ?></span>
    <p><?= $content ?></p>
</body>
</html>



