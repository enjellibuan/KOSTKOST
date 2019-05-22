<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kos extends CI_Controller {
	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kos_model');
		$this->load->model('kategori_model');
		$this->load->library('image_lib');
		$this->simple_login->cek_login();
	}

	//data kos
	public function index()
	{
		$kos = $this->kos_model->listing();
		$data = array(	'title'		=> 'Data kos',
						'kos'		=> $kos,
						'isi'		=> 'admin/kos/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function gambar($id_kos)
	{
		$kos = $this->kos_model->detail($id_kos);
		$gambar = $this->kos_model->gambar($id_kos);

		$valid = $this->form_validation;
		$valid->set_rules('judul_gambar','Judul/Nama Gambar','required',
			array(	'required'		=>	'%s harus diisi'));


		if ($valid->run()) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpeg|jpg|png';
			$config['max_size']  		= '10000';
			$config['max_width']  		= '3000';
			$config['max_height']  		= '3000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){

		$data = array(	'title'		=> 'Tambah Gambar KOS: '.$kos->nama_kos,
						'kos'	=> $kos,
						'gambar'	=> $gambar,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/kos/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			// create thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			$config['new_image']		= './assets/upload/image/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			echo $this->image_lib->display_errors();

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// end


			$i = $this->input;
			$data = array(	'id_kos'		=> $id_kos,
							'judul_gambar' 	=> $i->post('judul_gambar'),
							'gambar'		=> $upload_gambar['upload_data']['file_name'],
						);
			$this->kos_model->tambah_gambar($data);
			$this->session->set_flashdata('sukses', 'Gambar telah ditambah');
			redirect(base_url('admin/kos/gambar/'.$id_kos),'refresh');
		}}
		$data = array(	'title'		=> 'Tambah Gambar kos: '.$kos->nama_kos,
						'kos'	=> $kos,
						'gambar'	=> $gambar,
						'isi'		=> 'admin/kos/gambar'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		$kategori = $this->kategori_model->listing();
		$valid = $this->form_validation;
		$valid->set_rules('nama_kos','Nama kos','required',
			array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules('kode_kos','Kode kos','required|is_unique[kos.kode_kos]',
			array(	'required'		=>	'%s harus diisi',
					'is_unique'		=>	'%s sudah ada, silahkan buat kode kos baru'));

		if ($valid->run()) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpeg|jpg|png';
			$config['max_size']  		= '10000';
			$config['max_width']  		= '3000';
			$config['max_height']  		= '3000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){

		$data = array(	'title'		=> 'Tambah kos',
						'kategori'	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/kos/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			// create thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			$config['new_image']		= './assets/upload/image/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			echo $this->image_lib->display_errors();

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// end


			$i = $this->input;
			$slug_kos = url_title($this->input->post('nama_kos').'-'.$this->input->post('kode_kos'), 'dash', TRUE);
			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'id_kategori'	=> $i->post('id_kategori'),
							'kode_kos' 	=> $i->post('kode_kos'),
							'nama_kos' 	=> $i->post('nama_kos'),
							'slug_kos'	=> $slug_kos,
							'keterangan' 	=> $i->post('keterangan'),
							'keywords'		=> $i->post('keywords'),
							'harga'		 	=> $i->post('harga_kos'),
							'gambar'		=> $upload_gambar['upload_data']['file_name'],
							'tanggal_post'	=> date('Y-m-d H:i:s')
						);
			$this->kos_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kos'),'refresh');
		}}
		$data = array(	'title'		=> 'Tambah kos',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/kos/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function edit($id_kos)
	{
		$kos 	= $this->kos_model->detail($id_kos);
		$kategori 	= $this->kategori_model->listing();

		$valid 		= $this->form_validation;
		$valid->set_rules('nama_kos','Nama kos','required',
			array(	'required'		=>	'%s harus diisi'));

		$valid->set_rules('kode_kos','Kode kos','required',
			array(	'required'		=>	'%s harus diisi'));

		if ($valid->run()) {
			if (!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpeg|jpg|png';
			$config['max_size']  		= '10000';
			$config['max_width']  		= '3000';
			$config['max_height']  		= '3000';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){

		$data = array(	'title'		=> 'Edit kos: '.$kos->nama_kos,
						'kategori'	=> $kategori,
						'kos'	=> $kos,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/kos/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			// create thumbnail
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			$config['new_image']		= './assets/upload/image/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;
			$config['height']       	= 250;
			echo $this->image_lib->display_errors();

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// end


			$i = $this->input;
			$slug_kos = url_title($this->input->post('nama_kos').'-'.$this->input->post('kode_kos'), 'dash', TRUE);
			$data = array(	'id_kos'		=> $id_kos,
							'id_user'		=> $this->session->userdata('id_user'),
							'id_kategori'	=> $i->post('id_kategori'),
							'kode_kos' 	=> $i->post('kode_kos'),
							'nama_kos' 	=> $i->post('nama_kos'),
							'slug_kos'	=> $slug_kos,
							'keterangan' 	=> $i->post('keterangan'),
							'keywords'		=> $i->post('keywords'),
							'harga'		 	=> $i->post('harga_kos'),
							'gambar'		=> $upload_gambar['upload_data']['file_name'],
						);
			$this->kos_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kos'),'refresh');
		}}else{
			//hanya edit data tanpa gambar
			$i = $this->input;
			$slug_kos = url_title($this->input->post('nama_kos').'-'.$this->input->post('kode_kos'), 'dash', TRUE);
			$data = array(	'id_kos'		=> $id_kos,
							'id_user'		=> $this->session->userdata('id_user'),
							'id_kategori'	=> $i->post('id_kategori'),
							'kode_kos' 	=> $i->post('kode_kos'),
							'nama_kos' 	=> $i->post('nama_kos'),
							'slug_kos'	=> $slug_kos,
							'keterangan' 	=> $i->post('keterangan'),
							'keywords'		=> $i->post('keywords'),
							'harga'		 	=> $i->post('harga_kos'),
							//'gambar'		=> $upload_gambar['upload_data']['file_name'],
						);
			$this->kos_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kos'),'refresh');
		}}
		$data = array(	'title'		=> 'Edit kos: '.$kos->nama_kos,
						'kategori'	=> $kategori,
						'kos'	=> $kos,
						'isi'		=> 'admin/kos/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

	}

	public function delete($id_kos){
		$kos = $this->kos_model->detail($id_kos);
		unlink('./assets/upload/image/'.$kos->gambar);
		$data = array('id_kos' => $id_kos);
		$this->kos_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kos/'),'refresh');
	}

	public function delete_gambar($id_kos,$id_gambar){
		$gambar = $this->kos_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		$data = array('id_gambar' => $id_gambar);
		$this->kos_model->delete_gambar($data);
		$this->session->set_flashdata('sukses', 'Gambar telah dihapus');
		redirect(base_url('admin/kos/gambar/'.$id_kos),'refresh');
	}

}

/* End of file kos.php */
/* Location: ./application/controllers/admin/kos.php */