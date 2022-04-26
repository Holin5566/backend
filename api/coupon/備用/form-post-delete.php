<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");



$product_id = $_GET["product_id"];
$coupon_id = $_GET["coupon_id"];


$sql = "DELETE FROM coupon_valid_product WHERE product_id='$product_id' AND coupon_id='$coupon_id' ";


if ($conn->query($sql) === TRUE) {
    //     echo "刪除成功";
    $conn->close();
    echo "<script>alert('刪除資料成功!');location.href=document.referrer;</script>;";
} else {
    echo "刪除失敗: " . $conn->error;
}



// header("lacation: form-post.php");