<?php 

    session_start();

    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    include_once "function-sekolah.php";

    $title = "Data Sekolah | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = '';
    }
    
    $sekolahs = index("SELECT * FROM tb_sekolah");
?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data Sekolah</li>
                    </ol>
                    <!-- content -->
                    <div class="card">
                        <form action="" method="post">
                            <div class="card-header mb-2">
                                <span class="h6"><i class="fa-solid fa-database"></i> Data Sekolah</span>

                                <a href="create.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-plus"></i> Tambah Sekolah</a>
                            </div>
                            <!-- alert  -->
                            <?php if ($msg === "success") :?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Selamat</strong> Tambah Data Anda Beshasil!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <!-- alert end -->

                            <!-- alert delete -->
                            <?php if ($msg === "success-delete") :?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>success</strong> Data Anda Beshasil di delete!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                
                            <?php endif; ?>
                            <?php if($msg === "error-delete") : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> Data Anda Gagal di delete!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <!-- alert delete end -->
                            <div class="card-body">
                                <table class="table table-hover mt-4" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Sekolah</th>
                                            <th scope="col">Akreditasi</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col" style="width: 170px;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sekolahs as $sekolah) :?>
                                        <tr>
                                            <td>1</td>
                                            <td><?= $sekolah["nama"]; ?></td>
                                            <td><?= $sekolah["akreditasi"]; ?></td>
                                            <td><?= $sekolah["status"]; ?></td>
                                            <td><?= $sekolah["email"]; ?></td>
                                            <td>
                                                <img style="width: 100px;" src="../asset/img/sekolah/<?= $sekolah["gambar"]; ?>" alt="ini foto">
                                            </td>
                                            <td style="margin: auto;">
                                                <a href="<?= $url; ?>sekolah/edit.php?id=<?= $sekolah['id']; ?>" class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pen"></i> Edit</a>
                                                <a href="<?= $url; ?>sekolah/delete.php?id=<?= $sekolah['id']; ?>" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash"></i> Delete</a>
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
        