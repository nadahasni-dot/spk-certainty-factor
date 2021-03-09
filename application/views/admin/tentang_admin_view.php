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

                                <p>Sistem pakar yang mampu mendiagnosa penyakit pada ayam berdasarkan pengetahuan yang diberikan langsung dari pakar/ahlinya dan melalui studi literatur. Penelitian ini menggunakan metode perhitungan Certainty Factor (CF) dalam menghitung tingkat kepakaran. Data penelitian ini terdiri dari data gejala dan data penyakit ayam, serta data aturan. Sistem pakar pada organisasi ditujukan untuk penambahan value, peningkatan produktivitas serta area manajerial yang dapat mengambil kesimpulan dengan cepat.</p>
                                <p />
                                <p>Certainty Factor (CF) merupakan salah satu teknik yang digunakan untuk mengatasi ketidakpastian dalam pengambilan keputusan. Certainty Factor (CF) dapat terjadi dengan berbagai kondisi.</p>
                                <p />
                                <p>Diantara kondisi yang terjadi adalah terdapat beberapa antensenden (dalam rule yang berbeda) dengan satu konsekuen yang sama. Dalam kasus ini, kita harus mengagregasikan nilai CF keseluruhan dari setiap kondisi yang ada. Berikut formula yang digunakan:</p>
                                <p />
                                <p>
                                    CFc (CF1,CF2) = CF1 + CF2 (1- CF1) ; jika CF1 dan CF2 keduanya posistif<br />
                                    CFc (CF1,CF2) = CF1 + CF2 (1+ CF1) ; jika CF1 dan CF2 keduanya negative<br />
                                    CFc (CF1,CF2) = {CF1 + CF2} / (1-min{| CF1|,| CF2|}) ; jika salah satu negatif<br /></p>
                                <p />
                                <p>
                                    Contoh :<br />
                                    [R1] : IF fever THEN thypus {cf : -0.40}<br />
                                    [R2] : IF amount of tromobsit low THEN thypus {cf : -0.50}<br />
                                    [R3] : IF body is weak THEN thypus {cf : 0.75}<br />
                                    [R4] :IF diarhea THEN thypus {cf : 0.60}<br /><br />
                                    Tentukan Nilai dari CF gabungannya:<br /><br />
                                    Jawaban:<br /><br />
                                    1. R1 dan R2 :: CFc (CF1,CF2) = CF1 + CF2 (1+ CF1)<br />
                                    = -0,40 + (-0,50)(1+(-0,40))<br />
                                    = -0,40 + (-0,50)(0,60)<br />
                                    = -0,40 – 0,30<br />
                                    = -0,70<br /><br />
                                    2. R3 dan R4 :: CFc (CF1,CF2) = CF1 + CF2 (1- CF1)<br />
                                    = 0,75 + 0,6 (1-0,75)<br />
                                    = 0,75 + 0,6. 0,25<br />
                                    = 0,75 + 0,15<br />
                                    = 0,9<br /><br />
                                    3. Gabungkan (a) dan (b) :: CFc (CF1,CF2) = {CF1 + CF2} / (1-min{| CF1|,| CF2|})<br />
                                    = {-0,70+0,9}/(1-min{|-0,70|,|0,90|})<br />
                                    = 0,20 / ( 1-{0,70})<br />
                                    = 0,20 / 0,30<br />
                                    = 0,67<br /><br /></p>
                                <p>
                                    Kesimpulannya: Suatu penyakit thypus disebabkan oleh gejala-gejala tersebut di atas memiliki nilai Certainty Factor ( CF) sebesar 0,67</p>
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