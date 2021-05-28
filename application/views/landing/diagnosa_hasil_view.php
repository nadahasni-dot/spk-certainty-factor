<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="<?= base_url(); ?>">Sistem Pakar</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url(); ?>#about">Tentang</a></li>
                <li><a href="<?= base_url(); ?>#services">Layanan</a></li>
                <li class="active"><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
                <li><a href="<?= base_url('login'); ?>">Login</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">

                        <h2 class="entry-title">
                            Hasil Diagnosa
                        </h2>

                        <div class="entry-content">
                            <ul>
                                <li><span class="font-weight-bold">Nama :</span> <?= $identitas['nama'] ?></li>
                                <li><span class="font-weight-bold">Usia :</span> <?= $identitas['usia'] ?></li>
                                <li><span class="font-weight-bold">Jenis Kelamin :</span> <?= $identitas['jenis_kelamin'] ?></li>
                                <li><span class="font-weight-bold">Alamat :</span> <?= $identitas['alamat'] ?></li>
                            </ul>

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
                                    <h3>Hasil Diagnosa Penyakit</h3>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="<?= base_url('assets/img/penyakit/') . $penyakit['gambar_penyakit'] ?>" class="img-fluid" width="100%" alt="">
                                                </div>
                                                <div class="col-md-9 text-dark">
                                                    <h4><?= $penyakit['nama_penyakit']; ?></h4>
                                                    <p class="text-danger">
                                                        Tingkat akurasi hingga <cite title="Source Title"><?= number_format($penyakit['nilai_perhitungan'] * 100, 2) . '% (' . number_format($penyakit['nilai_perhitungan'], 4) . ')'; ?></cite>
                                                    </p>
                                                    <h4>Deskripsi Penyakit</h4>
                                                    <p class="text-dark"><?= $penyakit['deskripsi_penyakit']; ?></p>
                                                    <?php if ($penyakit['penyakit_artikel'] != null) : ?>
                                                        <p class="text-dark"><?= $penyakit['penyakit_artikel']; ?></p>
                                                    <?php endif; ?>
                                                    <h4>Saran Singkat Penyakit</h4>
                                                    <p class="text-dark"><?= $penyakit['saran_penyakit']; ?></p>
                                                    <?php if ($penyakit['penyakit_saran_artikel'] != null) : ?>
                                                        <p class="text-dark"><?= $penyakit['penyakit_saran_artikel']; ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End blog author bio -->
                            <?php
                                    $no++;
                                endif;
                            endforeach;
                            ?>

                            <h3>Kemungkinan Lainnya</h3>
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

                            <a href="<?= base_url('diagnosa/diagnosa'); ?>" class="btn btn-success mt-4">Lakukan Diagnosa Lagi</a>
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->