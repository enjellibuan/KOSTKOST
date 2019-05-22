<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kos_model');
		$this->load->model('kategori_model');
	}


	public function index()
	{
		$site 				= $this->konfigurasi_model->listing();
		$listing_kategori 	= $this->kos_model->listing_kategori();
		$total				= $this->kos_model->total_kos();
		//pagination
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'kos/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment'] 		= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<p>';
		$config['full_tag_close'] 	= '</p>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<div>';
		$config['first_tag_close'] 	= '</div>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<div>';
		$config['last_tag_close'] 	= '</div>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close']	 = '</b>';
		$config['first_url']		= base_url().'/kos/';
		
		$this->pagination->initialize($config);
		$page 		=	($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$kos 	= 	$this->kos_model->kos($config['per_page'],$page);
		//pagination

		$data = array(	'title'				=>	'kos '.$site->namaweb,
						'site'				=> 	$site,
						'listing_kategori'	=> 	$listing_kategori,
						'kos'			=>	$kos,
						'pagin'				=> 	$this->pagination->create_links(),
						'isi'				=>	'kos/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function kategori($slug_kategori)
	{
		//detail kategori
		$kategori 			= $this->kategori_model->read($slug_kategori);
		$id_kategori		= $kategori->id_kategori;

		$site 				= $this->konfigurasi_model->listing();
		$listing_kategori 	= $this->kos_model->listing_kategori();
		$total				= $this->kos_model->total_kategori($id_kategori);
		//pagination
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'kos/kategori/'.$slug_kategori.'/index/';
		$config['total_rows'] 		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment'] 		= 5;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<p>';
		$config['full_tag_close'] 	= '</p>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<div>';
		$config['first_tag_close'] 	= '</div>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<div>';
		$config['last_tag_close'] 	= '</div>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close'] 	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close']	 = '</b>';
		$config['first_url']		= base_url().'/kos/kategori/'.$slug_kategori;
		
		$this->pagination->initialize($config);
		$page 		=	($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$kos 	= 	$this->kos_model->kategori($id_kategori, $config['per_page'], $page);
		//pagination

		$data = array(	'title'				=>	$kategori->nama_kategori,
						'site'				=> 	$site,
						'listing_kategori'	=> 	$listing_kategori,
						'kos'			=>	$kos,
						'pagin'				=> 	$this->pagination->create_links(),
						'isi'				=>	'kos/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function detail($slug_kos)
	{
		$site 			= $this->konfigurasi_model->listing();
		$kos 		= $this->kos_model->read($slug_kos);
		$id_kos		= $kos->id_kos;
		$gambar			= $this->kos_model->gambar($id_kos);
		$kos_related = $this->kos_model->home();

		$data = array(	'title'				=>	$kos->nama_kos,
						'site'				=> 	$site,
						'kos'			=>	$kos,
						'kos_related'	=>	$kos_related,
						'gambar'			=>	$gambar,
						'isi'				=>	'kos/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}



}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */