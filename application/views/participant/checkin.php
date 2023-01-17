<?php $this->load->view('partials/header'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <?php
                        if (!$registration) {
                        ?>
                            <div class="card-body p-0">
                                <img class="w-100" src="<?= base_url() ?>assets/qrcode/<?= $id ?>.png" alt="">
                            </div>
                            <div class="card-footer">
                                <h6 class="text-success">Petunjuk :</h6>
                                - Tingkatkan cahaya smartphone Anda <br>
                                - Tunjukkan QR Code ini kepada resepsionis
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card-body">
                                <h6 class="text-success text-center">
                                    Anda berhasil check in pada <?= datetimeIDFormat($registration->created_at) ?>
                                </h6>
                            </div>
                        <?php
                        }
                        ?>
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