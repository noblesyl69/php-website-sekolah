<?php 

    include_once "../config.php";
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

    $users = index("SELECT * FROM user");

?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data User</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="" method="post">
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
                            <div class="card-body">
                                <table class="table table-hover mt-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col" style="width: 170px;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) :?>
                                        <tr>
                                            <td>1</td>
                                            <td><?= $user["username"]; ?></td>
                                            <td><?= $user["jabatan"]; ?></td>
                                            <td><?= $user["alamat"]; ?></td>
                                            <td>
                                                <img style="width: 100px;" src="../asset/img/user/<?= $user["photo"]; ?>" alt="ini foto">
                                            </td>
                                            <td style="margin: auto;">
                                                <a href="" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pen"></i> Edit</a>
                                                <a href="" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <!-- content end -->

                </div>
            </main>

<?php include_once "../view/footer.php" ?>
        