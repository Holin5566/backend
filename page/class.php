<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

// if(!isset($_GET["p"])){
//     $p=1;
// }else{
//     $p=$_GET["p"];
// }

if (!isset($_GET["type"])) {
  $type = 5;
} else {
  $type = $_GET["type"];
}

switch ($type) {
  case "1":
    $order = "price ASC";
    break;
  case "2":
    $order = "price DESC";
    break;
  case "3":
    $order = "duration ASC";
    break;
  case "4":
    $order = "duration DESC";
    break;
  case "5":
    $order = "id ASC";
    break;

  default:
    $order = "id ASC";
}

$sql = "SELECT * FROM lessons ORDER BY $order";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
?>
<h2>課程一覽</h2>


<div class="container">
    <div class="text-end">
        <a class="btn-sm btn-info text-white <?php if ($type == 1) echo "active" ?>"
            href="index.php?current=class&type=1">由價低至高</a>
        <a class="btn-sm btn-info text-white<?php if ($type == 2) echo "active" ?>"
            href="index.php?current=class&type=2">由價高至低</a>
        <a class="btn-sm btn-info text-white <?php if ($type == 3) echo "active" ?>"
            href="index.php?current=class&type=3">由時長短至長</a>
        <a class="btn-sm btn-info text-white <?php if ($type == 4) echo "active" ?>"
            href="index.php?current=class&type=4">由時長長至短</a>
    </div>
</div>

</html>
<table class="table table-striped table-hover my-3">
    <thead>
        <tr class="text-nowrap">
            <th>編號</th>
            <th><img style="width: 1.5rem;" src="../img/icon/user.png" alt="">課程名稱</th>
            <th><img style="width: 1.5rem;" src="../img/icon/credit-card.png" alt="">價格</th>
            <th><img style="width: 1.5rem;" src="../img/icon/calendar.png" alt="">日期</th>
            <th><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt="">時長</th>
            <th>Valid</th>
            <th scope="col"><?php
                      $title = "新增課程";
                      $formType = "post-class";
                      require("../components/post-offcanvas.php") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <th scope="row"># <?= $row["id"] ?></th>
            <td><?= $row["name"] ?></td>
            <td><?= $row["price"] ?></td>
            <td><?= $row["date"] ?></td>
            <td><?= $row["duration"] ?> h</td>
            <td><?= $row["valid"] ?></td>
            <td> </td>
            <td> </td>

        </tr>
        <tr>
            <td><img style="width: 1.5rem;" src="../img/icon/message (1).png" alt=""></td>
            <td colspan="3" class="description"><?= $row["description"] ?></td>
            <td colspan="3" class="description">
                <?php
          $edit_type = "edit-class";
          require("../components/edit-modal.php") ?>
                <button class="btn-sm btn-danger">
                    <a class="btn-sm btn-danger text-white"
                        href="/project/api/class/delete_class.php?id=<?= $row["id"] ?>">刪除</a>
                </button>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>