<?php $this->load->view('partials/header-reg'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-success text-center">
                                <i class="fas fa-check-circle"></i> Registrasi Sukses...
                            </h6>
                            <hr>
                            <dl class="row">
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
                            <div class="card bg-lime color-palette p-4">
                                <h6><i class="icon fas fa-info"></i> Informasi</h6>
                                Selanjutnya, Antum bisa akses web aplikasi ini : <br>
                                <dl class="row">
                                    <dt class="col-sm-4 font-weight-normal">Username</dt>
                                    <dd class="col-sm-8 font-weight-bold mb-0">
                                        <?= $school->username ?>
                                    </dd>
                                    <dt class="col-sm-4 font-weight-normal">Password</dt>
                                    <dd class="col-sm-8">
                                        12345
                                    </dd>
                                </dl>
                                <a class="btn btn-default btn-block" href="<?= base_url() ?>">Login sekarang</a>
                            </div>
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
<?php $this->load->view('authentication/js-authentication'); ?>