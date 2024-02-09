<?php
    require 'database.php';

    $id = $_GET["id"] ?? null;
    if(!$id){
        header("Location: index.php");
        exit;
    }
    
    // Define the SQL statement. Note, here we have to use the :id syntax to mention that the value id not immediately available but it will be supplied in the future.
    $sql = "SELECT * FROM posts WHERE id = :id";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Define which params to replace in the query. Generally, this is defined as an associative array.
    $params = ["id" => $id];

    // Execute the prepared statement with the supplied value
    $stmt->execute($params);

    // Fetch the desired row.
    $post = $stmt->fetch();

    print_r($post);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="delete.php" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" value="<?= $post['id']  ?>">
        <button name="delbtn">Delete</button>
    </form>
    <form action="edit.php" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" value="<?= $post['id']  ?>">
        <button name="editbtn">Edit</button>
    </form>
</body>
</html>