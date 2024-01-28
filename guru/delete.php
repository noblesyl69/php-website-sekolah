<?php 

    include_once "../config.php";

    $id = $_GET["id"];
    if (isset($_GET["id"])) {
        $queryDelete = "DELETE FROM tb_guru WHERE id = $id";
        mysqli_query($koneksi, $queryDelete);
        header("location: index.php?msg=successDelete");
        return;
    }else {
        header("location: index.php?msg=error-delete");
        return;
    }

?>