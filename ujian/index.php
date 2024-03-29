<?php 

    session_start();
    include_once "../config.php";

    $title = "Data Ujian | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    // cek session
    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    // cek alert
    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = "";
    }

    // ambil data ujian dari data bases
    include_once "function-ujian.php";
    $ujians = index("SELECT * FROM tb_ujian");

?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data Ujian</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                            <div class="card-header mb-2">
                                <span class="h6"><i class="fa-solid fa-database"></i> Data Ujian</span>

                                

                                <a href="create.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-plus"></i> Tambah Ujian</a>

                                <button type="button" class="btn btn-primary float-end btn-sm me-1" onclick="cetak()"><i class="fa-solid fa-print"></i> Cetak</button>
                            </div>
                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->
                            <div class="card-body">
                                <table class="table table-hover mt-4" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th scope="col">No Ujian</th>
                                            <th scope="col">Nis</th>
                                            <th scope="col">Jurusan</th>
                                            <th scope="col">Nilai Terendah</th>
                                            <th scope="col">Nilai Tertinggi</th>
                                            <th scope="col">Nilai Rata-Rata</th>
                                            <th scope="col">Hasil Ujian</th>
                                            <th scope="col" style="width: 170px;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ujians as $ujian) :?>
                                        <tr>
                                            <td><?= $ujian["no_ujian"]; ?></td>
                                            <td><?= $ujian["nis"]; ?></td>
                                            <td><?= $ujian["jurusan"]; ?></td>

                                            <td><?= $ujian["nilai_terendah"]; ?></td>
                                            <td><?= $ujian["nilai_tertinggi"]; ?></td>
                                            <td><?= $ujian["nilai_rata"]; ?></td>
                                            <td>
                                                <?php if ($ujian["hasil_ujian"] === "LULUS") :?> 
                                                    <button class="btn btn-success btn-sm col-10 fw-bold text-uppercase"><?= $ujian["hasil_ujian"]; ?></button> 
                                                <?php else :?>
                                                    <button class="btn btn-danger btn-sm col-10 fw-bold text-uppercase"><?= $ujian["hasil_ujian"]; ?></button> 
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td style="margin: auto;">
                                                <button type="button" id="btnHapus" class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#mdlHapus" data-id="<?= $ujian["id"]; ?>" ><i class="fa-solid fa-trash"></i> Delete</button>
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

    <script>
        $(document).ready(function () {

            setTimeout(() => {
                $("#success").fadeOut();
            }, 2000);

            setTimeout(() => {
                $("#cekNamaMapel").fadeOut();
            }, 2000);

            $("#btnHapus").click(function () {
                let idUjian = $(this).data('id');
                $("#btnMdlHapus").attr("href", "delete.php?id="+idUjian);
            })
        })

        // buat function cetak

        function cetak() {
            const myWindows = window.open("../raport/raport-ujian.php", "", "width=900,height=600,left=100");
        }
    </script>

<?php include_once "../view/footer.php" ?>