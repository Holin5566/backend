<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$sql = "SELECT * FROM user ";
$result = $conn->query($sql);
$total = $result->num_rows;

$per_page = 4;
$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM user  LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$page_count = CEIL($total / $per_page);

$genderLisr = array("男性", "女性")
?>
<style>
</style>

<h3>會員一覽(方塊)</h3>
<div class="text-end">
    <a href="../page/index.php?current=user"><img src="../img/icon/menu.png" alt="sections.png" class="mx-3" style="width:1.5rem;"></a>
</div>
<div class="row justify-content-center">
    <?php foreach ($rows as $row) : ?>
        <div class="card p-1 shadow m-3 col-5 py-3">
            <div class="row g-0 align-items-start justify-content-center ">
                <div class="avatar rounded-3 border border-3 shadow col-5 overflow-hidden d-flex justify-content-center align-items-center">
                    <img src="../img/user/<?= $row["photo"] ?>" class="w-100" alt="..." />
                </div>
                <div class="col">
                    <div class="card-body py-0">
                        <p class="card-text mb-1">用戶 : <?= $row["name"] ?></p>
                        <p class="card-text mb-1">帳戶 : <?= $row["account"] ?></p>
                        <p class="card-text mb-1">電話 : <?= $row["phone"] ?></p>
                        <p class="card-text mb-1">性別 : <?= $genderLisr[$row["gender"]] ?></p>
                        <p class="card-text mb-1">生日 : <?= $row["birthday"] ?></p>
                        <p class="card-text mb-1">啟用 : <?= $row["valid"] ?></p>
                    </div>
                </div>
                <div class="row p-3">
                    <!-- <p class="card-text border p-1 bg-light px-3"></?= $row["content"] ?></p> -->
                    <div class="btn-group  mb-1 text-center" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-primary">訂單</button>
                        <button type="button" class="btn btn-outline-primary">收藏</button>
                        <button type="button" class="btn btn-outline-primary">回報</button>
                    </div>
                    <div class="btn-group  mb-1 text-center" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-primary">變更</button>
                        <button type="button" class="btn btn-outline-primary">封鎖</button>
                        <button type="button" class="btn btn-outline-primary">刪除</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <p class="text-center m-2"><small class="text-muted">建立時間 : <?= $row["createTime"] ?></small></p>
            </div>
        </div>
        <!--  -->
    <?php endforeach; ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="index.php?current=user-card&p=<?= $i ?>"><?= $i ?></a></li>
            <?php endfor ?>
        </ul>

        <div class="py-2 text-end">
            第<?= $p ?> 頁 , 共<?= $page_count ?>頁 , 共<?= $total ?> 筆資料
        </div>
    </nav>
</div>