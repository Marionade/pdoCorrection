<?php
if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['author'])) {
/*
    echo 'Title -> ' . htmlentities($_POST['title']) . '<br>';
    echo 'Content -> ' . htmlentities($_POST['content']) . '<br>';
    echo 'Author -> ' . htmlentities($_POST['author']) . '<br>';
*/

    $pdo = new PDO('mysql:host=localhost;dbname=kaamelott', 'root', '');

    $prepareQuery = "INSERT INTO story (title, content, author) 
                    VALUES (:title, :content, :author)";

    $statement = $pdo->prepare($prepareQuery);

    $statement->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
    $statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
    $statement->bindValue(':author', $_POST['author'], PDO::PARAM_STR);

    $success = $statement->execute();

    /*
    $query = "INSERT INTO story (title, content, author)
                VALUES ('". $_POST['title'] ."', '". $_POST['content'] ."', '". $_POST['author'] ."')";
    $pdo->exec($query);
 */
}
?>

<html>
<head>
    <title>Correction PDO</title>
</head>
<body>
<?php include 'navbar.html'?>
    <?php
        if (isset($success)) {
            if ($success) {
    ?>
                <div style="color:green">Les données sont enregistrées ! </div>
    <?php
            } else {
    ?>
                <div style="color:red">ERREUR !!!!</div>
                <?php
            }
        }
    ?>
    <form method="post">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="author" placeholder="author">
        <textarea name="content"></textarea>
        <button type="submit">envoyer</button>
    </form>
</body>
</html>
