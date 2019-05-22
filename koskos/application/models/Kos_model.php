 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kos_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	
	public function listing()
	{
		$this->db->select('kos.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('kos');
		$this->db->join('users', 'users.id_user = kos.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_kos = kos.id_kos', 'left');
		$this->db->group_by('kos.id_kos');
		$this->db->order_by('id_kos', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function home()
	{
		$this->db->select('kos.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('kos');
		$this->db->join('users', 'users.id_user = kos.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_kos = kos.id_kos', 'left');

		$this->db->group_by('kos.id_kos');
		$this->db->order_by('id_kos', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	//read kos
	public function read($slug_kos)
	{
		$this->db->select('kos.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('kos');
		$this->db->join('users', 'users.id_user = kos.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_kos = kos.id_kos', 'left');

		$this->db->where('kos.slug_kos', $slug_kos);
		$this->db->group_by('kos.id_kos');
		$this->db->order_by('id_kos', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//kos
	public function kos($limit,$start)
	{
		$this->db->select('kos.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('kos');
		$this->db->join('users', 'users.id_user = kos.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_kos = kos.id_kos', 'left');

		$this->db->group_by('kos.id_kos');
		$this->db->order_by('id_kos', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//total kos
	public function total_kos()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('kos');
		$query = $this->db->get();
		return $query->row();
	}

	//kategori kos
	public function kategori($id_kategori, $limit, $start)
	{
		$this->db->select('kos.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('kos');
		$this->db->join('users', 'users.id_user = kos.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_kos = kos.id_kos', 'left');

		$this->db->where('kos.id_kategori', $id_kategori);
		$this->db->group_by('kos.id_kos');
		$this->db->order_by('id_kos', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//total kos
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('kos');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}

	//listing kategori
	public function listing_kategori()
	{
		$this->db->select('kos.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('kos');
		$this->db->join('users', 'users.id_user = kos.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = kos.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_kos = kos.id_kos', 'left');
		$this->db->group_by('kos.id_kategori');
		$this->db->order_by('id_kos', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_kos){
		$this->db->select('*');
		$this->db->from('kos');
		$this->db->where('id_kos', $id_kos);
		$this->db->order_by('id_kos', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail_gambar($id_gambar){
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function gambar($id_kos)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_kos', $id_kos);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('kos', $data);
	}

	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	public function delete($data){
		$this->db->where('id_kos', $data['id_kos']);
		$this->db->delete('kos', $data);
	}

	public function delete_gambar($data){
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}

	public function edit($data){
		$this->db->where('id_kos', $data['id_kos']);
		$this->db->update('kos', $data);
	}
}


/* End of file kos_model.php */
/* Location: ./application/models/kos_model.php */