<?php 
include '../../system/config.php';
if(empty($_SESSION['username'])){
 echo $Core->href('/account/login'); exit;
}else{
$title = "Lấy Token và Cookie Facebook";
include '../layout/header.php'; 
?>

<?php
include '../layout/footer.php';
}
?>