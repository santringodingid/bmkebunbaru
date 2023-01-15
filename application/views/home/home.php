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
            <?php if ($this->session->userdata('role') != 'SCHOOL') { ?>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="callout callout-success">
                            <h6 class="text-center">Rekap registrasi peserta</h6>
                            <table class="table table-sm table-stripped">
                                <tbody>
                                    <?php
                                    $textStatus = [
                                        'NOT_CONFIRMED' => 'Belum konfirmasi',
                                        'YES_CONFIRMED' => 'Konfirmasi hadir',
                                        'NO_CONFIRMED' => 'Konfirmasi tidak hadir',
                                        'MAYBE_CONFIRMED' => 'Konfirmasi ragu',
                                    ];
                                    if ($reg) {
                                        foreach ($reg as $r) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?= $textStatus[$r->status] ?>
                                                </td>
                                                <td>
                                                    <?= $r->total ?>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <hr class="mt-0">
            <div class="row mt-4">
                <div class="col-12">
                    <h6 class="text-center">Rundown Acara</h6>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6 col-xl-6">
                    <div class="callout callout-success">
                        <h6 class="text-center mb-3">Selasa, 24 J. Tsaniyah 1444</h6>
                        <table class="table table-sm table-stripped mb-0">
                            <thead>
                                <tr>
                                    <th>PUKUL (WIB)</th>
                                    <th>ACARA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12:00 - 15:30</td>
                                    <td>Check In Peserta</td>
                                </tr>
                                <tr>
                                    <td>15:30 - 17:00</td>
                                    <td>Pembukaan</td>
                                </tr>
                                <tr>
                                    <td>15:30 - 17:00</td>
                                    <td>Pembukaan</td>
                                </tr>
                                <tr>
                                    <td>17:00 - 18:45</td>
                                    <td>Isoma</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="callout callout-success">
                        <h6 class="text-center mb-3">Rabu, 25 J. Tsaniyah 1444</h6>
                        <table class="table table-sm table-stripped mb-0">
                            <thead>
                                <tr>
                                    <th>PUKUL (WIB)</th>
                                    <th>ACARA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>18:45 - 23:45</td>
                                    <td>Jalsah Ula</td>
                                </tr>
                                <tr>
                                    <td>23:45 - 07:00</td>
                                    <td>Istirahat</td>
                                </tr>
                                <tr>
                                    <td>07:00 - 07:30</td>
                                    <td>Sarapan pagi</td>
                                </tr>
                                <tr>
                                    <td>07:30 - 12:45</td>
                                    <td>Jalsah Tsaniyah</td>
                                </tr>
                                <tr>
                                    <td>12:45 - 14:30</td>
                                    <td>Isoma</td>
                                </tr>
                                <tr>
                                    <td>14:30 - 16:30</td>
                                    <td>Penutupan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('home/js-home'); ?>