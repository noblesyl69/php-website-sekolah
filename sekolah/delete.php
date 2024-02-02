<?php 

    include_once "../config.php";

    $id = $_GET["id"];
    $gambar = $_GET["gambar"];

    if (isset($_GET["id"])) {
        $query = "DELETE FROM tb_sekolah WHERE id = $id";
        mysqli_query($koneksi, $query);
        // cek dan hapus gamabr di local
        if ($gambar != "defauld.jpg") {
            unlink("../asset/img/sekolah/". $gambar);
        }
        header("location: index.php?msg=success-delete");
        return;
    }else {
        header("location: index.php?msg=error-delete");
        return;
    }

?>