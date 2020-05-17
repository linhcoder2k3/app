<?php 
include '../../system/config.php';
if(empty($_SESSION['username'])){
 echo $Core->href('/account/login'); exit;
}else{
$title = "Trang chủ";
include '../layout/header.php'; 
?>
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Thành Viên</span>
                <span class="info-box-number"><?= number_format($Core->sql_num_row("SELECT * FROM `users`")); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-secret"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Đại Lý</span>
                <span class="info-box-number"><?= number_format($Core->sql_num_row("SELECT * FROM `users` WHERE `thanhvien` = '2'")); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-shield"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cộng Tác Viên</span>
                <span class="info-box-number"><?= number_format($Core->sql_num_row("SELECT * FROM `users` WHERE `thanhvien` = '1'")); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-exchange-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Giao Dịch</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

<div class="row">
    <div class="col-md-4">
    <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?= $avt; ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $username; ?> <?php if($thanhvien > 0) echo '<i class="fa fa-fw fa-check-circle" style="color:RGB(88, 144, 255); font-size: 14px;" data-toggle="tooltip" title="" data-original-title="'.$chucvu.'"></i>' ?></h3>

                <p class="text-muted text-center">Số dư: <b class="text-danger"><?= number_format($sodu); ?></b> VNĐ</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Chức Vụ</b> <a class="float-right text-success"><?= $chucvu; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Đã Nạp</b> <a class="float-right"><b class="text-danger"><?= number_format($nap); ?></b> VNĐ</a>
                  </li>
                  <li class="list-group-item">
                    <b>Đã Tiêu</b> <a class="float-right"><b class="text-danger"><?= number_format($tieu); ?></b> VNĐ</a>
                  </li>
                </ul>

                <a href="/account/loaded-money" class="btn btn-primary btn-block"><b>Nạp Tiền</b></a>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
    <div class="col-md-8">
    <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Cổng Trò Chuyện</h3>
              </div>
              <div class="card-body">
                
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>
<?php
include '../layout/footer.php';
}
?>