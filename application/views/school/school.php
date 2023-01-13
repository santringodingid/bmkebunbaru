<?php $this->load->view('partials/header'); ?>
<input type="hidden" id="url" value="<?= base_url() ?>">
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content p-3">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-2">
                    <input type="text" id="changeName" class="form-control form-control-sm w-100" placeholder="Tekan F2 lalu masukkan nama" autofocus onkeyup="loadData()">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-2">
                    <select id="changeCategory" onchange="loadData()" class="form-control form-control-sm w-100" style="width: 150px">
                        <option value="">..:Semua Status:..</option>
                        <option value="NOT_CONFIRMED">Belum Konfirmasi</option>
                        <option value="YES_CONFIRMED">Konfirmasi Hadir</option>
                        <option value="NO_CONFIRMED">Konfirmasi Tidak Hadir</option>
                        <option value="MAYBE_CONFIRMED">Konfirmasi Ragu</option>
                    </select>
                </div>
            </div>
            <div class="row skeleton_loading__">
                <div class="col-lg-4">
                    <div class="card skeleton py-2 mb-3"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card skeleton py-2 mb-3"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card skeleton py-2 mb-3"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card skeleton py-2 mb-3"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card skeleton py-2 mb-3"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card skeleton py-2 mb-3"></div>
                </div>
            </div>
            <div class="row" id="show-product"></div>
        </div>
    </section>
    <!-- /.content -->
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
<script src="<?= base_url() ?>template/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>template/plugins/jquery-validation/additional-methods.min.js"></script>
<?php $this->load->view('school/js-school'); ?>