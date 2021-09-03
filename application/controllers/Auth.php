<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('model_auth');
    }
    function index(){
        $this->load->view('admin/login');
    }
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $user_cek=$this->model_auth->auth_user($username,$password);
        if($user_cek->num_rows() > 0){
                        $data=$user_cek->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['u_role']=='1'){ //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['u_username']);
                    $this->session->set_userdata('ses_nama',$data['u_pass']);
                    redirect('inti/dashboard');
 
                 }else{ //akses dosen
                    $this->session->set_userdata('akses','2');
                                $this->session->set_userdata('ses_id',$data['nip']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('inti/dashboard');
                 }
 
        }else{ //jika login sebagai mahasiswa
                    $cek_mahasiswa=$this->login_model->auth_mahasiswa($username,$password);
                    if($cek_mahasiswa->num_rows() > 0){
                            $data=$cek_mahasiswa->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                            $this->session->set_userdata('akses','3');
                            $this->session->set_userdata('ses_id',$data['nim']);
                            $this->session->set_userdata('ses_nama',$data['nama']);
                            redirect('page');
                    }else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
}





/* Corat Coret
class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
    {
        redirect('dashboard');
    }
}
 */
