<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Token_model');
    }

    // * function untuk halaman login
    public function index()
    {
        // * untuk memverifikasi sesi login
        verifyAccess(true);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if (!$this->form_validation->run()) { // * jika form login belum diinput
            $data['title'] = 'Login';

            $this->load->view('template/auth/header_auth_view', $data);
            $this->load->view('auth/login_view');
            $this->load->view('template/auth/footer_auth_view');
        } else { // * jika sudah input form login            
            $email = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars($this->input->post('password', true));

            // * get data user by email
            $data_user = $this->User_model->getUser('email', $email);

            // * jika email tidak terdaftar
            if (!$data_user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar</div>');

                redirect('login');
            }

            // * jika password salah
            if (!password_verify($password, $data_user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password tidak sesuai</div>');

                redirect('login');
            }

            // * menyimpan sesi login
            $this->session->set_userdata('id_user', $data_user['id_user']);
            $this->session->set_userdata('role', $data_user['role']);

            // * cek dan arahkan sesuai role
            switch ($data_user['role']) {
                case 1:
                    // * jika admin                    
                    redirect('admin');
                    break;
                case 2:
                    // * jika pakar                    
                    redirect('pakar');
                    break;
                default:
            }
        }
    }

    // * function untuk halaman forgotpassword
    public function forgotPassword()
    {
        // untuk memverifikasi sesi login
        verifyAccess(true);

        $data['title'] = 'Forgot Password';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if (!$this->form_validation->run()) { // * jika belum input form
            $this->load->view('template/auth/header_auth_view', $data);
            $this->load->view('auth/forgotpassword_view');
            $this->load->view('template/auth/footer_auth_view');
        } else { // * jika telah input form
            $email = htmlspecialchars($this->input->post('email', true));

            // * get data user
            $data_user = $this->User_model->getUser('email', $email);

            // * cek apakah email terdaftar
            if (!$data_user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar.</div>');

                redirect('forgotpassword');
            }

            // * data token untuk di insert
            $token = uniqid(true);
            $data_token = [
                'id_user' => $data_user['id_user'],
                'token' => $token,
                'email' => $email,
                'token_created' => time(),
            ];

            // * mendaftarkan token
            $this->Token_model->registerNewToken($data_token);

            // data untuk ditampilkan pada email
            $data['title'] = 'Recovery Password Akun SIPAKAR';
            $data['heading'] = 'Recovery Password Akun SIPAKAR';
            $data['body'] = 'Silahkan klik tombol dibawah untuk mereset password akun anda yang terdaftar dengan email: ' . $email . '.';
            $data['url'] = base_url() . 'recoverpassword?email=' . $email . '&token=' . $token;
            $data['button'] = 'Recover Password';

            // * cek hika berhasil mengirim email aktivasi
            if ($this->_sendEmail($email, $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email untuk melakukan recovery password telah dikirim ke ' . $email . '.</div>');

                redirect('forgotpassword');
            } else { // ! jika gagal
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Terjadi Error Harap Coba Lagi</div>');

                redirect('forgotpassword');
            }
        }
    }

    // * function untuk halaman recover password
    public function recoverpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $data['title'] = "Recover Password";
        $data['email'] = $email;

        // validation forms        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('confpassword', 'Confirmation Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // * get data user dan token
            $data_user = $this->User_model->getUser('email', $email);
            $data_token = $this->Token_model->getTokenByToken($token);

            //  *jika tidak ada email dan token valid maka tampil pesan error
            if (!$data_user) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Email tidak terdaftar.</div>');

                redirect('login');
            }

            if (!$data_token) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Token tidak valid.</div>');

                redirect('login');
            }

            // * cek jika token kadaluarsa (lebih dari 24 jam)
            if (time() - $data_token['token_created'] > 60 * 60 * 24) {
                // jika token kadaluarsa					
                $this->Token_model->deleteTokenByToken($token);

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Token Expired. Please do forgot password again.</div>');

                redirect('login');
            }

            // * load view recover password
            $this->load->view('template/auth/header_auth_view', $data);
            $this->load->view('auth/recoverpassword_view');
            $this->load->view('template/auth/footer_auth_view');
        } else { // * jika telah input form            
            $email = htmlspecialchars($this->input->post('email', true));
            $new_password = htmlspecialchars($this->input->post('password', true));

            // * data untuk update new password user
            $data_user = [
                'password' => password_hash($new_password, PASSWORD_DEFAULT),
            ];            

            // * jika update password user berhasil
            if ($this->User_model->updateUser('email', $data_user, $email)) {
                // * menghapus token
                $this->Token_model->deleteTokenByToken($token);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil memperbarui password dari akun: ' . $email . '.</div>');

                redirect('login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal memperbarui password. Terjadi kesalahan.</div>');

                redirect('login');
            }
        }
    }

    // * function untuk logout
    public function logout()
    {
        // unset session login
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda telah berhasil Log Out</div>');

        redirect('login');
    }

    // * function untuk proses send email
    private function _sendEmail($email, $data)
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'step-ap.online',
            'smtp_user'     => 'admin@step-ap.online',
            'smtp_pass'     => 'Stepapon@2020',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'smtp_crypto'   => 'ssl',
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('admin-no-reply@sipakar.com', 'SIPAKAR');
        $this->email->to($email);

        $message = $this->load->view('email/email_view.php', $data, true);

        $this->email->subject($data['heading']);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
            return false;
        }
    }
}
