<?php
if ($school['status'] == 200) {
    $no = 1;
    foreach ($school['data'] as $data) {
        $status = $data['status'];
        if ($status == 'NOT_CONFIRMED') {
            $class = 'danger';
            $icon = '<i class="fas fa-times-circle"></i>';
        } else {
            $class = 'success';
            $icon = '<i class="far fa-check-circle"></i>';
        }
?>
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row p-0">
                        <div class="col-md-6 col-xl-4 mb-2 mb-md-0 mb-xl-0">
                            <b><?= $data['name'] ?></b> <br>
                            <small class="text-muted"><?= $data['address'] ?></small>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-2 mb-md-0 mb-xl-0">
                            <p class="mb-0">
                                <?php
                                if ($data['participant']['status'] == 200) {
                                    foreach ($data['participant']['data'] as $p) {
                                ?>
                                        - <?= $p->name ?> <br>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <span class="text-danger">
                                        Belum ada peserta
                                    </span>
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-2 mb-md-0 mb-xl-0">
                            <p class="mb-0">
                                <span class="badge badge-<?= $class ?>">
                                    <?= $icon ?>
                                    <?= $data['text'] ?>
                                </span>
                                <?php
                                if ($status != 'NOT_CONFIRMED') {
                                ?>
                                    <br>
                                    <small class="text-muted">
                                        Pada : <?= datetimeIDFormat($data['date']) ?>
                                    </small>
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6 col-xl-2">
                            <button class="btn btn-sm btn-default btn-block" onclick="copyToClipboard('<?= base_url() ?>authentication/autolog/<?= $data['username'] ?>')">
                                <i class="fas fa-copy"></i>
                                Salin URL
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>