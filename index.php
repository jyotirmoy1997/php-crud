<?php 
    require 'database.php';

    // Step 1 : Prepare a SQL Statement
    $stmt = $pdo->prepare('SELECT * FROM posts');


    // Step 2 : Execute the statement
    $stmt->execute();

    // Step 3 : Fetch Results
    $results = $stmt->fetchAll();

    print_r($results);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
