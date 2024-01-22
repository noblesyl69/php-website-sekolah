<?php 

    include_once "../config.php";
    
    // function index
    function index($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while ($sekolah = mysqli_fetch_assoc($result)) {
            $rows[] = $sekolah; 
        }
        return $rows;
    }

    // function upload gambar
    function uploadGambar() {
        
        $namaFile = $_FILES["gambar"]["name"];
        $error = $_FILES["gambar"]["error"];
        $size = $_FILES["gambar"]["size"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        // cek error ada gambar di upload atau tidak
        if ($error === 4) {
            header("location: create.php?msg=error");
            return false;
        }

        // cek format file
        $namaValidateFormat = [ "jpg", "jpeg", "png"];
        $nameValid = explode(".", $namaFile);
        $nameValid = strtolower(end($nameValid));
        if (!in_array($nameValid, $namaValidateFormat)) {
            header("location: create.php?msg=format");
            return false;
        }

        // cek size
        if ($size > 3000000) {
            header("location: create.php?msg=size");
            return false;
        }

        $nameValidBaru = uniqid().".".$nameValid;
        move_uploaded_file($tmpName, "../asset/img/sekolah/".$nameValidBaru);
        return $nameValidBaru;
    }

    if (isset($_POST["create"])) {
        
        $nama = htmlspecialchars($_POST["nama"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $akreditasi = htmlspecialchars($_POST["akreditasi"]);
        $status = htmlspecialchars($_POST["status"]);
        $email = htmlspecialchars($_POST["email"]);
        $visimisi = htmlspecialchars($_POST["visimisi"]);
        $gambar = uploadGambar();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO tb_sekolah(nama,alamat,akreditasi,status,email,visimisi,gambar) VALUES 
                    ('$nama', '$alamat', '$akreditasi', '$status', '$email', '$visimisi', '$gambar')
                    ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;

    }



?>