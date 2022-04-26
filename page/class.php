<!-- 新增/顯示所有資料筆數及部分細節表單 -->

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");

if (!isset($_GET["p"])) {
  $p = 1;
} else {
  $p = $_GET["p"];
}

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


$sql = "SELECT * FROM lessons";
$result = $conn->query($sql);
$total = $result->num_rows;

$per_page = 8;

$page_count = CEIL($total / $per_page);

$start = ($p - 1) * $per_page;
$sql = "SELECT * FROM lessons
  ORDER BY $order
   LIMIT $start,$per_page";
$result = $conn->query($sql);

$rows = $result->fetch_all(MYSQLI_ASSOC);
$user_count = $result->num_rows;

//   $total = $result->num_rows;
//   $per_page = 8;
//   $page_count = CEIL($total / $per_page);

//   $start = ($p - 1) * $per_page;
//   $sql = "SELECT * FROM product WHERE valid = 1 LIMIT $start,$per_page";

// $sql = "SELECT * FROM lessons ORDER BY $order";

// $result = $conn->query($sql);
// $rows = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
?>
<h2>課程一覽</h2>


</head>

<body>
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
    <div class="py-2 text-end">
        第 <?= $p ?> 頁,共 <?= $page_count ?> 頁,共 <?= $total ?> 筆
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
<table class="table table-striped table-hover my-3">
    <thead>
        <tr class="text-nowrap">
                <th>編號</th>
                <th><img src="../img/icon/class.png" class="img-fluid rounded-start"
                        style="max-width:25px" /> 課程名稱</th>
                <th><img src="../img/icon/price.png" class="img-fluid rounded-start"
                        style="max-width:25px" /> 課程價格</th>
                <!-- <th>課程簡介</th> -->
                <th><img src="../img/icon/calendar.png" class="img-fluid rounded-start"
                        style="max-width:25px" /> 課程日期</th>
                <th><img src="../img/icon/time.png" class="img-fluid rounded-start"
                        style="max-width:25px" /> 課程時長</th>
                <th>Valid</th>
                <!-- <th scope="col"></?php
                            $title = "新增課程";
                            $formType = "post-class";
                            require("../components/post-offcanvas.php") ?></th> -->
                <th><a href="/project/api/class/create_class.php"><img src="../img/icon/plus.png" class="img-fluid rounded-start"
                        style="max-width:25px" /> </a></th>
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
<!-- 分頁 -->
<div class="py-2">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $page_count; $i++) : ?>
            <li class="page-item<?php
                            if ($i == $p) echo " active"; ?>"><a class="page-link"
                    href="index.php?current=class&p=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>