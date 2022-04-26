<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$sql = "SELECT * FROM users";

$id = $_GET["id"];
$id_type = $_GET["id_type"];

$sql = "DELETE FROM comment WHERE  $id_type = $id";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "刪除成功";
} else {
    echo "刪除失敗: " . $conn->error;
    exit;
}



$conn->close();