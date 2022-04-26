<?php
// session_start();
// if (isset($_SESSION["user"])) {
//      header("location: dashboard.php");
// }
require($_SERVER['DOCUMENT_ROOT'] . "/project/project-conn.php");
?>
<!doctype html>
<html lang="en">

<head>
     <title>Login</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS v5.0.2 -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
     <div class="sign-in-body vh-100 d-flex justify-content-center align-items-center">
          <div class="sign-in-panel">
               <?php if (isset($_SESSION["error"]["times"]) && $_SESSION["error"]["times"] > 5) : ?>
                    <div class="text-center">您已嘗試超過允許的錯誤次數</div>
               <?php else : ?>
                    <form action="login-do.php" method="post">
                         <div class="text-center">
                              <img class="logo" src="/images/logo.svg" alt="">
                              <h1 class="mt-4 mb-3">Please Sign in</h1>
                              <div class="sign-in-input">
                                   <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="" name="name">
                                        <label for="floatingInput">Account</label>
                                   </div>
                                   <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                        <label for="floatingPassword">Password</label>
                                   </div>
                              </div>
                         </div>
                         <div class="py-2">
                              <?php if (isset($_SESSION["error"])) : ?>
                                   <div class="text-danger"><?= $_SESSION["error"]["message"] ?>, 錯誤 <?= $_SESSION["error"]["times"] ?>次</div>
                              <?php endif; ?>
                         </div>
                         <div class="d-grid mb-4">
                              <button type="submit" class="btn btn-info">Sign in</button>
                         </div>
                    </form>
               <?php endif; ?>
               <div class="text-center">© 2017–2022</div>
          </div>
     </div>

     <!-- Bootstrap JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>