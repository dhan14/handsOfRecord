<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
		$this->load->helper('slug');
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['news'] = $this->model_news->hasil_berita();
       	$this->load->view('webpage/header');
        $this->load->view('inti/newsfeed', $data);
        $data['judul'] = 'Arsip Berita';
		$this->load->view('webpage/footer');
	}
    public function view($n_slug = NULL){
		$data['news'] = $this->model_news->hasil_berita($n_slug);
        if (empty($data['news']))
        {
			show_404();
        }
        $data['judul'] = $data['news']['n_judul'];
		$this->load->view('webpage/header');
        $this->load->view('inti/newsread', $data);
		$this->load->view('webpage/footer');
    }
}