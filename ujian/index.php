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
                                            <td><?= $ujian["hasil_ujian"]; ?></td>
                                            
                                            <td style="margin: auto;">
                                                <a href="edit.php?id=<?= $ujian["id"]; ?>"  class="btn btn-warning btn-sm me-1"><i class="fa-solid fa-pen"></i> Edit</a>
                                                
                                                <button type="button" id="btnHapus" class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#mdlHapus" data-id="<?= $ujian["id"]; ?>" data-photo="<?= $ujian["photo"]; ?>"><i class="fa-solid fa-trash"></i> Delete</button>
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



<?php include_once "../view/footer.php" ?>