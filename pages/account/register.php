<?php 
include '../../system/config.php';
if(isset($_SESSION['username'])){
 echo $Core->href('/'); exit;
}else{
    if (isset($_POST['type']) && $_POST['type'] == 'register') {
        $email = addslashes($_POST['email']);
        $username = addslashes($_POST['username']);
        $password = addslashes(md5($_POST['password']));
        $repassword = addslashes(md5($_POST['repassword']));
        $check = $Core->sql_fetch_assoc("SELECT * FROM `users` WHERE `username` = '$username'");
        if ($check) {
            $status = false;
            $msg = "Tài khoản đã tồn tại";
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status = false;
            $msg = "Email không hợp lệ";
        }else if ($password != $repassword) {
            $status = false;
            $msg = "2 Mật khẩu không khớp nhau";
        } else {
            $Core->sql_query(
                "INSERT INTO `users` 
                (`id`,`email`, `username`, `password`, `sodu`,`nap`,`tieu`, `thanhvien`, `login`, `reg`)
                 VALUES 
                (NULL,'$email','$username','$password','0','0','0','0','0','$time')");         
            $status = true;
            $msg = "Đăng kí thành công";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg)); exit;
    }
$title = "Đăng kí tài khoản";
include '../layout/meta.php'; 
?>
<body class="hold-transition register-page">
<div class="register-box">

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Tạo tài khoản mới</p>

        <div class="input-group mb-3">
          <input type="email" id="email" class="form-control" placeholder="Địa chỉ Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" id="username" class="form-control" placeholder="Tên đăng nhập">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" placeholder="Mật khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="repassword" class="form-control" placeholder="Nhập lại mật khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" checked>
              <label for="agreeTerms">
              Đồng ý các điều khoản.
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block" id="register">Đăng kí</button>
          </div>
          <!-- /.col -->
        </div>

      <a href="/account/login" class="text-center">Đăng nhập tài khoản.</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?php
include '../layout/footer.php';
}
?>