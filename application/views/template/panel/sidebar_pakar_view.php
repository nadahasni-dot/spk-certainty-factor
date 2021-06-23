  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#l" class="brand-link text-center">
      <!-- <img src="<?= base_url('assets/pakarlte/'); ?>dist/img/pakarLTELogo.png" alt="STEP-A Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-bold">SIPAKAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/user-no-image.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $user['username']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?= base_url('pakar'); ?>" class="nav-link <?= $menu == 'beranda' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>          

          <li class="nav-item">
            <a href="<?= base_url('pakar/penyakit'); ?>" class="nav-link <?= $menu == 'penyakit_pakar' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-bug"></i>
              <p>
                Penyakit
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pakar/gejala'); ?>" class="nav-link <?= $menu == 'gejala_pakar' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-eye-dropper"></i>
              <p>
                Gejala
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pakar/kondisi'); ?>" class="nav-link <?= $menu == 'kondisi_pakar' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>
                Kondisi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pakar/pengetahuan'); ?>" class="nav-link <?= $menu == 'pengetahuan_pakar' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-brain"></i>
              <p>
                Pengetahuan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pakar/hasildiagnosa'); ?>" class="nav-link <?= $menu == 'hasildiagnosa' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Hasil Diagnosa
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('pakar/password'); ?>" class="nav-link <?= $menu == 'password' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Ubah Password
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="<?= base_url('pakar/tentang'); ?>" class="nav-link <?= $menu == 'tentang' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Tentang
              </p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?= base_url('logout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>