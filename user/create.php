<?php 

    include_once "../config.php";

    $title = "Data User | Smk Negeri Makassar";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

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
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data User</a> - Form User</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-user.php" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Form Tambah User</span>

                                <button type="submit" name="create" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Simpan Data</button>

                                <a href="<?= $url; ?>user/index.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-xmark"></i> Kembali</a>
                            </div>

                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="username" name="username">
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
                                            <label for="password" class="col-sm-2 col-form-label">password</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="password" class="form-control  border-0 border-bottom" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="jabatan">
                                                    <option selected>-- Pilih Jabatan --</option>
                                                    <option value="siswa">siswa</option>
                                                    <option value="guru">guru</option>
                                                    <option value="operator">operator</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Domisili" name="alamat"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center" style="margin-top: 50px;">
                                        <h5 class=" text-center mb-2">Input Foto Anda</h5>
                                        <input class="form-control fonm-control-sm" type="file" id="formFile" name="photo">

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
        