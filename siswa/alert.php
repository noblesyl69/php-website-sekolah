<?php if ($msg === "success") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Kamu sudah di simpan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "successDelete") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Data Kamu sudah di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    </div>
<?php elseif ($msg === "nisFalid") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> Nis Kamu sudah ada
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "errorFile") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> Tidak Ada file photo yang di upload
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "JenisFile") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> Bukan photo yang kamu upload
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "sizeFile") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> Size terlalu besar
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>