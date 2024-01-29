<?php 

    include_once "../config.php";

    $id = $_GET["id"];
    $photo = $_GET["photo"];
    if (isset($_GET["id"])) {
        $queryDelete = "DELETE FROM tb_guru WHERE id = $id";
        mysqli_query($koneksi, $queryDelete);

        // cek dan hapus file
        if ($photo != 'default.jpg') {
            unlink("../asset/img/guru/". $photo);
        }

        header("location: index.php?msg=successDelete");
        return;
    }else {
        header("location: index.php?msg=error-delete");
        return;
    }

?>