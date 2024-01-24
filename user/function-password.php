<?php 

    session_start();
    include_once "../config.php";

    if (isset($_POST["gantiPasswod"])) {
        
        $oldPassword = $_POST["oldPassword"];
        $newPassword = $_POST["newPassword"];
        $confPassword = $_POST["confPassword"];

        // cek passwod old
        $dataPassword = $_SESSION["id"];
        $queryPasswodOld = "SELECT password FROM user WHERE id = $dataPassword";
        $resultPassword = mysqli_query($koneksi, $queryPasswodOld);
        $Password = mysqli_fetch_assoc($resultPassword);

        // cek password dan conffg
        if ($newPassword !== $confPassword) {
            header("location: passsword.php?msg=configError");
            return;
        }

        // veri password lama
        if (!password_verify($oldPassword, $Password["password"])) {
            header("location: passsword.php?msg=oldError");
            return;
        }else {
            
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $query = "UPDATE user SET 
                        password = '$newPassword'
                        WHERE id = $dataPassword
                        ";
            mysqli_query($koneksi, $query);
            header("location: index.php?msg=success");
            return;
        }

    }

?>