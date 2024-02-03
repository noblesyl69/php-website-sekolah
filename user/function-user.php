<?php 

    include_once "../config.php";


    // function upload photo
    function uploadPhoto() {
        $fileName = $_FILES["photo"]["name"];
        $size = $_FILES["photo"]["size"];
        $error = $_FILES["photo"]["error"];
        $tmpName = $_FILES["photo"]["tmp_name"];

        // cek error
        if ($error === 4) {
            header("location: create.php?msg=error");
            return false;
        }

        // cek jenis file
        $jenisFileValid = ["jpg", "jpeg", "png"];
        $jenisFile = explode(".",$fileName);
        $jenisFile = strtolower(end($jenisFile));
        if (!in_array($jenisFile, $jenisFileValid)) {
            header("location: create.php?msg=file");
            return false;
        }

        // cek size
        if ($size > 3000000) {
            header("location: create.php?msg=size");
            return false;
        }

        $jenisFileBaru = uniqid().".".$jenisFile;
        move_uploaded_file($tmpName,"../asset/img/user/".$jenisFileBaru);
        return $jenisFileBaru;
        
    }


    // function index
    function index($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($user = mysqli_fetch_assoc($result)) {
            $rows[] = $user;
        }

        return $rows;
    }

    // function edit
    function edit($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($user = mysqli_fetch_assoc($result)) {
            $rows[]= $user;
        }
        return $rows;
    }

    // function cari
    function cari($key){
        $queryCari = "SELECT * FROM user WHERE username LIKE '%$key%'";
        return index($queryCari);
    }


    // function create
    if (isset($_POST["create"])) {
        
        $username = htmlspecialchars($_POST["username"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $jabatan = htmlspecialchars($_POST["jabatan"]);
        $password = htmlspecialchars($_POST["password"]);
        
        $photo = uploadPhoto();
        if (!$photo) {
            return false;
        }
        // encrip password 
        $password = password_hash($password, PASSWORD_DEFAULT);

        // cek username 
        $cekUsername = "SELECT username FROM user WHERE username = '$username'";
        $quesryUsername = mysqli_query($koneksi, $cekUsername);
        if (mysqli_num_rows($quesryUsername)) {
            header("location: create.php?msg=username");
            return false;
        }

        $query = "INSERT INTO user(username,nama,alamat,jabatan,password,photo) VALUES
                    ('$username','$nama', '$alamat','$jabatan', '$password','$photo')
                    ";
        mysqli_query($koneksi, $query);

        header("location:index.php?msg=success");
        return;
    }

    // update user
    if (isset($_POST["update"])) {
        $id = $_GET["id"];
        $username = htmlspecialchars($_POST["username"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $alamat = htmlspecialchars($_POST["alamat"]);
        $jabatan = htmlspecialchars($_POST["jabatan"]);
        $password = htmlspecialchars($_POST["password"]);

        // cek photo
        $cekPhoto = "SELECT photo FROM user WHERE id = $id";
        $resultPhotoUpdate = mysqli_query($koneksi, $cekPhoto);
        $photoLama = mysqli_fetch_assoc($resultPhotoUpdate);
        if ($_FILES["photo"]["error"] === 4) {
            $photo = $photoLama["photo"];
        } else {
            $photo = uploadPhoto();
        }

        // encrip pasword baru
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE user SET
                    username = '$username',
                    nama = '$nama',
                    password = '$password',
                    alamat = '$alamat',
                    jabatan = '$jabatan',
                    photo = '$photo'
                    WHERE id = $id
                    ";
        mysqli_query($koneksi, $query);
        header("location: index.php?msg=success");
        return;
    }


?>