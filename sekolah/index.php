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

                                                <button type="button" id="btnHapus" data-id="<?= $sekolah["id"]; ?>" data-gambar="<?= $sekolah["gambar"]; ?>" data-bs-toggle="modal" data-bs-target="#mdlHapus" class="btn btn-danger btn-sm me-1"><i class="fa-solid fa-trash"></i> Delete</button>
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
        </div>
        
<!-- modal hapus -->
    <div class="modal fade " id="mdlHapus" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-center" role="alert">
                    <strong>Apakah anda ingin menghapus data ini?</strong>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="" id="btnMdlHapus" class="btn btn-danger">Hapus data</a>
            </div>
            </div>
        </div>
    </div>

    <!-- script jquery hapus data -->
    <script>
        $(document).ready(function () {
            $(document).on("click", "#btnHapus", function () {
                let idSekolah = $(this).data("id");
                let gambarSekolah = $(this).data("gambar");
                $("#btnMdlHapus").attr("href", "delete.php?id="+idSekolah+"&gambar="+gambarSekolah);
            })
        })
    </script>

<?php include_once "../view/footer.php" ?>
        