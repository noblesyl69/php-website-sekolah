<?php 

    include_once "../config.php";

    // function index
    function index($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($pjl = mysqli_fetch_assoc($result)) {
            $rows[] = $pjl;
        }
        return $rows;
    }

    // function edit
    function edit($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($pjl = mysqli_fetch_assoc($result)) {
            $rows[] = $pjl;
        }
        return $rows;
    }

    // create pelajaran
    if (isset($_POST["create"])) {
        $nama_mapel = htmlspecialchars($_POST["nama_mapel"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);
        $guru = htmlspecialchars($_POST["guru"]);

        // cek nama mapel
        $queryCekMapel = "SELECT nama_mapel FROM tb_matpel WHERE nama_mapel = '$nama_mapel'";
        $resultMapel = mysqli_query($koneksi, $queryCekMapel);
        if (mysqli_fetch_assoc($resultMapel)) {
            header("location: create.php?msg=cekNamaMapel");
            return;
        }

        $query = "INSERT INTO tb_matpel(nama_mapel,jurusan,guru) VALUES
                ('$nama_mapel', '$jurusan', '$guru')
                    ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
    }

    // update pelajaran
    if (isset($_POST["update"])) {
        $id = $_GET["id"];
        $nama_mapel = htmlspecialchars($_POST["nama_mapel"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);
        $guru = htmlspecialchars($_POST["guru"]);

        $query = "UPDATE tb_matpel SET 
                    nama_mapel = '$nama_mapel',
                    jurusan = '$jurusan',
                    guru = '$guru'
                    WHERE id = $id
                    ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;
    }

?>