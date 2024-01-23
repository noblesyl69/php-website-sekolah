<?php 

    include_once "../config.php";

    if (isset($_POST["login"])) {
        
        $username = htmlspecialchars(strtolower($_POST["username"]));
        $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password"]));

        // cek email
        $queryUsername = "SELECT * FROM user WHERE username = '$username'";
        $resulUsername = mysqli_query($koneksi, $queryUsername);
        if (mysqli_num_rows($resulUsername) == 1) {
            $rows = mysqli_fetch_assoc($resulUsername);
            // cek password
            if (password_verify($password, $rows["password"])) {
                header("location: ../index.php");
                return;
            }else {
                header("location: login.php?msg=error-password");
                return;
            }
        }else {
            header("location: login.php?msg=error-username");
            return;
        }

    }


?>