<?php 

    session_start();

    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    $title = "Edit Pelajaran | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = '';
    }

    include_once "function-pelajaran.php";
    // function pelajaran
    $id = $_GET["id"];
    if (isset($_GET["id"])) {
        $pelajaran = edit("SELECT * FROM tb_matpel WHERE id = $id")[0];
    }

     // ambil data kelas
     $gurus = mysqli_query($koneksi, "SELECT nama FROM tb_guru");
     $rows = [];
     while ($guru = mysqli_fetch_assoc($gurus)) {
         $rows[] =$guru;
     }

     // ambil data jurusan
     $jurusan = ["tkj", "multimedia", "arsitektur"];

    

?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data Pelajaran</a> - Edit Pelajaran</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-pelajaran.php?id=<?= $pelajaran["id"]; ?>"  method="post">
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Edit Update Pelajaran</span>

                                <button type="submit" name="update" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Update Data</button>

                                <a href="<?= $url; ?>pelajaran/index.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-xmark"></i> Kembali</a>
                            </div>

                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        
                                        <div class="mb-4 row">
                                            <label for="nama_mapel" class="col-sm-2 col-form-label">Nama Pelajaran</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nama_mapel" name="nama_mapel" value="<?= $pelajaran["nama_mapel"]; ?>" >
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="jurusan">
                                                    <?php foreach ($jurusan as $value) :?>
                                                        <?php if ($pelajaran["jurusan"] == $value) :?>
                                                            <option selected value="<?= $value; ?>"><?= $value; ?></option>
                                                        <?php else :?>
                                                            <option value="<?= $value; ?>"><?= $value; ?></option>    
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-4 row">
                                            <label for="kelas" class="col-sm-2 col-form-label">Guru</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="guru">
                                                    <?php foreach ($rows as $guru) :?>
                                                        <?php if ($pelajaran["guru"] == $guru["nama"]) :?>
                                                            <option  value="<?= $guru["nama"];  ?>" selected><?= $guru["nama"];  ?></option>
                                                        <?php else :?>
                                                            <option  value="<?= $guru["nama"];  ?>"><?= $guru["nama"];  ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
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
        </div>

<?php include_once "../view/footer.php" ?>
        