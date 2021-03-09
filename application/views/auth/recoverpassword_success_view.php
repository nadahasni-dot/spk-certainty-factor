<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">
      <h2>SIPAKAR</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Success saving new password. Now you can use your new password in Scrum App.</p>

      <?= $this->session->flashdata('message'); ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->