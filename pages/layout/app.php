<?php
include '../../system/config.php';
if(!isset($_SESSION['username'])){
 echo $Core->href('/'); exit;
}else{
header('Accept-Ranges: bytes');
header('Content-Type: application/javascript');
?>
const config = {
    root : '<?= $root; ?>',
    domain : '<?= $config['DOMAIN']; ?>',
    idfb : '<?= $config['IDFB']; ?>',
    phone : '<?= $config['PHONE']; ?>',
    admin : '<?= $config['ADMIN']; ?>'
}
const account = {
    username : '<?= $username; ?>',
    thanhvien : '<?= $thanhvien; ?>',
    chucvu : '<?= $chucvu; ?>',
    chieukhau : '<?= $chieukhau; ?>',
}
$(document).ready(function() {
 
});
<?php
}
?>