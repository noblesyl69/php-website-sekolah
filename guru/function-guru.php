<?php 

    include_once "../config.php";

    // function index guru
    function index($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($guru = mysqli_fetch_assoc($result)) {
            $rows[] = $guru;
        }
        return $rows;
    }

    // create guru
    if (isset($_POST["create"])) {
        $nip = trim(htmlspecialchars($_POST["nip"]));
        $nama = trim(htmlspecialchars($_POST["nama"]));
        $alamat = trim(htmlspecialchars($_POST["alamat"]));
        $tlp = trim(htmlspecialchars($_POST["tlp"]));
        $agama = trim(htmlspecialchars($_POST["agama"]));
        $photo = uploadPhotoGuru();
        if (!$photo) {
            return false;
        }

        // cek nip
        $cekNip = "SELECT nip FROM tb_guru WHERE nip = $nip";
        $queryNip = mysqli_query($koneksi, $cekNip);
        if (mysqli_fetch_assoc($queryNip)) {
            header("location: create.php?msg=nipFalid");
            return;
        }

        $query = "INSERT INTO tb_guru(nip,nama,alamat,tlp,agama,photo) VALUES
                ('$nip', '$nama', '$alamat', '$tlp','$agama','$photo')
                ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;
    }

    // update guru
    if (isset($_POST["update"])) {
        $id = $_GET["id"];
        $nip = trim(htmlspecialchars($_POST["nip"]));
        $nama = trim(htmlspecialchars($_POST["nama"]));
        $alamat = trim(htmlspecialchars($_POST["alamat"]));
        $tlp = trim(htmlspecialchars($_POST["tlp"]));
        $agama = trim(htmlspecialchars($_POST["agama"]));

        // cek photo
        $queryCekPhoto = "SELECT photo FROM tb_guru WHERE id = $id";
        $resulPhoto = mysqli_query($koneksi, $queryCekPhoto);
        $photoData = mysqli_fetch_assoc($resulPhoto);

        if ($_FILES["photo"]["error"] === 4) {
            $photo = $photoData["photo"];
        }else {
            $photo = uploadPhotoGuru();
            // cek dan delete photo lama
            if ($photoData["photo"] !== "defauld.jpg") {
                unlink("../asset/img/guru/". $photoData["photo"]);
            }
        }

        $query = "UPDATE tb_guru SET
                nip = '$nip',
                nama = '$nama',
                alamat = '$alamat',
                tlp = '$tlp',
                agama = '$agama',
                photo = '$photo'
                WHERE id = $id
                ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;
            
    }

    function edit($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($guru = mysqli_fetch_assoc($result)) {
            $rows[] = $guru;
        }
        return $rows;
    }

    // function upload photo gutu
    function uploadPhotoGuru() {
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
        move_uploaded_file($tmpName, "../asset/img/guru/".$fileValidBaru);
        return $fileValidBaru;
    }


?>