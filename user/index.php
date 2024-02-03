<?php 
    session_start();

    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }
    include_once "function-user.php";

    $title = "Data User | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = '';
    }

    if (isset($_POST["cari"])) {
        $user = cari($_POST["key"]);
    }else {
        $users = index("SELECT * FROM user");
    }

?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data User</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                     
                            <div class="card-header mb-2">
                                <span class="h6"><i class="fa-solid fa-database"></i> Data User</span>

                                <a href="create.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-plus"></i> Tambah User</a>
                            </div>
                            <!-- alert  -->
                            <?php if ($msg === "success") :?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Selamat</strong> Tambah Data Anda Beshasil!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <!-- alert end -->

                            <!-- search -->
                            <div class="col-8 m-auto my-5">
                                <form action="" method="post" class="d-flex">
                                    <input class="form-control me-2 col-6" type="search" placeholder="Search User" aria-label="Search" name="key">
                                    <button class="btn btn-outline-success col-2" type="submit" name="cari">Cari User</button>
                                </form>
                            </div>
                            <!-- search end -->

                            <div class="card-body">
                                <div class="row col-12 ">
                                    <?php foreach ($users as $user) :?>
                                    <div class="card mb-3 col-6">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="<?= $url; ?>asset/img/user/<?= $user["photo"]; ?>" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $user["nama"]; ?></h5>
                                                    <p class="card-text"><?= $user["jabatan"]; ?></p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    
                                                    <a href="edit.php?id=<?= $user["id"]; ?>" class="btn btn-warning">Edit</a>
                                                    <a href="#" class="btn btn-danger">delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                    </div>
                    <!-- content end -->

                </div>
            </main>

<?php include_once "../view/footer.php" ?>
        