<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kos_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
	}
	//Halaman Utama Website
	public function index()
	{
		$site 		= $this->konfigurasi_model->listing();
		$kategori 	= $this->konfigurasi_model->nav_kos();
		$kos 	= $this->kos_model->home();
		$data 		= array(	'title'		=> $site->namaweb. ' | ' .$site->tagline,
								'keyword'	=> $site->keywords,
								'deskripsi'	=> $site->deskripsi,
								'site'		=> $site,
								'kategori'	=> $kategori,
								'kos'	=> $kos,
								'isi' 		=> 'home/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */