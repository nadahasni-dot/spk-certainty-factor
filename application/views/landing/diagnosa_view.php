<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="<?= base_url(); ?>">Sistem Pakar</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url(); ?>#about">About</a></li>
                <li><a href="<?= base_url(); ?>#services">Services</a></li>
                <li><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
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
                            Form Diagnosa
                        </h2>

                        <div class="entry-content">
                            <div class="alert alert-info">
                                <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                                Silahkan memilih gejala sesuai dengan kondisi anda, anda dapat memilih kepastian kondisi dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses (diagnosa) di bawah untuk melihat hasil.
                            </div>

                            <p>
                                Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                            </p>

                        </div>

                        <!-- <div class="entry-footer clearfix">
                            <div class="float-left">
                                <i class="icofont-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">Business</a></li>
                                </ul>

                                <i class="icofont-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul>
                            </div>

                            <div class="float-right share">
                                <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                                <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                                <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                            </div>

                        </div> -->

                    </article><!-- End blog entry -->

                    <div class="blog-comments">

                        <div class="reply-form clearfix">
                            <form id="form-diagnosa" action="" method="POST">
                                <fieldset>
                                    <h4>Form Data Diri</h4>
                                    <p>Harap lengkapi data diri anda</p>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama*" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input name="usia" type="number" id="usia" class="form-control" placeholder="Usia*" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <select name="jenis_kelamin" class="form-control jenis_kelamin" required>
                                                <option>Pilih Jenis Kelamin*</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="alamat" id="alamat" type="text" class="form-control" placeholder="Alamat lengkap*" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary float-right" id="next-button">Selanjutnya</button>
                                </fieldset>
                                <fieldset>
                                    <h4>Kuisioner Deteksi Penyakit</h4>
                                    <p>Harap isi sesuai dengan kondisi yang anda alami</p>

                                    <div class="col-12 table-responsive p-0">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">No</th>
                                                    <th>Gejala</th>
                                                    <th style="width: 200px;">Pilih Kondisi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($gejala as $row_gejala) :
                                                ?>
                                                    <tr>
                                                        <td class="align-middle"><?= $no++; ?></td>
                                                        <td class="align-middle"><?= $row_gejala['nama_gejala']; ?></td>
                                                        <td class="align-middle">
                                                            <select class="form-control select2" name="kondisi[]" id="">
                                                                <option value="0">Pilih Kondisi</option>
                                                                <?php foreach ($kondisi as $row_kondisi) : ?>
                                                                    <option value="<?= $row_gejala['id_gejala'] . '_' . $row_kondisi['id_kondisi']; ?>"><?= $row_kondisi['nama_kondisi']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" class="btn btn-primary float-left" id="back-button">Kembali</button>
                                    <button type="submit" class="btn btn-primary float-right">Diagnosa</button>
                                </fieldset>
                            </form>

                        </div>

                    </div><!-- End blog comments -->


                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->