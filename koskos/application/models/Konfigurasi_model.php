<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
			parent::__construct();
			$this->load->database();

	}

	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}	

	// load menu kategori
	public function nav_kos()
	{
		$this->db->select('kos.*,
						kategori.nama_kategori,
						kategori.slug_kategori');
		$this->db->from('kos');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->group_by('kos.id_kategori');
		$this->db->order_by('kategori.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */