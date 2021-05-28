<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Gejala_model');
        $this->load->model('Kondisi_model');
        $this->load->model('Pengetahuan_model');
        $this->load->model('Penyakit_model');
    }

    // * fungsi halaman home
    // public function index()
    // {
    //     $data['title'] = "Beranda";
    //     $data['menu'] = "beranda";
    //     $data['sub_menu'] = null;
    //     $data['sub_menu_action'] = null;
    //     // user data
    //     $data['user'] = null;

    //     $data['count_penyakit'] = $this->Penyakit_model->countPenyakit('all');
    //     $data['count_gejala'] = $this->Gejala_model->countGejala('all');
    //     $data['count_pengetahuan'] = $this->Pengetahuan_model->countPengetahuan('all');
    //     $data['count_pakar'] = $this->User_model->countUser('all');

    //     $this->load->view('template/panel/header_view', $data);
    //     $this->load->view('template/panel/sidebar_diagnosa_view');
    //     $this->load->view('diagnosa/home_diagnosa_view');
    //     $this->load->view('template/panel/control_view');
    //     $this->load->view('template/panel/footer_view');
    // }

    // * halaman Diagnosa ===================================================================================
    public function diagnosa()
    {
        $data['title'] = "Diagnosa";
        $data['menu'] = "diagnosa";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        $data['gejala'] = array_reverse($this->Gejala_model->getGejala('all'));
        $data['kondisi'] = $this->Kondisi_model->getKondisi('all');

        $this->form_validation->set_rules('kondisi[]', 'Kondisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/landing/landing_header_view', $data);
            $this->load->view('landing/diagnosa_view');
            $this->load->view('template/landing/landing_footer_view');
        } else {
            // * perhitungan CF START
            // * inisiasi variabel yang akan diinput ke db
            $list_gejala = array();
            $list_penyakit = array();

            // * ambil pilihan pengguna
            $nama = $this->input->post('nama');
            $usia = $this->input->post('usia');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');

            $input_gejala_kondisi = $this->input->post('kondisi');

            foreach ($input_gejala_kondisi as $row) {
                // * jika pengguna memilih kondisi dan tidak 0
                if (strlen($row) > 1) {
                    // * memecah id gejala dan id kondisi yang dipilih pengguna misal 16_1 menjadi array [16,1]
                    $split_pilihan = explode('_', $row);

                    // * menyimpan gejala dan kondisi yang dipilih pengguna kedalam list_gejala
                    $list_gejala += array($split_pilihan[0] => $split_pilihan[1]);
                }
            }

            // ? ambil semua penyakit
            $semua_penyakit = $this->Penyakit_model->getPenyakit('all');

            // ? perulangan menghitung CF tiap penyakit
            foreach ($semua_penyakit as $penyakit) {
                // echo 'PERHITUNGAN PENYAKIT ' . $penyakit['nama_penyakit'] . ' =========== <br>';

                // ? ambil semua basis pengetahuan dari penyakit saat ini berdasar id_penyakit
                $pengetahuan_terkait = $this->Pengetahuan_model->getPengetahuan('id_penyakit', $penyakit['id_penyakit']);

                // ? inisiasi variabel CF untuk perhitungan
                $cf = 0;
                $cf_lama = 0;
                // ! perulangan menghitung CF[H,E] 1, CF[H,E] 2, dst
                // ! urutan untuk penanda urutan CF[H,E]
                $urutancf = 1;

                // ? hitung dan cek tiap pengetahuan terkait
                foreach ($pengetahuan_terkait as $pengetahuan) {
                    // ? cek tiap gejala pada pengetahuan terkait                    

                    foreach ($input_gejala_kondisi as $gejala) {
                        $gejala = explode("_", $gejala);

                        // ? jika gejala pada pengetahuan sama dengan gejala yang diinput pengguna
                        if ($pengetahuan['id_gejala'] == $gejala[0]) {
                            // ? ambil kondisi terpilih untuk mengakses cf_kondisi
                            $kondisi_terpilih = $this->Kondisi_model->getKondisi('id_kondisi', $gejala[1]);

                            // ? perhitungan rumus CF gejala iterasi saat ini
                            $cf = $pengetahuan['cf_pakar'] * $kondisi_terpilih['cf_kondisi'];

                            // echo 'urutan: ' . $urutancf . '<br>';
                            // echo 'CF GEJALA SAAT INI: CF PAKAR * CF KONDISI DIPILIH USER <br>';
                            // echo 'CF GEJALA SAAT INI:' . $pengetahuan['cf_pakar'] . ' * ' . $kondisi_terpilih['cf_kondisi'] . '<br>';
                            // echo 'CF GEJALA SAAT ini: ' . $cf . '<br><br>';

                            // ? iterasi pertama maka CF 1 langsung menjadi CF OLD
                            if ($urutancf <= 1) {
                                $cf_lama = $cf;

                                // echo 'CF OLD: ' . $cf_lama . '<br><br>';
                            } else { // ? selain iterasi pertama maka gunakan rumus perhitungan dengan cf lama sebelumnya (CF COMBINE)                                
                                // echo 'CF OLD[' . $urutancf . ']: CF OLD[' . ($urutancf - 1) . '] + (' . $cf . ' * (1 - CF OLD[' . ($urutancf - 1) . '])) <br>';
                                // echo 'CF OLD[' . $urutancf . ']: ' . $cf_lama . ' + (' . $cf . ' * (1 - ' . $cf_lama . ')) <br>';

                                $cf_lama = $cf_lama + ($cf * (1 - $cf_lama));

                                // echo 'CF OLD: ' . $cf_lama . '<br><br>';
                            }

                            $urutancf++;
                        }
                    }
                }
                if ($cf_lama > 0) { // ! jika nilai tidak negatif maka tambahkan ke daftar diagnosa
                    //  ? tambahkan penyakit ke daftar list jika sesuai gejala dan perhitungan
                    $list_penyakit += array($penyakit['id_penyakit'] => number_format($cf_lama, 4));
                }
            }

            // * mengurutkan dari nilai tertinggi ke rendah
            arsort($list_penyakit);

            // echo '<pre>';
            // var_dump($list_penyakit);
            // echo '</pre>';
            // die;

            // * perhitungan CF END

            // ? tampilkan hasil perhitungan
            $data['title'] = "Diagnosa";
            $data['menu'] = "diagnosa";

            $data['hasil_penyakit'] = $this->Penyakit_model->getHasilPenyakit($list_penyakit);
            $data['hasil_gejala'] = $this->Gejala_model->getHasilGejala($list_gejala);
            $data['identitas'] = array(
                'nama' => $nama,
                'usia' => $usia,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
            );

            // $this->load->view('template/panel/header_view', $data);
            // $this->load->view('template/panel/sidebar_diagnosa_view');
            // $this->load->view('diagnosa/hasil_diagnosa_view');
            // $this->load->view('template/panel/control_view');
            // $this->load->view('template/panel/footer_view');

            // ? input hasil perhitungan ke db
            if ($list_penyakit && $list_gejala) {
                $this->load->model('Hasil_model');

                $id_penyakit = null;
                $nilai = null;
                $no = 1;

                foreach ($list_penyakit as $key => $value) {
                    if ($no == 1) {
                        $id_penyakit = $key;
                        $nilai = $value;
                    }

                    $no++;
                }

                $hasil = array(
                    'id_penyakit' => $id_penyakit,
                    'hasil_penyakit' => json_encode($list_penyakit),
                    'hasil_gejala' => json_encode($list_gejala),
                    'hasil_nilai' => $nilai,
                    'nama' => $nama,
                    'usia' => $usia,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'hasil_created' => time()
                );

                $this->Hasil_model->insertHasil($hasil);
            } else {
                echo "tidak ada gejala dipilih, tidak ada penyakit terdeteksi";
                die;
            }

            $this->load->view('template/landing/landing_header_view', $data);
            $this->load->view('landing/diagnosa_hasil_view');
            $this->load->view('template/landing/landing_footer_view');
        }
    }
    // * halaman diagnosa ===================================================================================

    // * halaman hasil
    public function hasil($id_hasil)
    {
        $this->load->model('Hasil_model');

        $hasil = $this->Hasil_model->getHasil('id_hasil', $id_hasil);

        $list_penyakit = json_decode($hasil['hasil_penyakit']);
        $list_gejala = json_decode($hasil['hasil_gejala']);

        $data['hasil_penyakit'] = $this->Penyakit_model->getHasilPenyakit($list_penyakit);
        $data['hasil_gejala'] = $this->Gejala_model->getHasilGejala($list_gejala);
        $data['identitas'] = array(
            'nama' => $hasil['nama'],
            'usia' => $hasil['usia'],
            'jenis_kelamin' => $hasil['jenis_kelamin'],
            'alamat' => $hasil['alamat'],
        );

        $this->load->view('template/landing/landing_header_view', $data);
        $this->load->view('landing/diagnosa_hasil_view');
        $this->load->view('template/landing/landing_footer_view');
    }

    // * halaman tentang ===================================================================================
    // public function tentang()
    // {
    //     $data['title'] = "Tentang";
    //     $data['menu'] = "tentang";
    //     $data['sub_menu'] = null;
    //     $data['sub_menu_action'] = null;

    //     $this->load->view('template/panel/header_view', $data);
    //     $this->load->view('template/panel/sidebar_diagnosa_view');
    //     $this->load->view('admin/tentang_admin_view');
    //     $this->load->view('template/panel/control_view');
    //     $this->load->view('template/panel/footer_view');
    // }
    // * halaman tentang ===================================================================================
}
