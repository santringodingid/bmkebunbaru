<?php $this->load->view('partials/header'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-success text-center">
                                <i class="fas fa-tv"></i> Data Instansi/Lembaga
                            </h6>
                            <hr>
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
                                    <?= $school->name ?> <br>
                                    <span class="font-weight-normal">
                                        <?= $school->address ?>
                                    </span>
                                </dd>
                                <dt class="col-sm-4 font-weight-normal">Status konfirmasi</dt>
                                <dd class="col-sm-8 text-success">
                                    <?= $textStatus[$school->status] ?>
                                </dd>
                                <dt class="col-sm-4 font-weight-normal">Peserta</dt>
                                <dd class="col-sm-8">
                                    <?php
                                    $participant = $this->am->getparticipant($school->id);
                                    if ($participant) {
                                        foreach ($participant as $dp) {
                                            echo '- ' . $dp->name . '<br>';
                                        }
                                    } else {
                                        echo '<span class="text-danger">Belum ada peserta</span>';
                                    }
                                    ?>
                                </dd>
                            </dl>

                        </div>
                        <div class="card-footer">
                            <?php
                            $d1 = new DateTime('2023-01-17 12:00:00');
                            $d2 = new DateTime();
                            if ($d2 >= $d1) {
                                if (!$registration) {
                            ?>
                                    <a href="<?= base_url() ?>participant/checkin" class="btn btn-primary btn-block">
                                        Check In Sekarang
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <h6 class="text-success text-center">
                                        Anda berhasil check in pada : <br> <?= datetimeIDFormat($registration->created_at) ?>
                                    </h6>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <!-- LOADING -->
    <div class="wrap-loading__" style="display: none">
        <div class="loading__ fade-in-loading__">
            <div class="wrapper-loading__">
                <div class="lds-dual-ring"></div>
                <span class="font-italic text-loading__">Ke pasar beli pepaya, tunggu sebentar, ya.....</span>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('participant/js-participant'); ?>