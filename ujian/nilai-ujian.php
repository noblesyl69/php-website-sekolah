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

    // query ambil data siswa 
    $querySiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
    $rows = [];
    while ( $resultSiswa = mysqli_fetch_assoc($querySiswa)) {
        $rows[] = $resultSiswa;
    }

    // ambil data dari tb nilai ujian
    $queryNoUjian = mysqli_query($koneksi, "SELECT max(no_ujian) as maxUjian FROM tb_nilai_ujian");
    if ($queryNoUjian) {
        $resultNoUjian = mysqli_fetch_assoc($queryNoUjian);
        $maxUjian = $resultNoUjian["maxUjian"];

        $noUrut = (int) substr("$maxUjian", 4, 3);
        $noUrut++;

        $maxUjian = "UTS".sprintf("%03s", $noUrut);
    }
?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data Ujian - Nilai Ujian</li>
                    </ol>
                    
                    <!-- content -->
                <form action="function-ujian.php" method="post">
                    <div class="row">
                            
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header mb-2">
                                    <span class="h6"><i class="fa-solid fa-database"></i> Data Peserta Ujian</span>

                                </div>
                                <!-- alert  -->
                                <?php include_once "alert.php" ?>
                                <!-- alert end -->
                                <div class="card-body">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-rotate fa-sm"></i></span>
                                        <input type="text" name="no_ujian" id="no_ujian" class="form-control bg-transparent" value="<?= $maxUjian; ?>" readonly >
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days fa-sm"></i></span>
                                        <input type="date" name="tgl_ujian"  class="form-control" >
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-user fa-sm"></i></span>
                                        <select name="nis" id="nis" class="form-select">
                                            <option value="">-- Pilih Siswa --</option>
                                            <?php foreach ($rows as $siswa) :?>
                                                <option value="<?= $siswa["nis"]; ?>" >
                                                <?= $siswa["nis"] . " - ". $siswa["nama"] ; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-location fa-sm"></i></span>
                                        <select name="jurusan" id="jurusan" class="form-select">
                                            <option selected>-- Pilih Jurusan --</option>
                                            <option value="tkj">Tkj</option>
                                            <option value="multimedia">Multimedia</option>
                                            <option value="arsitektur">Arsitektur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-body border mt-2 rounded">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text col-2 ps-2 fw-bold">Sum</span>
                                        <input type="text" name="sum" id="total_nilai" class="form-control " placeholder="total nilai" required readonly>
                                    </div>

                                    <div class="input-group mb-2">
                                        <span class="input-group-text col-2 ps-2 fw-bold">Min</span>
                                        <input type="text" name="min" id="nilai_terendah" class="form-control " placeholder="Nilai Terendah" required readonly>
                                    </div>

                                    <div class="input-group mb-2">
                                        <span class="input-group-text col-2 ps-2 fw-bold">Max</span>
                                        <input type="text" name="max" id="nilai_tertinggi" class="form-control " placeholder="Nilai Tertinggi" required readonly>
                                    </div>

                                    <div class="input-group mb-2">
                                        <span class="input-group-text col-2 ps-2 fw-bold">avg</span>
                                        <input type="text" name="avg" id="rata2" class="form-control " placeholder="Nilai rata-rata" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa-solid fa-list"></i> input Nilai Ujian
                                    <button type="submit" name="simpan" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                    <button type="reset" name="reset" class="btn btn-sm btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover mt-4" id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Mata Pelajaran</th>
                                                <th scope="col">Jurusan</th>
                                                <th scope="col">Nilai Ujian</th>
                                            </tr>
                                        </thead>
                                        <tbody id="kejuruan">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- content end -->

                </div>
            </main>
        </div>

        <script>
            // buat variabel untuk ambil id nya
            const Jurusan = document.getElementById("jurusan");
            const mapelJurusan = document.getElementById("kejuruan");

            // buat event change dari jurusan
            Jurusan.addEventListener("change", function(){
                // buat ajax 
                let ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    // cek status 
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        // ubah isi data mapel
                        mapelJurusan.innerHTML = ajax.responseText;
                    }
                }

                ajax.open("GET", "ajax-mapel.php?jurusan="+Jurusan.value, true);
                ajax.send();
            });

            // kita tangkap semua id inpitan yang di atas
            const total = document.getElementById("total_nilai");
            const minValue = document.getElementById("nilai_terendah");
            const maxValue = document.getElementById("nilai_tertinggi");
            const average = document.getElementById("rata2");

            // buat function
            function fnHitung() {
                // buat variabel  dan tangkap id nilai
                let nilaiUjian = document.getElementsByClassName("nilai");
                // buat variabel total nilai
                let totalNilai = 0;
                let listNilai = [];

                // kita buat perulangan for
                for (let i = 0; i < nilaiUjian.length; i++) {
                    // ubah format total nilai menjadi integer dan hitung dengan nilai ujian
                    totalNilai = parseInt(totalNilai) + parseInt(nilaiUjian[i].value);
                    // kita masukkan nilai inputan dari user
                    total.value = totalNilai;
                    listNilai.push(nilaiUjian[i].value);
                    // kita urutkan list nilai nya dari besar ke yng kecil
                    listNilai.sort(function (a,b) {
                        return a-b;
                    });

                    // kita ambil nilai yang terkecil ke yng besar
                    minValue.value = listNilai[0];
                    maxValue.value = listNilai[nilaiUjian.length - 1];
                    average.value = Math.round(totalNilai / listNilai.length); 
                    
                }
            }
            
        </script>


<?php include_once "../view/footer.php" ?>

