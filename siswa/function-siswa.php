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

    // function edit
    function edit($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($siswa = mysqli_fetch_assoc($result)) {
            $rows[] = $siswa;
        }
        return $rows;
    }

    // function upload photo siswa
    function uploadPhotoSiswa() {
        $nameFile = $_FILES["photo"]["name"];
        $error = $_FILES["photo"]["error"];
        $size = $_FILES["photo"]["size"];
        $tmpName = $_FILES["photo"]["tmp_name"];

        // cek error
        if ($error === 4) {
            header("location: create.php?msg=errorFile");
            return;
        }

        // cek jenis file
        $jenisFileValid = ["jpg", "png", "jpeg"];
        $fileValid = explode(".", $nameFile);
        $fileValid = strtolower(end($fileValid));
        if (!in_array($fileValid, $jenisFileValid)) {
            header("location: create.php?msg=JenisFile");
            return;
        }

        // cek size
        if ($size > 3000000) {
            header("location: create.php?msg=sizeFile");
            return;
        }

        $fileValidBaru = uniqid().".".$fileValid;
        move_uploaded_file($tmpName, "../asset/img/siswa/".$fileValidBaru);
        return $fileValidBaru;
    }



    // create siswa
    if (isset($_POST["create"])) {
        
        $nis = trim(htmlspecialchars($_POST["nis"]));
        $nama = trim(htmlspecialchars($_POST["nama"]));
        $alamat = trim(htmlspecialchars($_POST["alamat"]));
        $kelas = trim(htmlspecialchars($_POST["kelas"]));
        $jurusan = trim(htmlspecialchars($_POST["jurusan"]));
        $photo = uploadPhotoSiswa();
        if (!$photo) {
            return false;
        }

        // cek nis
        $queryNis = "SELECT nis FROM tb_siswa WHERE nis = '$nis'";
        $resultNis = mysqli_query($koneksi, $queryNis);
        if (mysqli_fetch_assoc($resultNis)) {
            header("location: create.php?msg=nisFalid");
            return;
        }

        

        $query = "INSERT INTO tb_siswa(nis,nama,alamat,kelas,jurusan,photo) VALUES
                    ('$nis', '$nama', '$alamat', '$kelas','$jurusan','$photo')
                    ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;
    }

    // update siswa
    if (isset($_POST["update"])) {

        $id = $_GET["id"];
        $nis = trim(htmlspecialchars($_POST["nis"]));
        $nama = trim(htmlspecialchars($_POST["nama"]));
        $alamat = trim(htmlspecialchars($_POST["alamat"]));
        $kelas = trim(htmlspecialchars($_POST["kelas"]));
        $jurusan = trim(htmlspecialchars($_POST["jurusan"]));

        // cek foto
        $queryCekPhoto = "SELECT photo FROM tb_siswa WHERE id = $id";
        $resulPhoto = mysqli_query($koneksi, $queryCekPhoto);
        $photoData = mysqli_fetch_assoc($resulPhoto);

        if ($_FILES["photo"]["error"] === 4) {
            $photo = $photoData["photo"];
        }else {
            $photo = uploadPhotoSiswa();
        }

        $query = "UPDATE tb_siswa SET
                nis = '$nis',
                nama = '$nama',
                alamat = '$alamat',
                kelas = '$kelas',
                jurusan = '$jurusan',
                photo = '$photo'
                WHERE id = $id
                ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;
        
    }

?>