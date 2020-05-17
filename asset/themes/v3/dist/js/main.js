var loading = () => {
        $('.loading').html('<div id="preload" class="preload-container text-center"><img  class="preload-icon" src="/asset/themes/v3/dist/img/loading.gif" alt="Loading..." /></div>');
    }
    (function($) {
        loading();
        setTimeout(() => {
            $('html').removeClass('preloading');
            $('#preload').delay(1000).fadeOut();
        }, 1000);
        var path = window.location.href;
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    })(jQuery);

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function swal(text, icon) {
    return Swal.fire('Thông Báo', text, icon);
}

function toast(text, icon) {
    return Toast.fire({ icon: icon, title: text });
}

function wait(id, status, text = null) {
    if (!status) {
        return $(id).prop('disabled', true).html("<i class=\"fa fa-spinner fa-spin\"></i> Đang Xử Lý");
    } else {
        return $(id).prop('disabled', false).html(text);
    }
}

function erroMsg(text = null) {
    if (!text) {
        return toast('Có lỗi xảy ra, vui lòng thử lại sau', 'error');
    } else {
        return toast(text + ' , vui lòng thử lại sau', 'error');
    }
}
$('#login').click(function() {
    var username = $('#username').val();
    var password = $('#password').val();
    if (!username || !password) {
        toast('Vui lòng nhập đủ thông tin', 'warning');
        return;
    } else {
        wait('#login', false);
        $.post('#', { type: 'login', username: username, password: password })
            .done(function(body) {
                var body = JSON.parse(body);
                if (body.status) {
                    setTimeout(function() { location.reload(); }, 2000);
                    swal(body.msg, "success");
                } else {
                    swal(body.msg, "error");
                }
                wait('#login', true, 'Đăng nhập');
            })
            .fail(function(error) {
                erroMsg('Đăng nhập thất bại');
                wait('#login', true, 'Đăng nhập');
            });
    }
});
$('#register').click(function() {
    var email = $('#email').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var repassword = $('#repassword').val();
    if (!email || !username || !password || !repassword) {
        toast('Vui lòng nhập đủ thông tin', 'warning');
        return;
    } else {
        wait('#register', false);
        $.post('#', { type: 'register', email: email, username: username, password: password, repassword: repassword })
            .done(function(body) {
                var body = JSON.parse(body);
                if (body.status) {
                    setTimeout(function() { location.reload(); }, 2000);
                    swal(body.msg, "success");
                } else {
                    swal(body.msg, "error");
                }
                wait('#register', true, 'Đăng kí');
            })
            .fail(function(error) {
                erroMsg('Đăng kí thất bại');
                wait('#register', true, 'Đăng kí');
            });
    }
});
$('#change_password').click(function() {
    var matkhaucu = $('#matkhaucu').val();
    var matkhaumoi = $('#matkhaumoi').val();
    var rematkhaumoi = $('#rematkhaumoi').val();
    if (!matkhaucu || !matkhaumoi || !rematkhaumoi) {
        toast('Vui lòng nhập đủ thông tin', 'warning');
        return;
    } else {
        wait('#change_password', false);
        $.post('#', { type: 'password', matkhaucu: matkhaucu, matkhaumoi: matkhaumoi, rematkhaumoi: rematkhaumoi })
            .done(function(body) {
                var body = JSON.parse(body);
                if (body.status) {
                    setTimeout(function() { location.reload(); }, 2000);
                    swal(body.msg, "success");
                } else {
                    swal(body.msg, "error");
                }
                wait('#change_password', true, 'Thay đổi');
            })
            .fail(function(error) {
                erroMsg('Thay đổi thất bại');
                wait('#change_password', true, 'Thay đổi');
            });
    }
});