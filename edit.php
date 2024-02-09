<?php
    require 'database.php';

    $id = $_POST["id"];
    $sql = "SELECT * FROM posts WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $params = ["id" => $id];
    $stmt->execute($params);

    // Fetch the desired row.
    $post = $stmt->fetch();


    $title = $post["title"];
    $body = $post["body"];

    $isUpdateOp = $_SERVER["REQUEST_METHOD"] === "POST" && $_POST["_method"] === "put";

    if($isUpdateOp){
        $title = htmlspecialchars($_POST["title"]);
        $body = htmlspecialchars($_POST["body"]);
        $id = htmlspecialchars($_POST["id"]);

        $sql = "UPDATE posts SET title = :title, body = :body WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $params = [
            "id" => $id,
            "title" => $title, 
            "body" => $body,
        ];

        $stmt->execute($params);
        header("Location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $title ?>"><br>
        <label for="body">Body</label>
        <input type="text" name="body" value="<?= $body ?>">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="<?= $post['id']  ?>">
        <button name="submit">Submit</button>
    </form>
</body>
</html>