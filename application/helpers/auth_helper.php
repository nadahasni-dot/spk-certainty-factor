<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test_method')) {
    function verifyAccess($public = false){
        // * menampung sesi login role user
        $role = null;

        // * jika sudah ada session login maka simpan role login
        if(isset($_SESSION['role'])){
            $role = $_SESSION['role'];
        }

        // * jika role 1 diarahkan ke admin
        if($role == 1){
            redirect('admin');
        }

        // * jika role 2 diarahkan ke pakar
        if($role == 2){
            redirect('pakar');
        }

        // * jika role null/kosong/belum login
        if($role == null || $role == ''){
            // jika ingin mengakses halaman admin/user maka dikembalikan ke laman utama
            if(!$public){
                redirect(base_url());
            }
        }
    }
}