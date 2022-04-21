<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

//計算總共有幾筆資料
$sql = "SELECT * FROM coupon ";
$result = $conn->query($sql);
$total = $result->num_rows;
//與總共要計算幾筆分頁有關係

//計算分頁
$per_page = 10;
$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM coupon  LIMIT $start,$per_page";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$page_count = CEIL($total / $per_page);


// $sql = "SELECT * FROM coupon ";
// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);

//兩個接受的值不同就不衝突.
//假設又要在抓一筆資料的時候

?>
<!-- 清單 -->
<div class="form p-3">
    <h2>優惠券一覽</h2>
    <div class="py-2 text-end">
        第<?= $p ?> 頁 , 共<?= $page_count ?>頁 , 共<?= $total ?> 筆資料
    </div>

    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>code</td>
                <td>discount</td>
                <td>expiry</td>
                <td>limited</td>
                <td>valid</td>
                <th scope="col"><?php
                                $title = "新增優惠券";
                                $formType = "post-coupon";
                                require("../components/post-offcanvas.php") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["code"] ?></td>
                    <td><?= $row["discount"] ?></td>
                    <td><?= $row["expiry"] ?></td>
                    <td><?= $row["limited"] ?></td>
                    <td><?= $row["valid"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $page_count; $i++) : ?>
                    <li class="page-item <?php if ($i == $p) echo "active" ?>"><a class="page-link" href="index.php?current=coupon&p=<?= $i ?>"><?= $i ?></a></li>
                    <!-- 網址&連接 -->
                <?php endfor ?>
            </ul>
        </nav>
    </div>
</div>

<?php
$conn->close();
?>