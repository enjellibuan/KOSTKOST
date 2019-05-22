<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		$this->load->model('konfigurasi_model');
		$this->simple_pelanggan->cek_login();
	}

	public function index()
	{
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$data = array(	'title'				=> 'Halaman Dasbor Pelanggan',
						'isi'				=> 'dasbor/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function cetak($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 	= $this->konfigurasi_model->listing();
		$data = array(	'title'				=> 'Riwayat Perakitan',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		$this->load->view('dasbor/cetak', $data, FALSE);
	}

	public function pdf($kode_transaksi)
	{
		$header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 	= $this->konfigurasi_model->listing();
		$data = array(	'title'				=> 'Riwayat Perakitan',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi'			=> $transaksi,
						'site'				=> $site
					);
		//$this->load->view('layout/wrapper', $data, FALSE);
		$html = $this->load->view('dasbor/cetak',$data, true);
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$x = $header_transaksi->kode_transaksi;
		$mpdf->Output($x,'I');
	}

	public function profile()
	{

		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);

		$valid = $this->form_validation;
		$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
			array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules('alamat','Alamat','required',
			array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules('telepon','Telepon','required',
			array(	'required'		=>	'%s harus diisi'));
		$valid->set_rules('password', 'Password','required',
			array(	'required'		=>	'%s harus diisi'));

		if ($valid->run()===FALSE) {
		$data = array(	'title'				=> 'USER PROFILE',
						'pelanggan'		 	=> $pelanggan,
						'isi'				=> 'dasbor/profile'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(  'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan' 	=> $i->post('nama_pelanggan'),
							'password' 			=> SHA1($i->post('password')),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
						);
			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Edit Profil Berhasil');
			redirect(base_url('dasbor/profile'),'refresh');
		}
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */