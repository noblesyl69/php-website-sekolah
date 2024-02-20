<?php 

    session_start();
    include_once "../config.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../auth/login.php");
        exit;
    }

    // munculkan data ujian 
    $queryUjian = mysqli_query($koneksi, "SELECT * FROM tb_ujian");
    $rows = [];
    while ($data = mysqli_fetch_assoc($queryUjian)) {
        $rows[] = $data;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Ujian</title>
</head>
<body>
    <div style="text-align: center;">
        <h2 style="margin-bottom: 15px;">Hasil Laporan Ujian</h2>
        <h2>Smk Negeri Makassar</h2>
    </div>

    <table style="margin: auto;" class="table table-hover mt-4" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th scope="col">No Ujian</th>
                                            <th scope="col">Nis</th>
                                            <th scope="col">Jurusan</th>
                                            <th scope="col">Nilai Terendah</th>
                                            <th scope="col">Nilai Tertinggi</th>
                                            <th scope="col">Nilai Rata-Rata</th>
                                            <th scope="col">Hasil Ujian</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php foreach ($rows as $ujian) :?>
                                        <tr>
                                            <td><?= $ujian["no_ujian"]; ?></td>
                                            <td><?= $ujian["nis"]; ?></td>
                                            <td><?= $ujian["jurusan"]; ?></td>

                                            <td><?= $ujian["nilai_terendah"]; ?></td>
                                            <td><?= $ujian["nilai_tertinggi"]; ?></td>
                                            <td><?= $ujian["nilai_rata"]; ?></td>
                                            <td>
                                                <?php if ($ujian["hasil_ujian"] === "LULUS") :?> 
                                                    <button class="btn btn-success btn-sm col-10 fw-bold text-uppercase"><?= $ujian["hasil_ujian"]; ?></button> 
                                                <?php else :?>
                                                    <button class="btn btn-danger btn-sm col-10 fw-bold text-uppercase"><?= $ujian["hasil_ujian"]; ?></button> 
                                                <?php endif; ?>
                                            </td>
                                            
                                           

                                            
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
</body>
</html>

<script>
    window.print();
</script>