<?php
include 'system/config.php';
if(!isset($_SESSION['username'])){
echo $Core->href('/account/login');
}else{
echo $Core->href('/main/home');
}
exit;
?>
  