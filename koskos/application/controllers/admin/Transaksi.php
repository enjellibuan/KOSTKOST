<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');	
	}

	public function index()
	{
		$header_transaksi = $this->header_transaksi_model->listing();
		$data = array(	'title'				=> 'Data Perakitan',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title'				=> 'Riwayat Perakitan',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'isi'				=> 'admin/transaksi/detail'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */