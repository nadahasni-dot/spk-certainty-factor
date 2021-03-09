<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info mt-3">
                        <div class="card-header">
                            <h2 class="card-title">Hasil Diagnosa</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12 table-responsive p-0">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th>Gejala yang dialami</th>
                                            <th style="width: 200px;">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($hasil_gejala as $row_gejala) :
                                        ?>
                                            <tr>
                                                <td class="align-middle"><?= $no++; ?></td>
                                                <td class="align-middle"><?= $row_gejala['nama_gejala']; ?></td>
                                                <td class="align-middle"><?= $row_gejala['nama_kondisi']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            $no = 1;
                            foreach ($hasil_penyakit as $penyakit) :
                                if ($no == 1) :
                            ?>
                                    <div class="row">
                                        <div class="col">
                                            <div class="callout callout-info">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="<?= base_url('assets/img/penyakit/') . $penyakit['gambar_penyakit'] ?>" class="rounded mx-auto d-block img-fluid">
                                                    </div>
                                                    <div class="col-md-9 mt-2">
                                                        <h4>Hasil Diagnosa</h4>
                                                        <p>Jenis penyakit yang paling mendekati</p>
                                                        <h5 class="text-danger font-weight-bold"><?= $penyakit['nama_penyakit']; ?></h5>
                                                        <p class="text-primary">Tingkat akurasi hingga <cite title="Source Title"><?= number_format($penyakit['nilai_perhitungan'] * 100, 2) . '% (' . number_format($penyakit['nilai_perhitungan'], 4) . ')'; ?></cite></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                    $no++;
                                endif;
                            endforeach;
                            ?>
                            <div class="row">
                                <div class="col">
                                    <div id="accordion">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                                        Detail
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="collapse show">
                                                <div class="card-body">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($hasil_penyakit as $penyakit) :
                                                        if ($no == 1) :
                                                    ?>
                                                            <?= $penyakit['deskripsi_penyakit']; ?>
                                                    <?php
                                                            $no++;
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-warning">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                                                        Saran
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="collapse show">
                                                <div class="card-body">
                                                    <?php
                                                    $no = 1;
                                                    foreach ($hasil_penyakit as $penyakit) :
                                                        if ($no == 1) :
                                                    ?>
                                                            <?= $penyakit['saran_penyakit']; ?>
                                                    <?php
                                                            $no++;
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-danger">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                                                        Kemungkinan Lain
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="collapse show">
                                                <div class="card-body">
                                                    <ul>
                                                        <?php
                                                        if (count($hasil_penyakit) <= 1) {
                                                            echo "Tidak ada kemungkinan lain";
                                                        } else {
                                                            $no = 1;
                                                            foreach ($hasil_penyakit as $penyakit) :
                                                                if ($no != 1) :
                                                        ?>
                                                                    <li><?= $penyakit['nama_penyakit'] . ' ' . number_format($penyakit['nilai_perhitungan'] * 100, 2) . '% (' . number_format($penyakit['nilai_perhitungan'], 4) . ')'; ?></li>

                                                        <?php
                                                                endif;
                                                                $no++;
                                                            endforeach;
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->