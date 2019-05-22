<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
			array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email|is_unique[pelanggan.email]',
			array(	'required'		=>	'%s harus diisi',
					'valid email'	=>	'%s tidak valid',
					'is_unique'		=>	'%s sudah ada'));

		$valid->set_rules('password','Password','required',
			array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules('telepon', 'Telepon', 'required|integer',
			array(  'required' 		=>  '%s harus diisi',
					'integer'		=>	'%s harus angka'));

		if ($valid->run()===FALSE) {
		$data = array(	'title'		=> 'Registrasi Pelanggan',
						'isi'		=> 'registrasi/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			$i = $this->input;
			$data = array(  'nama_pelanggan' 	=> $i->post('nama_pelanggan'),
							'email' 			=> $i->post('email'),
							'password' 			=> SHA1($i->post('password')),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
							'tanggal_daftar'	=> date('Y-m-d H:i:s')
						);
			$this->pelanggan_model->tambah($data);
			//create session
			$this->session->set_userdata('email',$i->post('email'));
			$this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
			$this->session->set_flashdata('sukses', 'Registrasi Berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}	
	}

	public function sukses()
	{
		$data 	= array(	'title'		=> 'Registrasi Berhasil',
							'isi'		=> 'registrasi/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */