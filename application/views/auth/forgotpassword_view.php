<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">
      <h2>SIPAKAR</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <?= $this->session->flashdata('message'); ?>

      <form action="" role="form" id="forgotForm" method="post">
        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group form-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= base_url('login'); ?>">Login</a>
      </p>
      <!-- <p class="mb-0">
        <a href="<?= base_url('registration'); ?>" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->