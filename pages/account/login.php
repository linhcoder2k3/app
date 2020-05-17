<?php 
include '../../system/config.php';
if(isset($_SESSION['username'])){
 echo $Core->href('/'); exit;
}else{
    if (isset($_POST['type']) && $_POST['type'] == 'login') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $check = $Core->sql_fetch_assoc("SELECT * FROM `users` WHERE `username` = '$username'");
        if (!$check) {
            $status = false;
            $msg = "Tài khoản không tồn tại";
        } elseif ($check['id'] && $password != $check['password']) {
            $status = false;
            $msg = "Sai mật khẩu, hãy thử lại";
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $md5password;
            $status = true;
            $msg = "Đăng nhập thành công";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg)); exit;
    }
$title = "Đăng nhập hệ thống";
include '../layout/meta.php'; 
?>
    <body class="hold-transition login-page">
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng nhập hệ thống</p>

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
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
              Ghi nhớ ?
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-success btn-block" id="login">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>

      <div class="social-auth-links text-center mb-3">
        <p>- Hoặc -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Đăng nhập Facebook
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="/account/forgot-password">Quên mật khẩu ?</a>
      </p>
      <p class="mb-0">
        <a href="/account/register" class="text-center">Đăng kí tài khoản mới.</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
include '../layout/footer.php';
}
?>