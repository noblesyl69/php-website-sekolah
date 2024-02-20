<?php 

    include_once "../config.php";

    // function index
    function index($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($ujian = mysqli_fetch_assoc($result)) {
            $rows[] = $ujian;
        }
        return $rows;
    }

     // create data tb nilai ujian dan tb ujian
     if (isset($_POST["simpan"])) {
        $noUjian = htmlspecialchars($_POST["no_ujian"]);
        $tglUjian = htmlspecialchars($_POST["tgl_ujian"]);
        $nis = htmlspecialchars($_POST["nis"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);

        $totalNilai = htmlspecialchars($_POST["sum"]);
        $minNilai = htmlspecialchars($_POST["min"]);
        $maxNilai = htmlspecialchars($_POST["max"]);
        $rataNilai = htmlspecialchars($_POST["avg"]);

        // cek nilao nilai terendah dan nilai rata - rata
        if ($minNilai < 50 or $rataNilai < 60) {
            $hasilUjian = "TIDAK LULUS";
        }else {
            $hasilUjian = "LULUS";
        }

        $mapels = $_POST["mapel"];
        $jurus = $_POST["jurus"];
        $nilai = $_POST["nilai"];

        // queri data tb ujian
        $queryUjian = "INSERT INTO tb_ujian(no_ujian,tgl_ujian,nis,jurusan,total_nilai,nilai_terendah,nilai_tertinggi,nilai_rata,hasil_ujian) VALUES 
                        ('$noUjian', '$tglUjian', '$nis', '$jurusan', $totalNilai, $minNilai, $maxNilai, $rataNilai, '$hasilUjian')
                        ";
        mysqli_query($koneksi, $queryUjian);

        // query data tb nilai ujian
        // buat perulangan 
        foreach ($mapels as $key => $mapel) {
            $queryNilaiUjian = "INSERT INTO tb_nilai_ujian(no_ujian,pelajaran,jurusan,nilai_ujian) VALUES
                                ('$noUjian', '$mapel', '$jurus[$key]',  $nilai[$key])
                                    ";
            mysqli_query($koneksi, $queryNilaiUjian);
        }

        header("location: index.php?msg=success");
    }

?>