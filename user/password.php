<?php 

    session_start();

    include_once "../config.php";

    $title = "Ganti Password | Smk Negeri Makassar";

    // cek session
    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";
?>


<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data Ganti Password</a> - Form Ganti Password</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-password.php" method="post" >
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Form Ganti Password</span>

                                <button type="submit" name="gantiPasswod" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Update Password</button>

                                <a href="<?= $url; ?>user/index.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-xmark"></i> Kembali</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3 row">
                                            <label for="oldPassword" class="col-sm-2 col-form-label">Password Lama</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="password" class="form-control  border-0 border-bottom" id="oldPassword" name="oldPassword">
                                            </div>
                                            <label for="newPassword" class="col-sm-2 col-form-label">Password Baru</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="password" class="form-control  border-0 border-bottom" id="newPassword" name="newPassword">
                                            </div>
                                            <label for="confPassword" class="col-sm-2 col-form-label">Password Confirmasi</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="password" class="form-control  border-0 border-bottom" id="confPassword" name="confPassword">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- content end -->

                </div>
            </main>



<?php include_once "../view/footer.php" ?>