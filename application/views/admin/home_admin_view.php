<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3><?= $count_pakar ?></h3>

                                    <p>Total Pakar</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?= base_url('admin/pengguna'); ?>" class="small-box-footer">
                                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?= $count_pengetahuan ?></h3>

                                    <p>Total Pengetahuan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-brain"></i>
                                </div>
                                <a href="<?= base_url('admin/pengetahuan'); ?>" class="small-box-footer">
                                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-pink">
                                <div class="inner">
                                    <h3><?= $count_penyakit ?></h3>

                                    <p>Total Penyakit</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-bug"></i>
                                </div>
                                <a href="<?= base_url('admin/penyakit'); ?>" class="small-box-footer">
                                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?= $count_gejala ?></h3>

                                    <p>Total Gejala</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-eye-dropper"></i>
                                </div>
                                <a href="<?= base_url('admin/gejala'); ?>" class="small-box-footer">
                                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                    <div class="row">
                        <!-- penyakit -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Statistik Berdasar Penyakit</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart-responsive">
                                                <canvas id="pieChartPenyakit" height="150"></canvas>
                                            </div>
                                            <!-- ./chart-responsive -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-light p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <?php foreach ($hasil_penyakit as $penyakit) : ?>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <?= $penyakit['nama_penyakit']; ?>
                                                    <span class="float-right text-info">
                                                        <i class="fas fa-arrow-right text-sm"></i>
                                                        <?= $penyakit['count_penyakit']; ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- /.footer -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <!-- usia -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Statistik Berdasar Usia</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart-responsive">
                                                <canvas id="pieChartUsia" height="150"></canvas>
                                            </div>
                                            <!-- ./chart-responsive -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-light p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <?php foreach ($hasil_usia as $penyakit) : ?>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <?= $penyakit['usia'] . ' tahun'; ?>
                                                    <span class="float-right text-info">
                                                        <i class="fas fa-arrow-right text-sm"></i>
                                                        <?= $penyakit['count_penyakit']; ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- /.footer -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <!-- jenis kelamin -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Statistik Berdasar Jenis Kelamin</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart-responsive">
                                                <canvas id="pieChartKelamin" height="150"></canvas>
                                            </div>
                                            <!-- ./chart-responsive -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer bg-light p-0">
                                    <ul class="nav nav-pills flex-column">
                                        <?php foreach ($hasil_jenis_kelamin as $penyakit) : ?>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <?= $penyakit['jenis_kelamin']; ?>
                                                    <span class="float-right text-info">
                                                        <i class="fas fa-arrow-right text-sm"></i>
                                                        <?= $penyakit['count_penyakit']; ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- /.footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>