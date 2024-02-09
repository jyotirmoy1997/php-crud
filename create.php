<?php 
    require 'database.php';

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])){
        $title = htmlspecialchars($_POST["title"]);
        $body = htmlspecialchars($_POST["body"]);

        $sql = "INSERT INTO posts(title, body) VALUES(:title, :body)";

        $stmt = $pdo->prepare($sql);

        $params = [
            "title" => $title, 
            "body" => $body
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
        <input type="text" name="title"><br>
        <label for="body">Body</label>
        <input type="text" name="body">
        <button name="submit">Submit</button>
    </form>
</body>
</html>