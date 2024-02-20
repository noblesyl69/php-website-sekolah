<?php 

    include_once "../config.php";

    // ambil get jurusan
    $jurusan = $_GET["jurusan"];

    // tampilkan data berdasarkan jurusan yang di pilih

    $resultData = mysqli_query($koneksi, "SELECT * FROM tb_matpel WHERE jurusan = 'Umum' OR jurusan = '$jurusan'");

    $rows = [];
    while ($data = mysqli_fetch_assoc($resultData)) {
        $rows[] = $data;
    }

?>

<?php $no = 1 ?>
<?php foreach ($rows as $data) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td>
            <input type="text" name="mapel[]" value="<?= $data["nama_mapel"]; ?>" class="border-0 bg-transparent col-12" readonly>
        </td>
        <td>
            <input type="text" name="jurus[]" value="<?= $data["jurusan"]; ?>" class="border-0 bg-transparent col-12" readonly>
        </td>
        <td>
            <input type="number" name="nilai[]" value="0" min="0" max="100" step="5" class="form-control nilai " onclick="fnHitung()">
        </td>
    
    </tr>
<?php endforeach; ?>