<?php 

    session_start();
    include_once "../config.php";

    include_once "../view/header.php";
    include_once "../view/navbar.php";
    include_once "../view/sidebar.php";

    // cek session
    if (!isset($_SESSION["login"])) {
        header("location:../auth/login.php");
        exit;
    }


?>



<div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <ol class="mt-4 breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="<?= $url; ?>" class="text-decoration-none"><i class="fa-solid fa-house"></i> Dashboard</a> - Data Pelajaran</li>
                    </ol>
                </div>

                <!-- content -->
                <div class="card">
            </main>


<?php include_once "../view/footer.php" ?>