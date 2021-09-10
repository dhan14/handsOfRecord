<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->model(array('model_musik'));
		$this->load->helper('url_helper');
		$this->load->model('model_auth');
		$this->load->model('model_artist');
		$this->load->model('model_admin');
		$this->load->model('model_submission');
		$this->load->helper(array('form','url'));

		if (empty($this->session->userdata('u_role'))){
			redirect('auth/login');
		}
	}
	//Jatah Admin
	public function rejectSubmission($id){
		$artist = $this->session->userdata('u_nama');
		$idArtist = $this->session->userdata('u_nama');
		$data['genre'] = $this->model_submission->hasil_genre();
		$where = array('id_release'=>$id);
		$data['submission']=$this->model_submission->editData($where,'release')->result();
		$data['release'] = $this->model_submission->hasil_data($artist);
		$data['valArtist'] = $this->model_submission->hasil_data($idArtist);
		$this->load->view('panel/head');
		$this->load->view('panel/sideAdmin',$data);
		$this->load->view('admin/reject_confirm',$data);
		$this->load->view('panel/footer');

	}
	public function approveSubmission($id){
		$artist = $this->session->userdata('u_nama');
		$idArtist = $this->session->userdata('u_nama');
		$data['genre'] = $this->model_submission->hasil_genre();
		$where = array('id_release'=>$id);
		$data['submission']=$this->model_submission->editData($where,'release')->result();
		$data['release'] = $this->model_submission->hasil_data($artist);
		$data['valArtist'] = $this->model_submission->hasil_data($idArtist);
		$this->load->view('panel/head');
		$this->load->view('panel/sideAdmin',$data);
		$this->load->view('admin/approve_confirm',$data);
		$this->load->view('panel/footer');

	}
	public function reject(){
		$id 			= $this->input->post('id_release');
		$re_status = 3;
		$re_muncul = 0;
		$data = array(
			're_status' =>$re_status,
			're_muncul' =>$re_muncul
		);
		$where = array(
			'id_release' 	=> $id,
		);
		$this->model_admin->updateData($where, $data, 'release');

		redirect('dashboard-admin/approval');

	}
	public function approve(){
		$id 			= $this->input->post('id_release');
		$re_status = 	2 ;
		$re_muncul = 1;
		$data = array(
			're_status' =>$re_status,
			're_muncul' =>$re_muncul
		);
		$where = array(
			'id_release' 	=> $id,
		);
		$this->model_admin->updateData($where, $data, 'release');

		redirect('dashboard-admin/approval');}
	
	

	
	public function dashboardAdmin(){
		$this->load->view('panel/head');
		$this->load->view('panel/sideAdmin');
		$this->load->view('admin/dashboard');
		$this->load->view('panel/footer');
	}
	public function approval(){
		$data['release'] = $this->model_admin->hasil_data();
		$data['genre'] = $this->model_submission->hasil_genre();
		$this->load->view('panel/head');
		$this->load->view('panel/head');
		$this->load->view('panel/sideAdmin');
		$this->load->view('admin/approval',$data);
		$this->load->view('panel/footer');
	}
	
	//Jatah Musisi
	public function dashboardMusisi(){
		$artist = $this->session->userdata('u_nama');
		$idArtist = $this->session->userdata('u_nama');
		$data['release'] = $this->model_submission->hasil_data($artist);
		$data['genre'] = $this->model_submission->hasil_genre();
		$data['valArtist'] = $this->model_submission->valueSubmission($idArtist);
		$this->load->view('panel/head');
		$this->load->view('panel/sideMusisi',$data);
		$this->load->view('musisi/dashboard');
		$this->load->view('panel/footer');
	}
	public function submission(){
		$artist = $this->session->userdata('u_nama');
		$idArtist = $this->session->userdata('u_nama');
		$data['release'] = $this->model_submission->hasil_data($artist);
		$data['genre'] = $this->model_submission->hasil_genre();
		$data['valArtist'] = $this->model_submission->valueSubmission($idArtist);
		$this->load->view('panel/head');
		$this->load->view('panel/sideMusisi',$data);
		$this->load->view('musisi/submission',$data);
		$this->load->view('panel/footer');
	}
	public function addSubmission(){

		$config['upload_path'] = './upload/submission/';
		$config['allowed_types'] = 'rar|zip|mp3';
		$config['file_name'] = $_FILES['re_fileArsip']['name'];

		$this->upload->initialize($config);
		if (!empty($_FILES['re_fileArsip']['name'])) {
			if ( $this->upload->do_upload('re_fileArsip') ) {
				$file = $this->upload->data();
				$namaArtis			= $this->input->post('re_namaArtis');
				$namaRelease		= $this->input->post('re_namaAlbum');
				$deskripsi			= $this->input->post('re_deskripsi');
				$genre				= $this->input->post('re_genre');
				$status				= $this->input->post('re_status');
				$valueArtist		= $this->input->post('value_artist');
			$muncul				= $this->input->post('re_muncul');//Otomatis nilainya 1 karena belum di aprove admin
			$dataInsert = array(
				're_namaArtis'	=> $namaArtis,
				're_artist' 	=> $valueArtist,
				're_namaAlbum'	=> $namaRelease,
				're_deskripsi'	=> $deskripsi,
				're_fileArsip'	=> $config['upload_path'].$file['file_name'],
				're_coverArt'	=> NULL,
				're_genre'	=> $genre,
				're_muncul'	=> $muncul,
				're_status'	=> $status);
			$this->model_submission->simpanData($dataInsert, 'release');
			redirect('dashboard/submission');
		}else {
			$this->load->view('gagal');
		}
	}else{}}
	public function editSubmission($id){
		$artist = $this->session->userdata('u_nama');
		$idArtist = $this->session->userdata('u_nama');
		$data['genre'] = $this->model_submission->hasil_genre();
		$where = array('id_release'=>$id);
		$data['submission']=$this->model_submission->editData($where,'release')->result();
		$data['release'] = $this->model_submission->hasil_data($artist);
		$data['valArtist'] = $this->model_submission->hasil_data($idArtist);
		$this->load->view('panel/head');
		$this->load->view('panel/sideMusisi',$data);
		$this->load->view('musisi/edit_sub',$data);
		$this->load->view('panel/footer');
	}
	public function tambahCover($id){
		$artist = $this->session->userdata('u_nama');
		$idArtist = $this->session->userdata('u_nama');
		$data['genre'] = $this->model_submission->hasil_genre();
		$where = array('id_release'=>$id);
		$data['submission']=$this->model_submission->editData($where,'release')->result();
		$data['release'] = $this->model_submission->hasil_data($artist);
		$data['valArtist'] = $this->model_submission->hasil_data($idArtist);
		$this->load->view('panel/head');
		$this->load->view('panel/sideMusisi',$data);
		$this->load->view('musisi/tambahCover',$data);
		$this->load->view('panel/footer');
	}
	
	public function updateSubmission(){
		$id 			= $this->input->post('id_release');
		$re_namaArtis 	= $this->input->post('re_namaArtis');
		$re_namaAlbum 	= $this->input->post('re_namaAlbum');
		$value_artist 	= $this->input->post('value_artist');
		$re_genre 		= $this->input->post('re_genre');
		$re_deskripsi	= $this->input->post('re_deskripsi');
		$dataUpdate = array(
			're_deskripsi'  => $re_deskripsi,
			're_namaArtis'  => $re_namaArtis,
			're_namaAlbum'	=> $re_namaAlbum,
			're_artist' 	=> $value_artist,
			're_genre' 		=> $re_genre);
		$where = array(
			'id_release' 	=> $id,
		);
		$this->model_submission->updateData($where, $dataUpdate, 'release');
		redirect('dashboard/submission');
	}
	public function updateCover(){
		$config['upload_path'] = './upload/releaseCoverArt/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $_FILES['re_coverArt']['name'];
		$this->upload->initialize($config);
		if (!empty($_FILES['re_coverArt']['name'])) {
			if ( $this->upload->do_upload('re_coverArt') ) {
				$file = $this->upload->data();
				$id 			= $this->input->post('id_release');
				$coverUpdate = array(
					're_coverArt'	=> $config['upload_path'].$file['file_name'],);
				$where = array(
					'id_release' 	=> $id,
				);
				$this->model_submission->updateCover($where, $coverUpdate, 'release');
				redirect('dashboard/submission');
			}}}
			public function hapusSubmission($id){
				$where = array(
					'id_release' 	=> $id,
				);
				$this->model_submission->hapusData($where,$id,'release');
				redirect('dashboard/submission');
			}
			public function bandProfile($id){
				$where = array('a_kodeProfil'=>$id);
				$data['genre'] = $this->model_submission->hasil_genre();
				$data['valArtist']=$this->model_artist->hasil_profile($where,'artist')->result();
				$this->load->view('panel/head');
				$this->load->view('panel/sideMusisi',$data);
				$this->load->view('musisi/bandProfile',$data);
				$this->load->view('panel/footer');
			}
			public function updateBandProfile(){
				$config['upload_path'] = './upload/artistProfile/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['file_name'] = $_FILES['a_foto']['name'];
				$this->upload->initialize($config);
				if (!empty($_FILES['a_foto']['name'])) {
					if ( $this->upload->do_upload('a_foto') ) {
						$file = $this->upload->data();
						$id 			= $this->input->post('id_artist');
						$namaArtist			= $this->input->post('a_namaArtist');
						$deskripsi		= $this->input->post('a_deskripsi');
						$asal			= $this->input->post('a_asal');
						$genre				= $this->input->post('a_genre');

						$pp = array(
							'a_foto'	=> $config['upload_path'].$file['file_name'],
							'a_namaArtist' =>$namaArtist,
							'a_deskripsi'=>$deskripsi,
							'a_asal'=>$asal,
							'a_genre'=>$genre,
						);
						$where = array(
							'id_artist' 	=> $id,
						);
						$this->model_artist->updateData($where, $pp, 'artist');
						redirect('dashboard-musisi');
					}}else {
						$id 			= $this->input->post('id_artist');
						$namaArtist			= $this->input->post('a_namaArtist');
						$deskripsi		= $this->input->post('a_deskripsi');
						$asal			= $this->input->post('a_asal');
						$genre				= $this->input->post('a_genre');

						$pp = array(
							'a_namaArtist' =>$namaArtist,
							'a_deskripsi'=>$deskripsi,
							'a_asal'=>$asal,
							'a_genre'=>$genre,
						);
						$where = array(
							'id_artist' 	=> $id,
						);
						$this->model_artist->updateData($where, $pp, 'artist');
						redirect('dashboard-musisi');
					}
				}}
