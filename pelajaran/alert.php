<?php if ($msg === "success") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="success">
        <strong>Berhasil!</strong> Data Kamu sudah di simpan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "cekNamaMapel") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="cekNamaMapel">
        <strong>gagal!</strong> nama matpel ini sudah ada
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "successDelete") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="cekNamaMapel">
        <strong>Berhasil!</strong> Data Kamu sudah di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "errordelete") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="cekNamaMapel">
        <strong>gagal!</strong> Data Kamu gagal di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
