    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="<?= base_url(); ?>">Sistem Pakar</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#services">Layanan</a></li>
                    <li><a href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa</a></li>
                    <li><a href="<?= base_url('login'); ?>">Login</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <h3>Selamat datang di <strong>Sistem Pakar</strong></h3>
            <h1>DETEKSI PINTAR</h1>
            <h2>Sistem ini dilengkapi pengetahuan dari pakar terpercaya untuk menidentifikasi penyakit tertentu</h2>
            <a href="#about" class="btn-get-started scrollto">Lebih Lanjut</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Tentang</h2>
                    <h3>Pelajari Lebih Tentang <span>Sistem Ini</span></h3>
                    <p>Sistem pakar adalah sistem informasi yang mengandung pengetahuan dari satu atau lebih pakar manusia mengenai suatu bidang spesifik.</p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Sistem pakar ini dilengkapi data pengetahuan dari pakar terpercaya untuk mendeteksi beberapa penyakit.
                        </p>
                        <ul>

                            <li><i class="ri-check-double-line"></i> Beberapa Jenis Penyakit Jerawat</li>

                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Pakar yang menjadi sumber pengetahuan telah berpengalaman dalam bidang penyakit dalam. Dan telah melakukan praktik resmi di POLIKLINIK Politeknik Negeri Jember selama lebih dari 5 tahun.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Layanan</h2>
                    <h3>Sistem ini memiliki beberapa <span>Layanan</span></h3>
                    <p>Layanan dibuat untuk admin, seorang pakar, ataupun pengunjung yang ingin melakukan diagnosa.</p>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-search"></i></div>
                            <h4 class="title"><a href="">Diagnosa Otomatis</a></h4>
                            <p class="description">Pengguna hanya perlu melakukan input data diri dan mengisi kuisioner. Hasil akan muncul secara otomatis.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-brain"></i></div>
                            <h4 class="title"><a href="">Smart Detection</a></h4>
                            <p class="description">Deteksi penyakit dilakukan dengan menggunakan metode Certainty Factor menghasilkan diagnosa yang akurat.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4 class="title"><a href="">Dashboard Panel</a></h4>
                            <p class="description">Disediakan dashboard panel bagi admin dan pakar untuk melakukan pengelolaan data.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-world"></i></div>
                            <h4 class="title"><a href="">Mudah Diakses</a></h4>
                            <p class="description">Kemudahan akses, dan penggunaan. Dapat diakses melalui internet kapan saja dimana saja.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="text-center">
                    <h3>Coba Diagnosa Sekarang</h3>
                    <p>Anda dapat mencoba melakukan diagnosa sekarang juga, secara gratis tanpa dipungut biaya. Dapatkan diagnosa secara akurat seperti halnya diagnosa dari seorang pakar asli.</p>
                    <a class="cta-btn" href="<?= base_url('diagnosa/diagnosa'); ?>">Diagnosa Sekarang</a>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title">
                    <h2>F.A.Q</h2>
                    <h3>Frequently Asked <span>Questions</span></h3>
                </div>

                <ul class="faq-list">

                    <li>
                        <a data-toggle="collapse" class="" href="#faq1">Apa itu sistem pakar? <i class="icofont-simple-up"></i></a>
                        <div id="faq1" class="collapse show" data-parent=".faq-list">
                            <p>
                                Sistem pakar adalah suatu program komputer yang mengandung pengetahuan dari satu atau lebih pakar manusia mengenai suatu bidang spesifik. Jenis program ini pertama kali dikembangkan oleh periset kecerdasan buatan pada dasawarsa 1960-an dan 1970-an dan diterapkan secara komersial selama 1980-an.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq2" class="collapsed">Apa itu metode certainty factor? <i class="icofont-simple-up"></i></a>
                        <div id="faq2" class="collapse" data-parent=".faq-list">
                            <p>
                                Certainty Factor atau faktor kepastian diperkenalkan pertama kali pada tahun 1975 oleh shortliffe buchanan. Certainty factor adalah suatu metode untuk membuktikan apakah suatu fakta itu pasti ataukah tidak pasti.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq3" class="collapsed">Bagaimana cara melakukan diagnosa? <i class="icofont-simple-up"></i></a>
                        <div id="faq3" class="collapse" data-parent=".faq-list">
                            <p>
                                Anda dapat menuju halaman diagnosa di menu bagian atas, lalu mengisi data diri, dan menjawab kuisioner deteksi penyakit secara jujur. Hasil diagnosa akan ditampilkan secara otomatis.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq4" class="collapsed">Apakah hasil diagnosa dapat dipertanggung jawabkan? <i class="icofont-simple-up"></i></a>
                        <div id="faq4" class="collapse" data-parent=".faq-list">
                            <p>
                                Perhitungan diagnosa dilakukan berdasarkan pengetahuan seorang pakar ahli dalam penyakit dalam, sehingga akurasi diagnosa dapat dipastikan tinggi.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq5" class="collapsed">Apakah proses diagnosa dipungut biaya? <i class="icofont-simple-up"></i></a>
                        <div id="faq5" class="collapse" data-parent=".faq-list">
                            <p>
                                Diagnosa tidak dipungut biaya sepeser pun. Layanan ini dibuat secara gratis untuk mempermudah pekerjaan seorang pakar.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#faq6" class="collapsed">Untuk apa menginput data diri? <i class="icofont-simple-up"></i></a>
                        <div id="faq6" class="collapse" data-parent=".faq-list">
                            <p>
                                Data diri digunakan untuk keperluan statistik, seperti mengetahui persebaran deteksi penyakit pada rentang usia tertentu, jenis kelamin tertentu. Data yang anda input akan terjaga kerahasiaannya, dan keamanannya.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3>Contact <span>Us</span></h3>
                    <p>Jika ingin mengetahui lebih banyak tentang sistem ini, anda dapat menghubungi kami melalui form dibawah.</p>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.446961988223!2d113.72069951478045!3d-8.15764189412816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b68d87fb43%3A0xabe23a31a78289d3!2sJurusan%20Teknologi%20Informasi%2C%20Politeknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1615042160026!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>Lingkungan Panji, Tegalgede, Kec. Kaliwates, Kabupaten Jember, Jawa Timur 68124</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>farizazik@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+62 815 5302 6285</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->