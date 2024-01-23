<?php 

    session_start();
    include_once "../config.php";

    $title = "Login";

      // cek session
    if (isset($_SESSION["login"])) {
        header("location: ../index.php");
        exit;
    }

    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = "";
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title; ?></title>
        <link href="<?= $url; ?>asset/sb-admin/css/styles.css"  rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Administrator Login</h3></div>
                                    <div class="card-body">
                                        <!-- alert -->
                                            <?php include_once "alert.php" ?>
                                        <!-- alert end -->
                                        <form action="function-login.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" type="text" name="username" placeholder="masukkan username" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" name="remember"/>
                                                <label class="form-check-label" for="inputRememberPassword">Remember Me</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button class="btn btn-primary col-12" type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Copyright &copy; Your Website 2023</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= $url; ?>asset/sb-admin/js/scripts.js"></script>
    </body>
</html>
