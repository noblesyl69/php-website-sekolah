<?php 

    $idLogin = $_SESSION["id"];
    $queryUser = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $idLogin");
    $user = mysqli_fetch_assoc($queryUser);


?>


<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="<?= $url; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="<?= $url; ?>user/index.php" >
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Users
                        </a>

                        <a class="nav-link collapsed" href="<?= $url; ?>user/password.php
                        ">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Ganti password
                        </a>

                        <a class="nav-link collapsed" href="<?= $url; ?>sekolah/index.php
                        ">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Sekolah
                        </a>


                        <div class="sb-sidenav-menu-heading">Data</div>
                        <a class="nav-link" href="<?= $url; ?>siswa/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Siswa
                        </a>
                        <a class="nav-link" href="<?= $url; ?>guru/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Guru
                        </a>
                        <a class="nav-link" href="<?= $url; ?>pelajaran/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Pelajaran
                        </a>
                        <a class="nav-link" href="<?= $url; ?>ujian/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Ujian
                        </a>
                        <a class="nav-link" href="<?= $url; ?>ujian/nilai-ujian.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Nilai Ujian
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login Active:</div>
                    <?= $user["username"]; ?>
                </div>
            </nav>
        </div>