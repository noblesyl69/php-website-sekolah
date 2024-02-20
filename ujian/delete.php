<?php 

    include_once "../config.php";

    $id = $_GET["id"];

    if (isset($_GET["id"])) {
        mysqli_query($koneksi, "DELETE FROM tb_ujian WHERE id = $id");
        header("location: index.php?msg=successDelete");
        return;
    }

?>