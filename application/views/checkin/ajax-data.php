<div class="row">
    <div class="col-6">
        <div class="info-box">
            <span class="info-box-icon bg-success">
                <i class="fas fa-user-check"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Sudah check in</span>
                <span class="info-box-number"><?= $data[0] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <div class="col-6">
        <div class="info-box">
            <span class="info-box-icon bg-danger">
                <i class="fas fa-user-times"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">Belum check in</span>
                <span class="info-box-number"><?= $data[1] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>