<?php
    require 'database.php';

    $isDelReq = $_SERVER["REQUEST_METHOD"] === "POST" && $_POST["_method"] === "delete";

    if($isDelReq){
        $id = $_POST["id"];
        $sql = "DELETE FROM posts WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $params = ["id" => $id];
        $stmt->execute($params);

        header("Location: index.php");
        exit;
    }
?>