<div class="card">
    <div class="card-body">
        <?php if ($data['status'] == 200) { ?>
            <dl class="row mb-0">
                <dt class="col-sm-4 font-weight-normal">Instansi/Lembaga</dt>
                <dd class="col-sm-8 font-weight-bold">
                    <?php
                    $textStatus = [
                        'NOT_CONFIRMED' => 'Belum konfirmasi',
                        'YES_CONFIRMED' => 'Siap hadir',
                        'NO_CONFIRMED' => 'Tidak bisa hadir',
                        'MAYBE_CONFIRMED' => 'Masih ragu',
                    ];
                    ?>
                    <?= $data['name'] ?> <br>
                    <span class="font-weight-normal">
                        <?= $data['address'] ?>
                    </span>
                </dd>
                <dt class="col-sm-4 font-weight-normal">Peserta</dt>
                <dd class="col-sm-8">
                    <?php
                    if ($data['participant'] != 0) {
                        foreach ($data['participant'] as $dp) {
                            echo '- ' . $dp['name'] . '<br>';
                        }
                    } else {
                        echo '<span class="text-danger">Belum ada peserta</span>';
                    }
                    ?>
                </dd>
                <dt class="col-sm-4 font-weight-normal">Status konfirmasi</dt>
                <dd class="col-sm-8">
                    <?= $textStatus[$data['status__']] ?>
                </dd>
                <dt class="col-sm-4 font-weight-normal">Status check in</dt>
                <dd class="col-sm-8">
                    Berhasil check in pada <?= $data['checked'] ?>
                </dd>
                <dt class="col-sm-4 font-weight-normal">Kode berkas</dt>
                <dd class="col-sm-8">
                    <h2 class="text-success">
                        <?= $data['type'] ?>
                    </h2>
                </dd>
            </dl>
        <?php } ?>
    </div>
</div>