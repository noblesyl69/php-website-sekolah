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

    include_once "function-siswa.php";

    if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
    }else {
        $msg = '';
    }

    // edit siswa
    $id = $_GET["id"];

    if (isset($_GET["id"])) {
        $siswa = edit("SELECT * FROM tb_siswa WHERE id = $id")[0];
    }
    
    
?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data Siswa</a> - Edit Siswa</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-siswa.php?id=<?= $siswa["id"]; ?>" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Form Update Siswa</span>

                                <button type="submit" name="update" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Update Data</button>

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
                                                <input type="text" class="form-control  border-0 border-bottom" id="nis" name="nis" value="<?= $siswa["nis"]; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nama" name="nama" value="<?= $siswa["nama"]; ?>" >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat anda ..." name="alamat"><?= $siswa["alamat"]; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="kelas">
                                                    <?php $kelas = ["X", "XI", "XII A"] ?>
                                                    <?php foreach ($kelas as $value) :?>
                                                        <?php if ($siswa["kelas"] == $value ) :?>
                                                            <option selected disabled value="<?= $value; ?>" ><?= $value; ?></option>
                                                            <?php endif; ?>
                                                            <option  value="<?= $value; ?>" ><?= $value; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="jurusan">
                                                    <?php $jurusan = ["tkj", "multimedia", "arsitektur"] ?>
                                                    <?php foreach ($jurusan as $value) :?>
                                                        <?php if ($siswa["kelas"] == $value ) :?>
                                                            <option selected disabled value="<?= $value; ?>" ><?= $value; ?></option>
                                                            <?php endif; ?>
                                                            <option  value="<?= $value; ?>" ><?= $value; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-4 text-center" style="margin-top: 50px;">
                                    <img style="width: 150px;" src="<?= $url; ?>asset/img/siswa/<?= $siswa["photo"]; ?>" alt="">
                                        <h5 class=" text-center mb-2">Input Foto Anda</h5>
                                        <input class="form-control fonm-control-sm" type="file" id="formFile" name="photo" accept="image/jpg, image/png,image/jpeg" value="<?= $siswa["photo"]; ?>">

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
        