<?php 

    include_once "../config.php";

    // function index
    function index($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($siswa = mysqli_fetch_assoc($result)) {
            $rows[] = $siswa;
        }
        return $rows;
    }

?>