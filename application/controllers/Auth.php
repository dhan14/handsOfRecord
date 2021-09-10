<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		// if ($this->session->userdata('hak_akses') == 'Admin'){
		// 	redirect('admin/dashboard');
		// } elseif ($this->session->userdata('hak_akses') == 'Anggota'){
		// 	redirect('booking/dashboard');
		// }

		$data['title'] = 'Login';
		$this->_rules();

		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/login', $data);
		} else{
			$u_username = $this->input->post('u_username');
			$u_pass = md5($this->input->post('u_pass'));

			$cek = $this->Model_auth->cekLogin($u_username, $u_pass);

			if ($cek == FALSE){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<i class="icon fa fa-check"></i>
					User tidak ditemukan! Silahkan login dengan benar.
					</div>');
				redirect('auth/login');
			}else if ($cek->u_role==1) {
				$this->session->set_userdata('id_user', $cek->id_user);
				$this->session->set_userdata('u_nama', $cek->u_nama);
				$this->session->set_userdata('u_username', $cek->u_username);
				$this->session->set_userdata('u_role', $cek->u_role);

				redirect('dashboard-admin');
			}else if ($cek->u_role==2) {
				$this->session->set_userdata('id_user', $cek->id_user);
				$this->session->set_userdata('u_nama', $cek->u_nama);
				$this->session->set_userdata('u_username', $cek->u_username);
				$this->session->set_userdata('u_role', $cek->u_role);

				redirect('dashboard-musisi');
			}else{}
		}
	}

	public function register(){
		$this->form_validation->set_rules('u_username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('u_nama', 'Nama', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('u_email', 'Email', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('u_pass', 'Password', 'required', ['required' => '%s tidak boleh kosong']);

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'Registrasi';

			$this->load->view('user/register', $data);
		} else{
			$u_username = $this->input->post('u_username');
			$u_nama = $this->input->post('u_nama');
			$u_email = $this->input->post('u_email');
			$u_pass = md5($this->input->post('u_pass'));
			$u_role = 2;

			$data = array(
				'u_username' => $u_username,
				'u_nama' => $u_nama,
				'u_email' => $u_email,
				'u_pass' => $u_pass,
				'u_role' => $u_role
			);

			$this->Model_auth->insertData('user', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<i class="icon fa fa-check"></i>
				Registrasi berhasil. Silahkan Login.
				</div>');
			redirect('auth/login');
		}
	}

	public function _rules(){
		$this->form_validation->set_rules('u_username', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
		$this->form_validation->set_rules('u_pass', 'Password', 'required', ['required' => '%s tidak boleh kosong']);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('web');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */