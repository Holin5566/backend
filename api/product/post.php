<!-- 新增資料php -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



if (!isset($_POST["name"]) || !isset($_POST["price"]) || !isset($_POST["express"]) || !isset($_POST["description"]) || !isset($_POST["inventory"]) || !isset($_POST["launched"])) {
    echo "請透過官網到此頁";
    exit;
}

$name = $_POST["name"];
$price = $_POST["price"];
// $category = $_POST["category"];
$express = $_POST["express"];
$createTime = date("Y/m/d/H/i/s");
$description = $_POST["description"];
$inventory = $_POST["inventory"];
$launched = $_POST["launched"];
// $images = $_POST["images"];
// $valid = $_POST["valid"];


$checkSql = "SELECT * FROM product WHERE name=$name AND price=$price ";
// $check = $conn->query($checkSql)->num_rows;
// if ($check > 0) {
//     echo "資料已存在";
//     exit;
// }


$sql = "INSERT INTO product (name, price, express, createTime, description, inventory, launched, valid)
    VALUES ('$name','$price','$express','$createTime','$description','$inventory','$launched','1')
    ";

if ($conn->query($sql) === TRUE) {
    // echo "新增資料完成";
    header("location: ../../page/index.php?current=product");
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

?>