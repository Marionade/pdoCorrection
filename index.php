<?php

$pdo = new PDO('mysql:host=localhost;dbname=kaamelott', 'root', '');
$query = "SELECT id, title FROM story";
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
        <a href="story.php?id=<?= $story['id'] ?>">
            <h2><?= htmlentities($story['title']) ?></h2>
        </a>
    </div>
    <?php
}
?>
</body>
</html>
