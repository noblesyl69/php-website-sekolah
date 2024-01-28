<?php 

    session_start();

    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    $title = "Data Guru | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    include_once "function-guru.php";
    $id = $_GET["id"];
    if (isset($_GET["id"])) {
        $guru = edit("SELECT * FROM tb_guru WHERE id = $id")[0];
    }

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
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data Guru</a> - Form Guru</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-guru.php?id=<?= $guru["id"]; ?>"  method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Form Update Guru</span>

                                <button type="submit" name="update" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Update Data</button>

                                <a href="<?= $url; ?>guru/index.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-xmark"></i> Kembali</a>
                            </div>

                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="username" class="col-sm-2 col-form-label">Nip</label>
                                            <label for="nip" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nip" name="nip" value="<?= $guru["nip"]; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nama" name="nama" value="<?= $guru["nama"]; ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat anda ..." name="alamat"><?= $guru["alamat"]; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="tlp" class="col-sm-2 col-form-label">Tlp</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="number" class="form-control  border-0 border-bottom" id="tlp" name="tlp" min="0" value="<?= $guru["tlp"]; ?>">
                                            </div>
                                        </div>
                                        

                                        <div class="mb-3 row">
                                            <label for="kelas" class="col-sm-2 col-form-label">Agama</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">

                                            <?php 

                                                $agamaData = ["Islam", "Kristen", "Hindu", "Budha", "Katolik"]


                                            ?>

                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="agama">
                                                    <?php foreach ($agamaData as $value) :?>
                                                        <?php if ($guru["agama"] == $value) :?>
                                                            <option value="<?= $value; ?>"><?= $value; ?></option>
                                                            <?php endif; ?>
                                                            <option value="<?= $value; ?>"><?= $value; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                      
                                    </div>
                                    <div class="col-4 text-center" style="margin-top: 50px;">
                                        <img style="width: 150px;" src="<?= $url; ?>asset/img/guru/<?= $guru["photo"]; ?>" alt="">
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
        