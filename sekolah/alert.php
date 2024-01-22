<?php if ($msg === "error") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal</strong> Tidak ada gambar di tambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($msg === "format") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal</strong> format bukan gambar!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($msg === "size") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal</strong> file anda terlalu besar!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>