<?php 

    session_start();

    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    $title = "Create Sekolah | Smk Negeri Makassar";

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
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - <a href="" class="text-decoration-none">Data Sekolah</a> - Form Sekolah</li>
                    </ol>
                    
                    <!-- content -->
                    <div class="card">
                        <form action="function-sekolah.php" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <span class="h6"><i class="fa-solid fa-square-plus"></i> Form Tambah Sekolah</span>

                                <button type="submit" name="create" class="btn btn-sm btn-danger float-end ">
                                <i class="fa-solid fa-bread-slice"></i> Simpan Data</button>

                                <a href="<?= $url; ?>sekolah/index.php" name="submit" class="btn btn-primary float-end btn-sm me-1"><i class="fa-solid fa-square-xmark"></i> Kembali</a>
                            </div>

                            <!-- alert  -->
                            <?php include_once "alert.php" ?>
                            <!-- alert end -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="nama" name="nama" placeholder="nama sekolah">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <input type="text" class="form-control  border-0 border-bottom" id="email" name="email" placeholder="email sekolah">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="akreditasi" class="col-sm-2 col-form-label">Akreditasi</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="akreditasi">
                                                    <option selected>-- Pilih Akreditasi --</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jabatan" class="col-sm-2 col-form-label">Status</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <select class="form-select border-0 border-bottom" aria-label="Default select example" name="status">
                                                    <option selected>-- Pilih Status --</option>
                                                    <option value="Negeri">Negeri</option>
                                                    <option value="Swasta">Swasta</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="alamat sekolah" name="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="visimisi" class="col-sm-2 col-form-label">Visi Misi</label>
                                            <label for="" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -46px;">
                                                <textarea class="form-control" id="visimisi" rows="3" placeholder="visi misi sekolah" name="visimisi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center" style="margin-top: 50px;">
                                        <h5 class=" text-center mb-2">Input Gambar Sekolah</h5>
                                        <input class="form-control fonm-control-sm" type="file" id="formFile" name="gambar">

                                        <small class="text-secondary">Pilih photo PNG, JPG atau JPEG dengan ukuran maximal 2 MB</small>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- content end -->

                </div>
            </main>
        </div>

    <script>
        $(document).ready(function () {
            // buat function alert close
            setTimeout(function () {
                $("#alertPhp").fadeOut("slow");
            }, 2000)
        })
    </script>

<?php include_once "../view/footer.php" ?>
        