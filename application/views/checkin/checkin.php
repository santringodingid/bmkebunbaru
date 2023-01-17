<?php $this->load->view('partials/header'); ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h6>Checkin Peserta</h6>
                        </div>
                        <div class="card-body">
                            <input autocomplete="off" id="id" data-inputmask="'mask' : '999999'" data-mask="" type="text" autofocus class="form-control">
                            <small class="text-success">Masukkan ID lalu tekan ENTER</small>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#modal-search">
                                Cari Peserta (Tekan F8)
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xl-8">
                    <div class="row">
                        <div class="col-12" id="show-data">

                        </div>
                        <div id="show-data-check" class="col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-search">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <input autocomplete="off" type="text" onkeyup="search()" id="changeName" class="form-control form-control-sm" placeholder="Cari nama">
                </div>
                <div class="modal-body" id="show-search" style="min-height: 45vh; max-height: 85vh; overflow: auto"></div>
            </div>
        </div>
    </div>
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
<?php $this->load->view('checkin/js-checkin'); ?>