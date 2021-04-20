<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pakar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') != 2) {
            verifyAccess();
        }

        $this->load->model('User_model');
        $this->load->model('Gejala_model');
        $this->load->model('Kondisi_model');
        $this->load->model('Pengetahuan_model');
        $this->load->model('Penyakit_model');
        $this->load->model('Hasil_model');
    }

    // * halaman beranda
    public function index()
    {
        $data['title'] = "Beranda";
        $data['menu'] = "beranda";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));
        $data['count_penyakit'] = $this->Penyakit_model->countPenyakit('all');
        $data['count_gejala'] = $this->Gejala_model->countGejala('all');
        $data['count_pengetahuan'] = $this->Pengetahuan_model->countPengetahuan('all');
        $data['count_pakar'] = $this->User_model->countUser('all');

        $data['hasil_penyakit'] = $this->Hasil_model->getHasil('chart_penyakit');
        $data['hasil_usia'] = $this->Hasil_model->getHasil('chart_usia');
        $data['hasil_jenis_kelamin'] = $this->Hasil_model->getHasil('chart_jenis_kelamin');

        $this->load->view('template/panel/header_view', $data);
        $this->load->view('template/panel/sidebar_pakar_view');
        $this->load->view('admin/home_admin_view');
        $this->load->view('template/panel/control_view');
        $this->load->view('template/panel/footer_view');
    }

    // * halaman penyakit ===================================================================================
    public function penyakit()
    {
        $data['title'] = "Penyakit";
        $data['menu'] = "penyakit_pakar";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('all');

        // validation forms                
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required|trim');
        $this->form_validation->set_rules('deskripsi_penyakit', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('saran_penyakit', 'Saran', 'required|trim');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_pakar_view');
            $this->load->view('pakar/penyakit_pakar_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $nama_penyakit = $this->input->post('nama_penyakit');
            $deskripsi_penyakit = $this->input->post('deskripsi_penyakit');
            $saran_penyakit = $this->input->post('saran_penyakit');

            if ($submitType == 'Tambah') { // * jika tambah data

                if ($_FILES['gambar_penyakit']['error'] != 4) {
                    $gambar_penyakit = $this->upload_image('gambar_penyakit', './assets/img/penyakit/');
                } else {
                    $gambar_penyakit = 'no-image.jpg';
                }

                // * data penyakit yang akan diinput
                $data_penyakit = array(
                    'nama_penyakit' => $nama_penyakit,
                    'deskripsi_penyakit' => $deskripsi_penyakit,
                    'saran_penyakit' => $saran_penyakit,
                    'gambar_penyakit' => $gambar_penyakit,
                );

                if ($this->Penyakit_model->insertPenyakit($data_penyakit)) { // * jika berhasil input penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan penyakit</div>');

                    redirect('pakar/penyakit');
                } else { // ! jika gagal input penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan penyakit</div>');

                    redirect('pakar/penyakit');
                }
            } else { // * jika edit data
                $id_penyakit = $this->input->post('id_penyakit');
                $penyakit = $this->Penyakit_model->getPenyakit('id_penyakit', $id_penyakit);

                if ($_FILES['gambar_penyakit']['error'] != 4) {
                    $gambar_penyakit = $this->upload_image('gambar_penyakit', './assets/img/penyakit/');
                } else {
                    $gambar_penyakit = $penyakit['gambar_penyakit'];
                }

                $data_update_penyakit = array(
                    'nama_penyakit' => $nama_penyakit,
                    'deskripsi_penyakit' => $deskripsi_penyakit,
                    'saran_penyakit' => $saran_penyakit,
                    'gambar_penyakit' => $gambar_penyakit,
                );

                if ($this->Penyakit_model->updatePenyakit('id_penyakit', $data_update_penyakit, $id_penyakit)) { // * jika berhasil update penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah penyakit</div>');

                    redirect('pakar/penyakit');
                } else { // ! jika gagal update penyakit
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah penyakit</div>');

                    redirect('pakar/penyakit');
                }
            }
        }
    }

    // * untuk menampilkan artikel dari penyakit
    public function artikelPenyakit($id_penyakit)
    {
        $data['title'] = "Artikel Penyakit";
        $data['menu'] = "penyakit_pakar";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('id_penyakit', $id_penyakit);

        // validation forms                
        $this->form_validation->set_rules('penyakit_artikel', 'Penyakit Artikel', 'required|trim');
        $this->form_validation->set_rules('penyakit_saran_artikel', 'Detail Saran', 'required|trim');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_pakar_view');
            $this->load->view('pakar/artikel_penyakit_pakar_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else { // * jika sudah input                        
            $penyakit_artikel = $this->input->post('penyakit_artikel');
            $penyakit_saran_artikel = $this->input->post('penyakit_saran_artikel');

            $data_update_penyakit = array(
                'penyakit_artikel' => $penyakit_artikel,
                'penyakit_saran_artikel' => $penyakit_saran_artikel,
            );

            if ($this->Penyakit_model->updatePenyakit('id_penyakit', $data_update_penyakit, $id_penyakit)) { // * jika berhasil update artikel penyakit
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah artikel penyakit</div>');

                redirect('pakar/penyakit');
            } else { // ! jika gagal update artikel penyakit
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah artikel penyakit</div>');

                redirect('pakar/penyakit');
            }
        }
    }

    // * untuk menampilkan detail penyakit
    public function editPenyakit($id_penyakit)
    {
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('id_penyakit', $id_penyakit);

        $this->load->view('admin/ajax/edit_penyakit_form', $data);
    }

    // * untuk menghapus penyakit
    public function deletePenyakit($id_penyakit)
    {
        if ($this->Penyakit_model->deletePenyakit('id_penyakit', $id_penyakit)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus penyakit</div>');

            redirect('pakar/penyakit');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus penyakit</div>');

            redirect('pakar/penyakit');
        }
    }
    // * halaman pengguna ===================================================================================

    // * halaman gejala ===================================================================================
    public function gejala()
    {
        $data['title'] = "Gejala";
        $data['menu'] = "gejala_pakar";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));

        $data['gejala'] = $this->Gejala_model->getGejala('all');

        // validation forms                
        $this->form_validation->set_rules('nama_gejala', 'Gejala', 'required|trim');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_pakar_view');
            $this->load->view('pakar/gejala_pakar_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $nama_gejala = $this->input->post('nama_gejala');

            if ($submitType == 'Tambah') { // * jika tambah data

                // * data gejala yang akan diinput
                $data_gejala = array(
                    'nama_gejala' => $nama_gejala,
                );

                if ($this->Gejala_model->insertGejala($data_gejala)) { // * jika berhasil input gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan gejala</div>');

                    redirect('pakar/gejala');
                } else { // ! jika gagal input gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan gejala</div>');

                    redirect('pakar/gejala');
                }
            } else { // * jika edit data
                $id_gejala = $this->input->post('id_gejala');

                $data_update_gejala = array(
                    'nama_gejala' => $nama_gejala,
                );

                if ($this->Gejala_model->updateGejala('id_gejala', $data_update_gejala, $id_gejala)) { // * jika berhasil update gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah gejala</div>');

                    redirect('pakar/gejala');
                } else { // ! jika gagal update gejala
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah gejala</div>');

                    redirect('pakar/gejala');
                }
            }
        }
    }

    // * untuk menampilkan detail gejala
    public function editGejala($id_gejala)
    {
        $data['gejala'] = $this->Gejala_model->getGejala('id_gejala', $id_gejala);

        $this->load->view('admin/ajax/edit_gejala_form', $data);
    }

    // * untuk menghapus gejala
    public function deleteGejala($id_gejala)
    {
        if ($this->Gejala_model->deleteGejala('id_gejala', $id_gejala)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus gejala</div>');

            redirect('pakar/gejala');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus gejala</div>');

            redirect('pakar/gejala');
        }
    }
    // * halaman gejala ===================================================================================

    // * halaman pengetahuan ===================================================================================
    public function pengetahuan()
    {
        $data['title'] = "Pengetahuan";
        $data['menu'] = "pengetahuan_pakar";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));

        $data['pengetahuan'] = $this->Pengetahuan_model->getPengetahuan('all');
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('all');
        $data['gejala'] = $this->Gejala_model->getGejala('all');

        // validation forms                
        $this->form_validation->set_rules('id_penyakit', 'Penyakit', 'required|trim');
        $this->form_validation->set_rules('id_gejala', 'Gejala', 'required|trim');
        $this->form_validation->set_rules('mb', 'MB', 'required|trim|decimal');
        $this->form_validation->set_rules('md', 'MD', 'required|trim|decimal');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_pakar_view');
            $this->load->view('pakar/pengetahuan_pakar_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $id_penyakit = $this->input->post('id_penyakit');
            $id_gejala = $this->input->post('id_gejala');
            $mb = $this->input->post('mb');
            $md = $this->input->post('md');

            if ($submitType == 'Tambah') { // * jika tambah data

                // * data gejala yang akan diinput
                $data_pengetahuan = array(
                    'id_penyakit' => $id_penyakit,
                    'id_gejala' => $id_gejala,
                    'mb' => $mb,
                    'md' => $md,
                );

                if ($this->Pengetahuan_model->insertPengetahuan($data_pengetahuan)) { // * jika berhasil input pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan pengetahuan</div>');

                    redirect('pakar/pengetahuan');
                } else { // ! jika gagal input pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan pengetahuan</div>');

                    redirect('pakar/pengetahuan');
                }
            } else { // * jika edit data
                $id_basis_pengetahuan = $this->input->post('id_basis_pengetahuan');

                $data_update_pengetahuan = array(
                    'id_penyakit' => $id_penyakit,
                    'id_gejala' => $id_gejala,
                    'mb' => $mb,
                    'md' => $md,
                );

                if ($this->Pengetahuan_model->updatePengetahuan('id_basis_pengetahuan', $data_update_pengetahuan, $id_basis_pengetahuan)) { // * jika berhasil update pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah pengetahuan</div>');

                    redirect('pakar/pengetahuan');
                } else { // ! jika gagal update pengetahuan
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah pengetahuan</div>');

                    redirect('pakar/pengetahuan');
                }
            }
        }
    }

    // * untuk menampilkan detail pengetahuan
    public function editPengetahuan($id_basis_pengetahuan)
    {
        $data['pengetahuan'] = $this->Pengetahuan_model->getPengetahuan('id_basis_pengetahuan', $id_basis_pengetahuan);
        $data['penyakit'] = $this->Penyakit_model->getPenyakit('all');
        $data['gejala'] = $this->Gejala_model->getGejala('all');

        $this->load->view('admin/ajax/edit_pengetahuan_form', $data);
    }

    // * untuk menghapus pengetahuan
    public function deletePengetahuan($id_basis_pengetahuan)
    {
        if ($this->Pengetahuan_model->deletePengetahuan('id_basis_pengetahuan', $id_basis_pengetahuan)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus pengetahuan</div>');

            redirect('pakar/pengetahuan');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus pengetahuan</div>');

            redirect('pakar/pengetahuan');
        }
    }
    // * halaman pengetahuan ===================================================================================

    // * halaman hasil diagnosa
    public function hasildiagnosa()
    {
        $data['title'] = "Hasil Diagnosa";
        $data['menu'] = "hasildiagnosa";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));
        $data['hasil'] = $this->Hasil_model->getHasil('all');        

        $this->load->view('template/panel/header_view', $data);
        $this->load->view('template/panel/sidebar_pakar_view');
        $this->load->view('pakar/hasil_diagnosa_pakar_view');
        $this->load->view('template/panel/control_view');
        $this->load->view('template/panel/footer_view');
    }

    // * halaman kondisi ===================================================================================
    public function kondisi()
    {
        $data['title'] = "Kondisi";
        $data['menu'] = "kondisi_pakar";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));

        $data['kondisi'] = $this->Kondisi_model->getKondisi('all');

        // validation forms                
        $this->form_validation->set_rules('nama_kondisi', 'Nama Kondisi', 'required|trim');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim|decimal');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_pakar_view');
            $this->load->view('pakar/kondisi_pakar_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else { // * jika sudah input
            $submitType = $this->input->post('submit-type');
            $nama_kondisi = $this->input->post('nama_kondisi');
            $bobot = $this->input->post('bobot');

            if ($submitType == 'Tambah') { // * jika tambah data

                // * data kondisi yang akan diinput
                $data_kondisi = array(
                    'nama_kondisi' => $nama_kondisi,
                    'bobot' => $bobot,
                );

                if ($this->Kondisi_model->insertKondisi($data_kondisi)) { // * jika berhasil input kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menambahkan kondisi</div>');

                    redirect('pakar/kondisi');
                } else { // ! jika gagal input kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menambahkan kondisi</div>');

                    redirect('pakar/kondisi');
                }
            } else { // * jika edit data
                $id_kondisi = $this->input->post('id_kondisi');

                $data_update_kondisi = array(
                    'nama_kondisi' => $nama_kondisi,
                    'bobot' => $bobot,
                );

                if ($this->Kondisi_model->updateKondisi('id_kondisi', $data_update_kondisi, $id_kondisi)) { // * jika berhasil update kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil merubah kondisi</div>');

                    redirect('pakar/kondisi');
                } else { // ! jika gagal update kondisi
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal merubah kondisi</div>');

                    redirect('pakar/kondisi');
                }
            }
        }
    }

    // * untuk menampilkan detail kondisi
    public function editKondisi($id_kondisi)
    {
        $data['kondisi'] = $this->Kondisi_model->getKondisi('id_kondisi', $id_kondisi);

        $this->load->view('admin/ajax/edit_kondisi_form', $data);
    }

    // * untuk menghapus kondisi
    public function deleteKondisi($id_kondisi)
    {
        if ($this->Kondisi_model->deleteKondisi('id_kondisi', $id_kondisi)) { // * jika berhasil menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil menghapus kondisi</div>');

            redirect('pakar/kondisi');
        } else { // ! jika gagal menghapus
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal menghapus kondisi</div>');

            redirect('pakar/kondisi');
        }
    }
    // * halaman kondisi ===================================================================================

    // * halaman password ===================================================================================
    public function password()
    {
        $data['title'] = "Ubah Password";
        $data['menu'] = "password";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));

        // validation forms                
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim');
        $this->form_validation->set_rules('password_baru_konfirmasi', 'Password Konfirmasi', 'required|trim|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) { // * jika belum input form
            $this->load->view('template/panel/header_view', $data);
            $this->load->view('template/panel/sidebar_pakar_view');
            $this->load->view('admin/password_admin_view');
            $this->load->view('template/panel/control_view');
            $this->load->view('template/panel/footer_view');
        } else { // * jika sudah input            
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            // * jika password lama salah
            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password lama tidak sesuai</div>');

                redirect('pakar/password');
            }

            $data_password_update = array(
                'password' => password_hash($password_baru, PASSWORD_DEFAULT),
            );

            if ($this->User_model->updateUser('id_user', $data_password_update, $this->session->userdata('id_user'))) { // * jika berhasil rubah password
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password berhasil dirubah</div>');

                redirect('pakar/password');
            } else { // ! jika gagal rubah password
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password gagal dirubah</div>');

                redirect('pakar/password');
            }
        }
    }
    // * halaman password ===================================================================================

    // * halaman tentang ===================================================================================
    public function tentang()
    {
        $data['title'] = "Tentang";
        $data['menu'] = "tentang";
        $data['sub_menu'] = null;
        $data['sub_menu_action'] = null;
        // user data        
        $data['user'] = $this->User_model->getUser('id_user', $this->session->userdata('id_user'));

        $this->load->view('template/panel/header_view', $data);
        $this->load->view('template/panel/sidebar_pakar_view');
        $this->load->view('admin/tentang_admin_view');
        $this->load->view('template/panel/control_view');
        $this->load->view('template/panel/footer_view');
    }
    // * halaman password ===================================================================================

    //  *fungsi untuk upload image
    private function upload_image($name, $address)
    {
        $this->load->library('upload');
        $config['upload_path'] = $address; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size'] = 10000;

        $this->upload->initialize($config);

        if (!empty($_FILES[$name]['name'])) {

            if ($this->upload->do_upload($name)) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $address . $gbr['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['width'] = 800;
                $config['height'] = 600;
                $config['new_image'] = $address . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                return $gambar;
            } else {
                echo "gagal upload";
            }
        } else {
            return 'no-image.jpg';
        }
    }
}
