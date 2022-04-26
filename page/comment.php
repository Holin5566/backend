<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$per_page = 20;
$start = ($p - 1) * $per_page;
$sqlSELECT = "SELECT comment.*,product.name AS proName,user.name AS userName,product.id AS proId";
$sqlFROM = "FROM comment,product,user";
$sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id LIMIT $start, $per_page";
$sql = "$sqlSELECT $sqlFROM $sqlWHERE";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$i = 1;

$pageSql = "SELECT * FROM comment,product,user WHERE comment.product=product.id AND comment.user=user.id";
//$sql = "SELECT *FROM order_info";
$result = $conn->query($pageSql);
$total = $result->num_rows;
$page_count = CEIL($total / $per_page);
// var_dump($rows);
?>
<h2>評論一覽</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">user</th>
            <th scope="col">product</th>
            <th scope="col">score</th>
            <th scope="col">createTime</th>
            <th scope="col"><?php
                            $title = "新增評論";
                            $formType = "post-comment";
                            require("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <?php foreach ($rows as $row) : ?>
    <tbody>
        <tr class="text-muted">
            <td># <?= $row["id"] ?></td>
            <td><?= $row["userName"] ?></td>
            <td><?= $row["proName"] ?></td>
            <td><?= $row["score"] ?></td>
            <td><?= $row["createTime"] ?></td>
            <td class="text-center">
                <button type="button" class="btn-sm btn-success"><a
                        href="../page/index.php?id_type=product&id=<?= $row["proId"] ?>&current=comment_filter"
                        class="btn-sm btn-success">查看商品</a></button>
                <button type="button" class="btn-sm btn-success"><a
                        href="../page/index.php?id_type=user&id=<?= $row["id"] ?>&current=comment_filter"
                        class="btn-sm btn-success">查看作者</a></button>
                <button type="button" class="btn-sm btn-danger "><a class="text-light"
                        href="../api/comment/delete.php?id_type=id&id=<?= $row["id"] ?>">刪除</a></button>
            </td>

        </tr>
        <tr class="lh-lg">
            <td class="text-center"><img style="width: 1.5rem;" src="../img/icon/sticky-notes.png" alt=""></td>
            <td colspan="5">
                <div style="max-height: 5rem;" class="overflow-auto"><?= $row["content"] ?></div>
            </td>

            <!-- <td class="text-center">
                <button type="button" class="btn-sm btn-success">
                    商品清單
                </button>
                <button type="button" class="btn-sm btn-success">詳細</button>
                <button type="button" class="btn-sm btn-warning">編輯</button>
                <button type="button" class="btn-sm btn-danger">刪除</button>
            </td> -->
        </tr>
    </tbody>
    <?php endforeach; ?>

</table>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $page_count; $i++) : ?>
        <li class="page-item <?php if ($p == $i) echo "active"; ?> "><a class="page-link"
                href="../page/index.php?current=comment&p=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>
<div class="text-center">共<?= $total ?>筆資料，<?= $page_count ?>頁</div>