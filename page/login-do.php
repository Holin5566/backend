<?php
if (!$_POST["name"]) {
     echo "error";
     exit;
}
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

$name = $_POST["name"];
$password = $_POST["password"];
// $password=md5($password);
// echo "$name, $password";


$sql = "SELECT * FROM user WHERE name='$name' AND password='$password' AND valid=1";

$result = $conn->query($sql);

$resultCount = $result->num_rows;
// echo var_dump($resultCount);

if ($resultCount > 0) {
     // echo "登入成功";
     $user = $result->fetch_assoc();
     // $_SESSION["user"]=$user;
     $_SESSION["user"] = [
          "name" => $user["name"],
          "email" => $user["email"],
          "phone" => $user["phone"]
     ];

     // header("location: dashboard.php");
} else {
     // echo "登入失敗";
     if (!isset($_SESSION["error"]["times"])) {
          $times = 1;
     } else {
          $times = $_SESSION["error"]["times"] + 1;
     }
     $_SESSION["error"]["times"] = $times;
     $_SESSION["error"]["message"] = "帳號或密碼錯誤";
     header("location: login.php");
}
