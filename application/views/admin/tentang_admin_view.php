<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tentang SIPAKAR</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Tentang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <article>
                                <h1 class="text-center">SIPAKAR</h1>
                                <h2 class="text-center">Implementasi Sistem Pakar Dengan Metode Certainty Factor</h2>
                                <h2 class="text-center mb-5">Copyright &copy <?= date('Y', time()); ?> <a href="#">Fariz Gustafianto</a></h2>

                                <p>Sistem pakar yang mampu mendiagnosa beberapa jenis penyakit/jerawat pada wajah berdasarkan pengetahuan yang diberikan langsung dari pakar/ahlinya dan melalui studi literatur. Penelitian ini menggunakan metode perhitungan Certainty Factor (CF) dalam menghitung tingkat kepakaran. Data penelitian ini terdiri dari data gejala dan data penyakit, serta data aturan. Sistem pakar pada organisasi ditujukan untuk penambahan value, peningkatan produktivitas serta area manajerial yang dapat mengambil kesimpulan dengan cepat.</p>
                                <p />
                                <p>Certainty Factor (CF) merupakan salah satu teknik yang digunakan untuk mengatasi ketidakpastian dalam pengambilan keputusan. Certainty Factor (CF) dapat terjadi dengan berbagai kondisi.</p>
                                <p />
                                <p>Diantara kondisi yang terjadi adalah terdapat beberapa antensenden (dalam rule yang berbeda) dengan satu konsekuen yang sama. Dalam kasus ini, kita harus mengagregasikan nilai CF keseluruhan dari setiap kondisi yang ada. Berikut formula yang digunakan:</p>
                                <p />
                                <p>
                                    CF [H, E] = MB [H, E] – MD [H, E]<br /><br />
                                    Keterangan: <br>
                                    CF [H, E] = Faktor kepastian dari hipotesis H yang dipengaruhi oleh gejala E. Besarnya CF antara -1 sampai dengan 1. Nilai -1 menunjukkan ketidakpercayaan mutlak, sedangkan nilai 1 menunjukkan kepercayaan mutlak.<br />
                                    MB [H, E] = Ukuran kenaikan kepercayaan terhadap hipotesis H yang dipengaruhi oleh gejala E.
                                    <br />
                                    MD [H, E] = Ukuran kenaikan ketidak percayaan terhadap hipotesis H yang dipengaruhi oleh gejala E. <br />
                                </p>
                                <p />
                                <p />
                                <p />
                            </article>
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