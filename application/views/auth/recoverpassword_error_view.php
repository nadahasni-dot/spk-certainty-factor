<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">
      <h2>SIPAKAR</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <?= $this->session->flashdata('message'); ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->