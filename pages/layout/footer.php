<?php if(isset($_SESSION['username'])){ ?>
</div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="index.html"><?= $config['DOMAIN']; ?></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    Version <b class="text-danger"><?= $System->version(); ?></b> - Memory Used <b class="text-danger"><?= $System->debug(); ?></b> MB.
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<?php } ?>
<!-- REQUIRED SCRIPTS -->
<!-- Sweetalert2 -->
<script src="/asset/themes/v3/dist/js/sweetalert2@9.js"></script>
<!-- Bootstrap -->
<script src="/asset/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Main -->
<script src="/asset/themes/v3/dist/js/main.js?<?= $time; ?>"></script>
<?php if(isset($_SESSION['username'])){ ?>
<!-- App -->
<script src="/asset/themes/v3/dist/js/app.js?<?= $time; ?>"></script>
<?php } ?>
<?php if (isset($_SESSION['username']) && $thanhvien >= 3) { ?>
<!-- Admin -->
<script src="/asset/themes/v3/dist/js/admin.js?<?= $time; ?>"></script>
<?php } ?>
<!-- AdminLTE -->
<script src="/asset/themes/v3/dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="/asset/themes/v3/dist/js/demo.js"></script>
</body>
</html>
