<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");


if (!isset($_POST["product"]) || !isset($_POST["order_info"]) || !isset($_POST["class"]) || !isset($_POST["counter"])) {
  echo "請透過官網到此頁";
  exit;
}




$product = $_POST["product"];
$order_info = $_POST["order_info"];
$class = $_POST["class"];
$counter = $_POST["counter"];
$memo = $_POST["memo"];


$checkSql = "SELECT * FROM order_item WHERE order_info=$order_info AND product=$product AND class=$class ";
$check = $conn->query($checkSql)->num_rows;
if ($check > 0) {
  echo "資料已存在";
  exit;
}

// echo "$product, $order_info, $class, $counter, $memo";

$sql = "INSERT INTO order_item ( product, order_info, class, counter, memo)
VALUES ('$product', '$order_info','$class','$counter', '$memo')
";

if ($conn->query($sql) === TRUE) {
  // echo "<script>alert('新增資料完成!');location.href=document.referrer;</script>;";
  echo "新增資料完成";
} else {
  echo "新增資料錯誤: " . $conn->error;
}

// echo $id.$product.$order_info.$class.$counter.$memo;


$conn->close();