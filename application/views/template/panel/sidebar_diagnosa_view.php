  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#l" class="brand-link text-center">
      <!-- <img src="<?= base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="STEP-A Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-bold">SIPAKAR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="<?= base_url('diagnosa'); ?>" class="nav-link <?= $menu == 'beranda' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('diagnosa/diagnosa'); ?>" class="nav-link <?= $menu == 'diagnosa' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-search-plus"></i>
              <p>
                Diagnosa
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a target="_blank" href="<?= base_url(''); ?>" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Riwayat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a target="_blank" href="<?= base_url(''); ?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Daftar Penyakit
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('diagnosa/tentang'); ?>" class="nav-link <?= $menu == 'tentang' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url(''); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>