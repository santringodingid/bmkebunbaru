<?php $this->load->view('partials/header-reg'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">
                                Registrasi Peserta BM Kebunbaru
                            </h6>
                        </div>
                        <div class="card-body">
                            <form id="form-confirmation" autocomplete="off">
                                <div class="form-group">
                                    <label for="wa">Konfirmasi</label>
                                    <select name="confirmation" id="changeConfirmation" class="form-control">
                                        <option value="">.:Pilih:.</option>
                                        <option value="YES_CONFIRMED">Hadir</option>
                                        <option value="MAYBE_CONFIRMED">Ragu-ragu</option>
                                        <option value="NO_CONFIRMED">Tidak Hadir</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp">Nomor WhatsApp</label>
                                    <input data-inputmask="'mask' : '9999-9999-9999'" data-mask="" type="text" class="form-control" id="whatsapp" name="whatsapp">
                                    <small class="text-info">Pastikan nomor aktif dan valid. Ex: 082337899122 </small>
                                </div>
                                <div class="form-group">
                                    <label for="school">Instansi/Lembaga</label>
                                    <select name="school" id="school" class="form-control w-100 select2bs4">
                                        <option value="">.:Pilih:.</option>
                                        <?php
                                        if ($school) {
                                            foreach ($school as $s) {
                                        ?>
                                                <option value="<?= $s->id ?>"><?= $s->name . ' - ' . $s->address ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-0" id="wrap-content-form">
                                    <label for="name">Nama Peserta</label>
                                    <input name="name[]" type="text" class="form-control text-uppercase mb-3" id="name" placeholder="Peserta I">
                                    <input name="name[]" type="text" class="form-control text-uppercase" id="name" placeholder="Peserta II">
                                </div>
                        </div>
                        </form>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-block" onclick="saveConfirmation()">
                                Kirim
                            </button>
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