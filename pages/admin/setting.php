<?php 
include '../../system/config.php';
if(empty($_SESSION['username'])){
 echo $Core->href('/account/login'); exit;
}else{
if(isset($_SESSION['username']) && $thanhvien >= 3){
if(isset($_POST['type']) && $_POST['type'] == 'setting'){
    $domain = addslashes($_POST['domain']);
    $title = addslashes($_POST['title']);
    $idfb = addslashes($_POST['idfb']);
    $phone = addslashes($_POST['phone']);
    $admin = addslashes($_POST['admin']);
    $keyword = addslashes($_POST['keyword']);
    $Core->sql_query("UPDATE `setting` SET `domain`= '$domain',`title`='$title',`idfb`='$idfb',`phone`='$phone',`admin`='$admin',`keyword`='$keyword' WHERE 1");
    $msg = "Lưu thành công";
    echo json_encode(array('msg' => $msg)); exit;
}
$title = "Cầu hình thông tin";
include '../layout/header.php'; 
?>
<div class="row">
    <div class="col-md-12">
    <div class="card">
              <div class="card-header bg-info">
                <h3 class="card-title">Config</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
  <label for="">Domain :</label>
  <input type="text" class="form-control" id="domain" value="<?= $System->setting('domain'); ?>" placeholder="Nhập tên miền">
</div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
  <label for="">Title :</label>
  <input type="text" class="form-control" id="title" value="<?= $System->setting('title'); ?>" placeholder="Nhập tiêu đề website">
</div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
  <label for="">ID Facebook :</label>
  <input type="number" class="form-control" id="idfb" value="<?= $System->setting('idfb'); ?>" placeholder="Nhập ID Facebook">
</div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
  <label for="">Phone :</label>
  <input type="number" class="form-control" id="phone" value="<?= $System->setting('phone'); ?>" placeholder="Nhập số điện thoại">
</div>
    </div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label for="">Admin :</label>
  <input type="text" class="form-control" id="admin" value="<?= $System->setting('admin'); ?>" placeholder="Nhập tên Admin">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label for="">Keyword :</label>
  <input type="text" class="form-control" id="keyword" value="<?= $System->setting('keyword'); ?>" placeholder="Nhập từ khoá tìm kiếm">
</div>
</div>
</div>
<div class="form-group text-center">
<button type="button" class="btn btn-primary" id="setting">Lưu cấu hình</button>
</div>
              </div>
              <!-- /.card-body -->
            </div>
    </div>
</div>
<?php
include '../layout/footer.php';
}else{
    die(HACKER); exit;
}
}
?>