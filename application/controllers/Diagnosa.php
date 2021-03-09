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
    public function index()
    {
        $data['title'] = "Beranda";
        $data['menu'] = "beranda";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = null;

        $data['count_penyakit'] = $this->Penyakit_model->countPenyakit('all');
        $data['count_gejala'] = $this->Gejala_model->countGejala('all');
        $data['count_pengetahuan'] = $this->Pengetahuan_model->countPengetahuan('all');
        $data['count_pakar'] = $this->User_model->countUser('all');

        $this->load->view('template/panel/header_view', $data);
        $this->load->view('template/panel/sidebar_diagnosa_view');
        $this->load->view('diagnosa/home_diagnosa_view');
        $this->load->view('template/panel/control_view');
        $this->load->view('template/panel/footer_view');
    }

    // * halaman Diagnosa ===================================================================================
    public function diagnosa()
    {
        $data['title'] = "Diagnosa";
        $data['menu'] = "diagnosa";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        $data['gejala'] = $this->Gejala_model->getGejala('all');
        $data['kondisi'] = $this->Kondisi_model->getKondisi('all');

        $this->form_validation->set_rules('kondisi[]', 'Kondisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_diagnosa_view');
            $this->load->view('diagnosa/diagnosa_test_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else {
            // * perhitungan CF START
            // * inisiasi variabel yang akan diinput ke db
            $list_gejala = array();
            $list_penyakit = array();

            // * ambil pilihan pengguna
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
                // ? inisiasi variabel CF untuk perhitungan
                $cf = 0;
                $cf_lama = 0;

                // ? ambil semua basis pengetahuan dari penyakit saat ini berdasar id_penyakit
                $pengetahuan_terkait = $this->Pengetahuan_model->getPengetahuan('id_penyakit', $penyakit['id_penyakit']);

                // ? hitung dan cek tiap pengetahuan terkait
                foreach ($pengetahuan_terkait as $pengetahuan) {
                    // ? cek tiap gejala pada pengetahuan terkait
                    foreach ($input_gejala_kondisi as $gejala) {
                        $gejala = explode("_", $gejala);
                        // ? jika gejala pada pengetahuan sama dengan gejala yang diinput pengguna
                        if ($pengetahuan['id_gejala'] == $gejala[0]) {
                            // ? ambil kondisi terpilih untuk mengakses bobot
                            $kondisi_terpilih = $this->Kondisi_model->getKondisi('id_kondisi', $gejala[1]);

                            // ? perhitungan rumus CF
                            $cf = ($pengetahuan['mb'] - $pengetahuan['md']) * $kondisi_terpilih['bobot'];

                            // ? jika CF1 dan CF2 keduanya posistif
                            if (($cf >= 0) && ($cf * $cf_lama >= 0)) {
                                $cf_lama = $cf_lama + ($cf * (1 - $cf_lama));
                            }

                            // ? jika salah satu negatif
                            if ($cf * $cf_lama < 0) {
                                $cf_lama = ($cf_lama + $cf) / (1 - Min(abs($cf_lama), abs($cf)));
                            }

                            // ? jika CF1 dan CF2 keduanya negative
                            if (($cf < 0) && ($cf * $cf_lama >= 0)) {
                                $cf_lama = $cf_lama + ($cf * (1 + $cf_lama));
                            }
                        }
                    }
                }
                if ($cf_lama > 0) {
                    //  ? tambahkan penyakit ke daftar list jika sesuai gejala dan perhitungan
                    $list_penyakit += array($penyakit['id_penyakit'] => number_format($cf_lama, 4));
                }
            }

            // * mengurutkan dari nilai tertinggi ke rendah
            arsort($list_penyakit);
    
            // * perhitungan CF END

            // ? tampilkan hasil perhitungan
            $data['title'] = "Diagnosa";
            $data['menu'] = "diagnosa";

            $data['hasil_penyakit'] = $this->Penyakit_model->getHasilPenyakit($list_penyakit);
            $data['hasil_gejala'] = $this->Gejala_model->getHasilGejala($list_gejala);

            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_diagnosa_view');
            $this->load->view('diagnosa/hasil_diagnosa_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        }
    }
    // * halaman diagnosa ===================================================================================

    // * halaman tentang ===================================================================================
    public function tentang()
    {
        $data['title'] = "Tentang";
        $data['menu'] = "tentang";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;

        $this->load->view('template/panel/header_view', $data);
        $this->load->view('template/panel/sidebar_diagnosa_view');
        $this->load->view('admin/tentang_admin_view');
        $this->load->view('template/panel/control_view');
        $this->load->view('template/panel/footer_view');
    }
    // * halaman tentang ===================================================================================
}
