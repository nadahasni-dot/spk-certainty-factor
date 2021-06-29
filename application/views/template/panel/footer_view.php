  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline mb-3">
      SIPAKAR
    </div>
    <!-- Default to the left -->
    <!-- <strong>Copyright &copy; <?php // date('Y', time()); ?> <a href="<?php // base_url(); ?>">SIPAKAR</a>.</strong> All rights reserved. -->
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

  <?php if ($menu == 'beranda') : ?>
    <script>
      // chart penyakit
      var pieChartCanvas = $('#pieChartPenyakit').get(0).getContext('2d')
      var pieData = {
        labels: [
          <?php
          foreach ($hasil_penyakit as $penyakit) {
            echo "'" . $penyakit['nama_penyakit'] . "',";
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            foreach ($hasil_penyakit as $penyakit) {
              echo $penyakit['count_penyakit'] . ",";
            }
            ?>
          ],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
        }]
      }
      var pieOptions = {
        legend: {
          display: true,
        }
      }
      // Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var pieChart = new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
      })

      // chart usia
      var pieChartCanvasUsia = $('#pieChartUsia').get(0).getContext('2d')
      var pieDataUsia = {
        labels: [
          <?php
          foreach ($hasil_usia as $penyakit) {
            echo "'" . $penyakit['usia'] . " tahun',";
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            foreach ($hasil_usia as $penyakit) {
              echo $penyakit['count_penyakit'] . ",";
            }
            ?>
          ],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
        }]
      }
      // Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var pieChartUsia = new Chart(pieChartCanvasUsia, {
        type: 'doughnut',
        data: pieDataUsia,
        options: pieOptions
      })

      //-----------------
      // - END PIE CHART -
      //-----------------

      var pieChartCanvasKelamin = $('#pieChartKelamin').get(0).getContext('2d')
      var pieDataKelamin = {
        labels: [
          <?php
          foreach ($hasil_jenis_kelamin as $penyakit) {
            echo "'" . $penyakit['jenis_kelamin'] . "',";
          }
          ?>
        ],
        datasets: [{
          data: [
            <?php
            foreach ($hasil_jenis_kelamin as $penyakit) {
              echo $penyakit['count_penyakit'] . ",";
            }
            ?>
          ],
          backgroundColor: ['#3c8dbc', '#f56954', '#d2d6de']
        }]
      }
      // Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      // eslint-disable-next-line no-unused-vars
      var pieChartKelamin = new Chart(pieChartCanvasKelamin, {
        type: 'doughnut',
        data: pieDataKelamin,
        options: pieOptions
      })
    </script>
  <?php endif; ?>
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