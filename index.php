<?php

$pdo = new PDO('mysql:host=localhost;dbname=kaamelott', 'root', '');
$query = "SELECT title, content, author FROM story";
$statement = $pdo->query($query);

$stories = $statement->fetchAll();
//
//echo "<pre>";
//var_dump($stories);
//echo "</pre>";

?>

<html>
<head>
    <title>Cours PDO</title>
</head>
<body>
<?php include 'navbar.html'?>
<?php
foreach ($stories as $story) {
    ?>
    <div>
        <h2><?= htmlentities($story['title']) ?></h2>
        <a href="story.php?title='<?= $story['title'] ?>'">LINK</a>
        <span><?= htmlentities($story['author']) ?></span>
        <p><?= htmlentities($story['content']) ?></p>
    </div>
    <?php
}
?>
</body>
</html>
