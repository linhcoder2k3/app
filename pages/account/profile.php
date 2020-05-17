<?php 
include '../../system/config.php';
if(empty($_SESSION['username'])){
 echo $Core->href('/account/login'); exit;
}else{
if (isset($_POST['type']) && $_POST['type'] == 'password') {
    $matkhaucu = md5($_POST['matkhaucu']);
    $matkhaumoi = addslashes(md5($_POST['matkhaumoi']));
    $rematkhaumoi = addslashes(md5($_POST['rematkhaumoi']));
    if($matkhaucu != $account['password']){
      $status = false;
      $msg = "Sai mật khẩu cũ";
    }else if($matkhaumoi == $matkhaucu){
      $status = false;
      $msg = "Mật khẩu mới phải khác mật khẩu cũ";
    }else if($matkhaumoi != $rematkhaumoi){
      $status = false;
      $msg = "2 mật khẩu mới không khớp";
    }else{
      $status = true;
      $msg = "Đổi thành công";
      $Core->sql_query("UPDATE `users` SET `password`='$matkhaumoi' WHERE `username`='$username'");
    }
echo json_encode(array('status' => $status, 'msg' => $msg)); exit;
}   
$title = "Thông tin tài khoản";
include '../layout/header.php'; 
?>
<div class="row">
<div class="col-md-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="info-profile" data-toggle="pill" href="#tabs-info-profile" role="tab" aria-controls="tabs-info-profile" aria-selected="true">Thông tin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="change-password" data-toggle="pill" href="#tabs-change-password" role="tab" aria-controls="tabs-change-password" aria-selected="false">Đổi mật khẩu</a>
                  </li>
                </ul>
              </div>
              <div class="card-body col-md-8 mr-auto ml-auto">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                  <div class="tab-pane fade show active" id="tabs-info-profile" role="tabpanel" aria-labelledby="info-profile">
                  <div class="row">
    <div class="col-md-4">
    <div class="form-group">
  <label for="">Email :</label>
  <input type="text" class="form-control" value="<?= $account['email']; ?>" readonly>
</div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
  <label for="">Username :</label>
  <input type="text" class="form-control" value="<?= $username; ?>" readonly>
</div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
  <label for="">Chúc Vụ :</label>
  <input type="text" class="form-control" value="<?= $chucvu; ?>" readonly>
</div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
    <div class="form-group">
  <label for="">Số Dư :</label>
  <input type="text" class="form-control" value="<?= number_format($sodu); ?> VNĐ" readonly>
</div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
  <label for="">Đã Nạp :</label>
  <input type="text" class="form-control" value="<?= number_format($nap); ?> VNĐ" readonly>
</div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
  <label for="">Đã Tiêu :</label>
  <input type="text" class="form-control" value="<?= number_format($tieu); ?> VNĐ" readonly>
</div>
    </div>
</div>
<div class="form-group">
  <label for="">Thời Gian Tham Gia :</label>
  <input type="text" class="form-control" value="<?= date('d/m/Y - H:i:s',$account['reg']); ?>" readonly>
</div>
                  </div>
                  <div class="tab-pane fade col-md-8 mr-auto ml-auto" id="tabs-change-password" role="tabpanel" aria-labelledby="change-password">
                  <div class="form-group">
  <label for="">Mật khẩu cũ :</label>
  <input type="password" class="form-control" id="matkhaucu" placeholder="Nhập mật khẩu cũ">
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="">Mật khẩu mới :</label>
  <input type="password" class="form-control" id="matkhaumoi" placeholder="Nhập mật khẩu mới">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="">Mật khẩu mới :</label>
  <input type="password" class="form-control" id="rematkhaumoi" placeholder="Nhập lại mật khẩu mới">
</div>
</div>
</div>
<div class="form-group text-center">
    <button type="button" class="btn btn-primary" id="change_password">Thay đổi</button>
</div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
</div>
<?php
include '../layout/footer.php';
}
?>