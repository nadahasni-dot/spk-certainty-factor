<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">
      <h2>SIPAKAR</h2>
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log in to start your session</p>

      <?= $this->session->flashdata('message'); ?>

      <form action="" id="loginForm" role="form" method="post">
        <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group form-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        <div class="input-group form-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 mb-3">
            <button type="submit" id="loginButton" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="<?= base_url('forgotpassword'); ?>">I forgot my password</a>
      </p>
      <!-- <p class="mb-0">
        <a href="<?= base_url('registration'); ?>" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->