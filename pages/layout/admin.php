<?php
include '../../system/config.php';
if(!isset($_SESSION['username'])){
 echo $Core->href('/'); exit;
}else{
if (isset($_SESSION['username']) && $thanhvien >= 3) {
header('Accept-Ranges: bytes');
header('Content-Type: application/javascript');
?>
    $('#setting').click(function() {
        var domain = $('#domain').val();
        var title = $('#title').val();
        var idfb = $('#idfb').val();
        var phone = $('#phone').val();
        var admin = $('#admin').val();
        var keyword = $('#keyword').val();
        if (!domain || !title || !idfb || !phone || !admin || !keyword) {
            toast('Thiếu thông tin cấu hình', 'warning');
            return;
        } else {
            wait('#setting', false);
            $.post('#', { type: 'setting', domain: domain, title: title, idfb: idfb, phone: phone, admin: admin, keyword: keyword })
                .done(function(body) {
                    var body = JSON.parse(body);
                    setTimeout(function() { location.reload(); }, 2000);
                    swal(body.msg, "success");
                    wait('#setting', true, 'Lưu cấu hình');
                })
                .fail(function(error) {
                    erroMsg('Cấu hình thất bại');
                    wait('#setting', true, 'Lưu cấu hình');
                });
        }
    });
<?php
}
}
?>