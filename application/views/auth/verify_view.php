<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">
      <h2>SIPAKAR</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Verify account status</p>

      <?= $this->session->flashdata('message'); ?>
      <div class="alert <?= $tipe ?>"><?= $message; ?></div>      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->