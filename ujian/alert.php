<?php if ($msg === "success") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="success">
        <strong>Berhasil!</strong> Data Ujian sudah di simpan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php elseif ($msg === "successDelete") : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="cekNamaMapel">
        <strong>Berhasil!</strong> Data ujian sudah di hapus
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
