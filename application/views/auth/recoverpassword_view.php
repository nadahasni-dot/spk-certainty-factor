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

      <form action="" role="form" id="recoverForm" method="post">
        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        <input type="hidden" name="email" value="<?= $email; ?>">
        <div class="input-group form-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('confpassword', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group form-group mb-3">
          <input type="password" name="confpassword" class="form-control" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->