<?php
error_reporting(0);
set_time_limit(0);
date_default_timezone_set("Asia/Ho_Chi_Minh");
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
ob_start('ob_gzhandler');
}else{
ob_start();
}
session_start();
define('HACKER', 'BẠN CHƯA ĐỦ TRÌNH ĐÂU, VỀ BÚ TÍ MẸ ĐI NÀ =))');
$config = array(
    'SERVER' => 'localhost',
    'USERNAME' => 'root',
    'PASSWORD' => '',
    'DATABASE' => 'linhcoder',
);
$root = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$time = time();
$date = date('d/m/Y - H:i:s');
include 'setup/class.php';
$System = new System();
$database = $System->database();
$Core = new Core();
$Curl = new Curl();
include 'setup/create-database.php';
include 'setup/function.php';
if(isset($_SESSION['username'])){
 $username = $_SESSION['username'];
 $account = $Core->sql_fetch_assoc("SELECT * FROM `users` WHERE `username` = '".$username."'");
 $sodu = $account['sodu'];
 $nap = $account['nap'];
 $tieu = $account['tieu'];
 $thanhvien = $account['thanhvien'];
 if($account['login'] == 0){
    $avt = '/asset/themes/v3/dist/img/avt.png';
 }else{
    $avt = '/asset/themes/v3/dist/img/avt.png';
 }
 switch($thanhvien){
     case '0' : $chucvu = "Thành viên"; $chieukhau = 0; break;
     case '1' : $chucvu = "Cộng tác viên"; $chieukhau = 10; break;
     case '2' : $chucvu = "Đại lý"; $chieukhau = 30; break;
     case '3' : $chucvu = "Quản trị viên"; $chieukhau = 100;; break;
 }
}
$config['DOMAIN'] = $System->setting('domain');
$config['TITLE'] = $System->setting('title');
$config['IDFB'] = $System->setting('idfb');
$config['PHONE'] = $System->setting('phone');
$config['ADMIN'] = $System->setting('admin');
?>
