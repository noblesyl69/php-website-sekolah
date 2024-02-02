<?php 

    session_start();
    include_once "../config.php";

    // cek session
    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    $title = "Data Guru | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    // siswas 
    include_once "function-guru.php";
    $gurus = index("SELECT * FROM tb_guru");

    // alert 
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = '';
    }

?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data Guru</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                            <div class="card-header mb-2">
                                <span class="h6"><i class="fa-solid fa-database"></i> Data Guru</span>

                                <a href="create.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-plus"></i> Tambah Guru</a>
                            </div>
                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->
                            <div class="card-body">
                                <table class="table table-hover mt-4" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nip</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Tlp</th>
                                            <th scope="col">Agama</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col" style="width: 170px;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1 ?>
                                        <?php foreach ($gurus as $guru) :?>
                                        <tr>
                                            <td><?= $nomor++; ?></td>
                                            <td><?= $guru["nip"]; ?></td>
                                            <td><?= $guru["nama"]; ?></td>
                                            <td><?= $guru["alamat"]; ?></td>
                                            <td><?= $guru["tlp"]; ?></td>
                                            <td><?= $guru["agama"]; ?></td>
                                            <td>
                                                <img style="width: 100px;" src="<?= $url; ?>asset/img/guru/<?= $guru["photo"]; ?>" alt="ini foto">
                                            </td>
                                            <td style="margin: auto;">
                                                <a href="edit.php?id=<?= $guru["id"]; ?>"  class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pen"></i> Edit</a>
                                                
                                                <button type="button" class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#mdlHapus" id="btnHapus" title="hapus guru" data-id="<?= $guru["id"]; ?>" data-photo="<?= $guru["photo"]; ?>">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- jquery modal hapus-->
    <script>
        $(document).ready(function () {
            $(document).on("click", "#btnHapus", function () {
                let idGuru = $(this).data('id');
                let photoGuru = $(this).data('photo');
                $('#btnMdlHapus').attr("href","delete.php?id=" + idGuru + "&photo=" + photoGuru);
            })
        })
    </script>

<?php include_once "../view/footer.php" ?>
