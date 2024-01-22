<?php 

    include_once "../config.php";

    $id = $_GET["id"];

    if (isset($_GET["id"])) {
        $query = "DELETE FROM tb_sekolah WHERE id = $id";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success-delete");
        return;
    }else {
        header("location: index.php?msg=error-delete");
        return;
    }

?>