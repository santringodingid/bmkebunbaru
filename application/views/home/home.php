<?php $this->load->view('partials/header'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-success" id="demo">
                    <div class="col-12 row mb-2 justify-content-center">
                        <h6 class="text-center">Road to Bahsul Masail </h6>
                    </div>
                    <div class="col-12 row justify-content-center">
                        <div class="box-timer text-center mr-3">
                            <h2 class="mb-0 text-success" id="day">-</h2>
                            <span>Hari</span>
                        </div>
                        <div class="box-timer text-center mr-3">
                            <h2 class="mb-0 text-success" id="hour">-</h2>
                            <span>Jam</span>
                        </div>
                        <div class="box-timer text-center mr-3">
                            <h2 class="mb-0 text-success" id="minute">-</h2>
                            <span>Menit</span>
                        </div>
                        <div class="box-timer text-center">
                            <h2 class="mb-0 text-success" id="second">-</h2>
                            <span>Detik</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('home/js-home'); ?>