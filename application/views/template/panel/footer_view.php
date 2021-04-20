  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      SIPAKAR
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y', time()); ?> <a href="<?= base_url(); ?>">SIPAKAR</a>.</strong> All rights reserved.
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- pace-progress -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/pace-progress/pace.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/adminlte/'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/adminlte/'); ?>dist/js/adminlte.min.js"></script>
  <!-- CHart Js -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/select2/js/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/adminlte/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <script src="<?= base_url('assets/scripts/globals.js') ?>"></script>
  
  <?php if ($menu == 'pengguna') : ?>
    <script src="<?= base_url('assets/scripts/pengguna.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'penyakit') : ?>
    <script src="<?= base_url('assets/scripts/penyakit.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'penyakit_pakar') : ?>
    <script src="<?= base_url('assets/scripts/penyakit.pakar.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'gejala') : ?>
    <script src="<?= base_url('assets/scripts/gejala.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'gejala_pakar') : ?>
    <script src="<?= base_url('assets/scripts/gejala.pakar.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'kondisi') : ?>
    <script src="<?= base_url('assets/scripts/kondisi.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'kondisi_pakar') : ?>
    <script src="<?= base_url('assets/scripts/kondisi.pakar.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'pengetahuan') : ?>
    <script src="<?= base_url('assets/scripts/pengetahuan.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'pengetahuan_pakar') : ?>
    <script src="<?= base_url('assets/scripts/pengetahuan.pakar.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'diagnosa') : ?>
    <script src="<?= base_url('assets/scripts/diagnosa.js') ?>"></script>
  <?php endif; ?>
  <?php if ($menu == 'hasildiagnosa') : ?>
    <script src="<?= base_url('assets/scripts/hasil.diagnosa.js') ?>"></script>
  <?php endif; ?>
  </body>

  </html>