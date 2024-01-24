<?php if ($msg === "username") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tambah Data Anda Gagal!</strong> username sudah ada
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "error") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tambah Data Anda Gagal!</strong> file photo kosong
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "file") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tambah Data Anda Gagal!</strong> jenis file bukan Foto
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "size") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tambah Data Anda Gagal!</strong> size file foto anda terlalu besar
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<!-- alert password -->
<?php elseif ($msg === "oldError") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Confirmasi password Anda Gagal!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php elseif ($msg === "success") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Success</strong> Perbaharuan password baru anda berhasil
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>