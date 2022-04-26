<?php

$id = $_GET["id"];

require($_SERVER['DOCUMENT_ROOT'] . "/project-conn.php");
$sql = "SELECT * FROM user WHERE id='$id' AND valid=1";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<div class="row justify-content-center">
    <div class="col">
        <form action="../components/update-user.php" method="post">
            <table class="table table-bordered">
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <tr>
                    <th>#</th>
                    <td><?= $row["id"] ?></td>
                </tr>
                <tr>
                    <th>姓名</th>
                    <td>
                        <input class="form-control" name="name" type="text" value="<?= $row["name"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>帳號</th>
                    <td>
                        <input class="form-control" name="account" type="text" value="<?= $row["account"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>密碼</th>
                    <td>
                        <input class="form-control" name="password" type="password" value="<?= $row["password"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <input class="form-control" name="gender" type="text" value="<?= $row["gender"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>生日</th>
                    <td>
                        <input class="form-control" name="birthday" type="date" value="<?= $row["birthday"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>電話</th>
                    <td>
                        <input class="form-control" name="phone" type="number" value="<?= $row["phone"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>照片</th>
                    <td>
                        <input class="form-control" name="photo" type="text" value="<?= $row["photo"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>建立時間</th>
                    <td><?= $row["createTime"] ?></td>
                </tr>
                <tr>
                    <th>軟刪除</th>
                    <td><input class="form-control" name="valid" type="text" value="<?= $row["valid"] ?>">
                    </td>
                </tr>
            </table>
            <div class="py-2">
                <button type="submit" class="btn btn-info text-white">儲存</button>
                <a class="btn btn-info text-white" href="../page/index.php?current=user">取消</a>
            </div>
        </form>
    </div>
</div>