<?php
$currentPage = "product";
if (isset($_GET["current"])) {
    $currentPage = $_GET["current"];
};
session_start();
?>

<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&family=Playfair+Display:wght@900&display=swap"
        rel="stylesheet">

    <title>後台管理</title>
    <style>
    body {
        min-width: 1080px;
        font-family: 'Noto Sans TC', sans-serif;
        /* font-family: 'Playfair Display', serif; */
    }

    a {
        text-decoration: none;
    }
    </style>
</head>

<body>

    <?php require_once("../layout/header.php") ?>
    <div class="container-fluid body px-0 ">
        <div class="row w-100 ">
            <div class="col-2  px-0 ">

                <?php require_once("../layout/aside.php") ?>
            </div>
            <div class="col-10 border-start ">
                <div class=" row justify-content-center p-3">
                    <?php require_once("./$currentPage" . ".php") ?>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>


<!-- modal 提示視窗
toasts 小提示視窗 -->