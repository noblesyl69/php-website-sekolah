<?php 

    include_once "../config.php";

    $id = $_GET["id"];
    $photo = $_GET["photo"];

    if (isset($_GET["id"])) {
        $queryDelete = "DELETE FROM tb_siswa WHERE id = $id";
        mysqli_query($koneksi, $queryDelete);
        // cek dan hapus photo
        if ($photo != "default.jpg") {
            unlink("../asset/img/siswa/". $photo);
        }
        header("location: index.php?msg=successDelete");
        return;
    }else {
        header("location: index.php?msg=error-delete");
        return;
    }

?>