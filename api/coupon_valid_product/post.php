<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
//$_SERVER['DOCUMENT_ROOT'] == C:\xampp\htdocs

$product_id = $_POST["product_id"];
$coupon_id = $_POST["coupon_id"];

// $checkSql = "SELECT * FROM coupon_valid_product WHERE product_id=$product_id AND coupon_id=$coupon_id ";
// $check = $conn->query($checkSql)->num_rows;
// if ($check > 0) {
//     echo "資料已存在";
//     exit;
// }


if (!isset($_POST["product_id"]) || !isset($_POST["coupon_id"])) {
    echo "請新增正確的產品or coupon";
    exit;
}


$sql = "INSERT INTO coupon_valid_product( coupon_id, product_id)
VALUES('$coupon_id' , '$product_id')";
//這裡也不需要valid

if ($conn->query($sql) === TRUE) {
    $conn->close();
    echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . $conn->error;
    $conn->close();
}
