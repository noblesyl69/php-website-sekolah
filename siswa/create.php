<?php 

    session_start();

    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    $title = "Data Siswa | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = '';
    }

    $queryNis = mysqli_query($koneksi, "SELECT max(nis) as maxnis FROM tb_siswa");
    // cek query
    if ($queryNis) {
        $data = mysqli_fetch_assoc($queryNis);
        $maxnis = $data["maxnis"];
                                                    
        $noUrut = (int) substr("$maxnis", 3, 3);
        $noUrut++;
        $maxnis = "NIS". sprintf("%03s", $noUrut);
    }else {
        "query error : ". mysqli_error($koneksi);
    }
    
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data Siswa</a> - Form Siswa</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-siswa.php" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Form Tambah Siswa</span>

                                <button type="submit" name="create" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Simpan Data</button>

                                <a href="<?= $url; ?>siswa/index.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-xmark"></i> Kembali</a>
                            </div>

                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="username" class="col-sm-2 col-form-label">Nis</label>
                                            <label for="nis" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nis" name="nis" value="<?= $maxnis; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nama" name="nama">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat anda ..." name="alamat"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="kelas">
                                                    <option selected>-- Pilih Kelas --</option>
                                                    <option value="X">X</option>
                                                    <option value="XI">XI</option>
                                                    <option value="XII">XII</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="jurusan">
                                                    <option selected>-- Pilih Kelas --</option>
                                                    <option value="tkj">Tkj</option>
                                                    <option value="multimedia">Multimedia</option>
                                                    <option value="arsitektur">Arsitektur</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center" style="margin-top: 50px;">
                                        <h5 class=" text-center mb-2">Input Foto Anda</h5>
                                        <input class="form-control fonm-control-sm" type="file" id="formFile" name="photo" accept="image/jpg, image/png,image/jpeg">

                                        <small class="text-secondary">Pilih photo PNG, JPG atau JPEG dengan ukuran maximal 2 MB</small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- content end -->

                </div>
            </main>

<?php include_once "../view/footer.php" ?>
        