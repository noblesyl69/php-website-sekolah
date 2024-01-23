
<?php if ($msg === "error-password") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal</strong> password tidak sama
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($msg === "error-username") :?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Gagal</strong> username tidak terdaftar
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>