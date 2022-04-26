<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (!isset($_GET["p"])) {
    $p = 1;
} else {
    $p = $_GET["p"];
}

$per_page = 10;
$start = ($p - 1) * $per_page;




$id_type = $_GET["id_type"];
$id = $_GET["id"];

if ($id_type == "product" & $id != "") {

    //計算頁數
    $pageSql = "SELECT * FROM comment,product,user WHERE comment.user=user.id AND comment.product=product.id AND $id_type=$id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);

    $sqlSELECT = "SELECT comment.*,
    user.name AS userName,
    user.photo AS userPhoto,
    product.id AS data01,
    product.name AS data02,
    product.price AS data03,
    product.express AS data04,
    product.createTime AS data05,
    product.description AS data06,
    product.inventory AS data07";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id AND $id_type=$id LIMIT $start, $per_page";
} else if ($id_type == "user" & $id != "") {
    //計算頁數
    $pageSql = "SELECT * FROM comment,product,user WHERE comment.user=user.id AND comment.product=product.id AND $id_type=$id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);

    $sqlSELECT = "SELECT comment.*,
    product.name AS productName,
    product.id AS productId,
    user.id AS data01,
    user.name AS data02,
    user.account AS data03,
    user.gender AS data04,
    user.birthday AS data05,
    user.phone AS data06,
    user.photo AS data07,
    user.createTime AS data08";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id AND $id_type=$id LIMIT $start, $per_page";
    //計算頁數
    $pageSql = "SELECT comment.*, user.name FROM comment,user,product WHERE comment.user=user.id AND comment.product=product.id AND $id_type=$id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);
} else {
    //計算頁數
    $pageSql = "SELECT * FROM comment,product,user WHERE comment.user=user.id AND comment.product=product.id";
    $result = $conn->query($pageSql);
    $total = $result->num_rows;
    $page_count = CEIL($total / $per_page);

    $sqlSELECT = "SELECT comment.*,product.name AS proName,user.name AS userName,product.id AS proId";
    $sqlWHERE = "WHERE comment.product=product.id AND comment.user=user.id LIMIT $start, $per_page";
}

$sqlFROM = "FROM comment,product,user";

$sql = "$sqlSELECT $sqlFROM $sqlWHERE";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rows_num = $result->num_rows;
$i = 1;

$expressList = array("店內取", "常溫", "低溫");
$genderList = array("男性", "女性", "隱藏");
// var_dump($rows);
?>

<style>
.avatar {
    width: 6rem;
    height: 6rem;
}
</style>
<!-- 篩選表單 -->
<form class="mb-1" action="http://localhost:8080/project/page/index.php">
    <fieldset>
        <legend>篩選條件</legend>
        <div class="row mb-1 w-50  align-items-end">
            <div class="col">
                <label for="id_type" class="form-label">類型</label>
                <select id="id_type" class="form-select" name="id_type">
                    <option>請選擇類型</option>
                    <option value="product">商品</option>
                    <option value="user">用戶</option>
                </select>
            </div>
            <div class="col"> <label for="id" class="form-label">ID</label>
                <input type="number" id="id" class="form-control" name="id" placeholder="輸入 # ID" min="1" required>
            </div>
            <div class="col">
                <input type="hidden" name="current" value="comment_filter">
                <button type="submit" class="btn btn-primary">篩選</button>
            </div>

        </div>

    </fieldset>

</form>
<div class="col">
    <?php
    $title = "新增評論";
    $formType = "post-comment";
    require("../components/post-offcanvas.php") ?>
</div>

<!-- 篩選product -->
<!-- 篩選product -->

<style>
</style>
<?php if ($id_type == "product" & $id != "") : ?>
<div class="row mb-3">
    <h5 class="col-3">篩選條件 :<strong> <?= $id_type ?> # <?= $id ?></strong></h5>
    <p class="col-2">
        <a href="http://localhost:8080/project/page/index.php?id_type&id&current=comment_filter">清空本次條件</a>

    </p>
</div>
<?php if ($rows_num > 0) : ?>

<!-- 主欄位 -->
<div class=" shadow m-3 row p-3 bg-white border col-10 ">
    <div class="col-3">
        <figure class="figure">
            <img src="../img/product/<?= $rows[0]["data02"] ?>.jpg"
                class="figure-img img-fluid rounded-3 border border-3" alt="...">
            <figcaption class="figure-caption">下單時間 : <?= $rows[0]["data05"] ?>
            </figcaption>
        </figure>
    </div>
    <div class="card-body col-6">
        <h5 class="card-title mb-4">商品 : <?= $rows[0]["data02"] ?> # <?= $rows[0]["data01"] ?></h5>
        <p class="card-text mb-2">價錢 : <span class="bg-light border px-3"> <?= $rows[0]["data03"] ?> </span></p>
        <p class="card-text mb-2">配送方式 : <span class="bg-light border px-3"> <?= $expressList[$rows[0]["data04"]] ?></p>
        <p class="card-text mb-2">商品描述 : <span class="bg-light border px-3"> <?= $rows[0]["data06"] ?></p>
        <p class="card-text mb-2">商品庫存 : <span class="bg-light border px-3"> <?= $rows[0]["data07"] ?></p>
    </div>
</div>

<!-- 副欄位 -->
<div class="row justify-content-center  ">
    <?php foreach ($rows as $row) : ?>
    <div class="card p-1 shadow m-3 col-3 py-3">
        <div class="row g-0 align-items-start justify-content-center ">
            <div
                class="avatar rounded-circle border border-3 col-4 overflow-hidden d-flex justify-content-center align-items-center">
                <img src="../img/user/<?= $row["userPhoto"] ?>" class="w-100" alt="..." />
            </div>
            <div class="col">
                <div class="card-body py-0">
                    <p class="card-text mb-1">用戶 : <?= $row["userName"] ?></p>
                    <p class="card-text mb-1">評價 :

                        <?php
                                    for ($i = 0; $i < $row["score"]; $i++) {
                                        echo "<img src='../img/icon/thumb-up.png' style='width: 1.5rem;' alt=''> ";
                                    }
                                    ?>
                    </p>
                    <p class="card-text mb-2">評論 : </p>


                </div>
            </div>
            <div class="row p-3">
                <p class="card-text border p-2 bg-light px-3"><?= $row["content"] ?></p>
                <div class="btn-group  mb-1 text-center" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary"><a
                            href="../page/index.php?id_type=user&id=<?= $row["user"] ?>&current=order-item-filter">用戶訂單</a>
                    </button>
                    <button type="button" class="btn btn-outline-primary"><a
                            href="../page/index.php?id_type=user&id=<?= $row["user"] ?>&current=user-favorite">用戶收藏</a></button>
                    <button type="button" class="btn btn-outline-primary"><a
                            href="../api/comment/delete.php?id_type=id&id=<?= $row["id"] ?>">刪除</a></button>
                </div>
            </div>
        </div>
        <div class="row">
            <p class="text-center m-2"><small class="text-muted">建立時間 : <?= $row["createTime"] ?></small></p>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else : ?>
    <p>本次結果 : </p>
    <p><?= $id_type ?> #<?= $id ?> : 資料為空</p>
    <?php endif; ?>
</div>

<!-- 篩選user -->
<!-- 篩選user -->

<?php elseif ($id_type == "user" & $id != "") : ?>
<div class="row mb-3">
    <h5 class="col-2">篩選條件 :<strong> <?= $id_type ?> # <?= $id ?></strong></h5>
    <p class="col-2">
        <a href="http://localhost:8080/project/page/index.php?id_type&id&current=comment_filter">清空本次條件</a>

    </p>
</div>
<?php if ($rows_num > 0) : ?>
<!-- 主欄位 -->
<div class=" shadow m-3 row p-3 bg-white border col-10 ">
    <div class="col-3">
        <figure class="figure">
            <img src="../img/user/<?= $rows[0]["data07"] ?>" class="figure-img img-fluid rounded-3 border border-3"
                alt="...">
            <figcaption class="figure-caption">註冊時間 : <?= $rows[0]["data05"] ?>
            </figcaption>
        </figure>
    </div>
    <div class="card-body col-6">
        <h5 class="card-title mb-4">用戶 : <?= $rows[0]["data02"] ?> # <?= $rows[0]["data01"] ?></h5>
        <p class="card-text mb-2">帳號 : <span class="bg-light border px-3"> <?= $rows[0]["data03"] ?> </span></p>
        <p class="card-text mb-2">性別 : <span class="bg-light border px-3"> <?= $genderList[$rows[0]["data04"]] ?>
        </p>
        <p class="card-text mb-2">電話 : <span class="bg-light border px-3"> <?= $rows[0]["data06"] ?></p>
        <p class="card-text mb-2">電話 : <span class="bg-light border px-3"> <?= $rows[0]["data02"] ?></p>
    </div>
</div>
<!-- 副欄位 -->
<div class="row justify-content-center  ">
    <?php foreach ($rows as $row) : ?>
    <div class="card p-1 shadow m-3 col-3 py-3">
        <div class="row g-0 align-items-start justify-content-center ">
            <div
                class="avatar rounded-circle border border-3 col-4 overflow-hidden d-flex justify-content-center align-items-center">
                <img src="../img/product/<?= $row["productName"] ?>.jpg" class="w-100" alt="..." />
            </div>
            <div class="col">
                <div class="card-body py-0">
                    <p class="card-text mb-1">商品 : <?= $row["productName"] ?> # <?= $row["productId"] ?></p>
                    <p class="card-text my-3">評價 :

                        <?php
                                        for ($i = 0; $i < $row["score"]; $i++) {
                                            echo "<img src='../img/icon/thumb-up.png' style='width: 1.5rem;' alt=''> ";
                                        }
                                        ?>
                    </p>
                    <p class="card-text my-3"><?= $row["data02"] ?> 的心得 : </p>


                </div>
            </div>
            <div class="row p-3">
                <p class="card-text border p-2 bg-light px-3"><?= $row["content"] ?></p>
                <div class="btn-group  mb-1 text-center" role="group" aria-label="Basic outlined example">
                    <button type="button" class="btn btn-outline-primary"><a
                            href="../page/index.php?id_type=product_id&id=<?= $row["productId"] ?>&current=user-favorite">有誰收藏</a></button>
                    <button type="button" class="btn btn-outline-primary">回報</button>
                </div>
            </div>
        </div>
        <div class="row">
            <p class="text-center m-2"><small class="text-muted">建立時間 : <?= $row["createTime"] ?></small></p>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else : ?>
    <p>本次結果 : </p>
    <p><?= $id_type ?> #<?= $id ?> : 資料為空</p>
    <?php endif; ?>
</div>
<!-- 預設無篩選條件 -->
<!-- 預設無篩選條件 -->
<?php else : ?>
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
                <button type="button" class="btn-sm btn-danger">刪除</button>
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
<?php endif; ?>
<div>
    <nav aria-label="Page navigation ">
        <ul class="pagination  d-flex justify-content-center">
            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
            <li class="page-item <?php if ($p == $i) echo "active"; ?> "><a class="page-link"
                    href="../page/index.php?current=comment_filter&p=<?= $i ?>&id_type=<?= $id_type ?>&id=<?= $id ?>"><?= $i ?></a>
            </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <div class="text-center">共<?= $total ?>筆資料，<?= $page_count ?>頁</div>
</div>
<br>