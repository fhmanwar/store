<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('kategori_berita_model');
	}

	// Index
	public function index() {
		$kategori = $this->kategori_berita_model->listing();

		// Validasi
		$this->form_validation->set_rules('nama_kategori','Nama kategori',
																			'required|is_unique[kategori_berita.nama_kategori]',
																			array(	'required'	=> 'Nama kategori berita harus diisi',
																							'is_unique'	=> 'Kategori Berita : <strong>'.$this->input->post('nama_kategori').
								 						   							  '</strong> sudah digunakan. Buat kstegori baru!'
																					));

		if($this->form_validation->run() === FALSE) {
		// End validasi

			$data = array(	'title'			=> 'Data Kategori Berita',
											'kategori'	=> $kategori,
											'isi'				=> 'admin/kategori_berita/list');
			$this->load->view('admin/layout/file',$data);
		// Masuk database
		}else{
			$i 							= $this->input;
			$slug_kategori	= url_title($i->post('nama_kategori'),'dash',TRUE);
			$data = array(	'slug_kategori'	=> $slug_kategori,
											'nama_kategori'	=> $i->post('nama_kategori'),
											'keterangan'		=> $i->post('keterangan'),
											'urutan'				=> $i->post('urutan'),
											'id_kategori'		=> $i->post('id_kategori'));
			$this->kategori_berita_model->tambah($data);
			$this->session->set_flashdata('sukses','Kategori berita telah ditambah');
			redirect(base_url('admin/kategori_berita'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_kategori) {
		$kategori_berita = $this->kategori_berita_model->detail($id_kategori);

		// Validasi
		$this->form_validation->set_rules('nama_kategori','Nama kategori','required',
																			array(	'required'	=> 'Nama kategori berita harus diisi'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Edit Kategori Berita',
						'kategori_berita'	=> $kategori_berita,
						'isi'				=> 'admin/kategori_berita/edit');
		$this->load->view('admin/layout/file',$data);
		// Masuk database
		}else{
			$i 				= $this->input;
			$data = array(	'id_kategori'		=> $id_kategori,
											'nama_kategori'	=> $i->post('nama_kategori'),
											'keterangan'		=> $i->post('keterangan'),
											'urutan'				=> $i->post('urutan'));
			$this->kategori_berita_model->edit($data);
			$this->session->set_flashdata('sukses','Kategori berita telah diedit');
			redirect(base_url('admin/kategori_berita'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_kategori) {
		$this->simple_login->cek_login();
		$data = array('id_kategori'	=> $id_kategori);
		$this->kategori_berita_model->delete($data);
		$this->session->set_flashdata('sukses','Kategori berita telah didelete');
		redirect(base_url('admin/kategori_berita'));
	}
}
