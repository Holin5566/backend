<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");

$id=$_POST["id"];
$name=$_POST["name"];
$price=$_POST["price"];
$description=$_POST["description"];
$date=$_POST["date"];
$duration=$_POST["duration"];
$valid=$_POST["valid"];
// echo $name;

$sql="UPDATE lessons SET name='$name', price='$price', description='$description', date='$date', duration='$duration', valid='$valid' WHERE id='$id'";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "更新成功";
    $conn->close();
} else {
    echo "更新資料錯誤: " . $conn->error;
    exit;
}