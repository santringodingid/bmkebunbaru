<?php
if ($data) {
    $textStatus = [
        'NOT_CONFIRMED' => 'Belum konfirmasi',
        'YES_CONFIRMED' => 'Siap hadir',
        'NO_CONFIRMED' => 'Tidak bisa hadir',
        'MAYBE_CONFIRMED' => 'Masih ragu',
    ];
    foreach ($data as $d) {
?>
        <div class="row text-xs">
            <div class="col-4"><?= $d->name ?></div>
            <div class="col-3"><?= $d->address ?></div>
            <div class="col-3 text-success"><?= $textStatus[$d->status] ?></div>
            <div class="col-2">
                <button class="btn btn-sm btn-default btn-block" onclick="copyToClipboard('<?= $d->id ?>')">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
        <hr class="my-1">
    <?php
    }
} else {
    ?>
    <h6 class="text-center text-danger">
        Tidak ada data untuk ditampilkan
    </h6>
<?php
}
?>