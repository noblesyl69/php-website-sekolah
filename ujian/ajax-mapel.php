<?php 

    include_once "../config.php";

    // ambil data get jurusan
    $jurusan = $_GET["jurusan"];

    $no = 1;
    // buat query jurusan
    $queryMapel = mysqli_query($koneksi, "SELECT * FROM tb_matpel WHERE jurusan = 'umum' or jurusan = '$jurusan'");
    $rows = [];
    while ($data = mysqli_fetch_assoc($queryMapel)) {
        $rows[] = $data;
    }
?>

<?php foreach ($rows as $row) : ?>
        
    <tr>
        <td><?= $no; ?></td>
        <td>
            <input type="text" name="mapel[]" value="<?= $row["nama_mapel"]; ?>" class="border-0 bg-transparent col-12" readonly>
        </td>
        <td>
            <input type="text" name="jurusan[]" value="<?= $row["jurusan"]; ?>" class="border-0 bg-transparent col-12" readonly>
        </td>
        <td>
            <input type="number" name="nilai[]" value="0" min="0" max="100" step="5" class="form-control nilai ">
        </td>
    
    </tr>
<?php endforeach; ?>
