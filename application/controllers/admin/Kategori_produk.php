<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('kategori_produk_model');
	}

	// Index
	public function index() {
		$kategori_produk = $this->kategori_produk_model->listing();

		// Validasi
		$this->form_validation->set_rules('nama_kategori','Nama kategori','required',
																			array(	'required'	=> 'Nama kategori produk harus diisi'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Kategori Produk',
										'kategori_produk'	=> $kategori_produk,
										'isi'				=> 'admin/kategori_produk/list');
		$this->load->view('admin/layout/file',$data);
		// Masuk database
		}else{
			$i 				= $this->input;
			$slug_kategori	= url_title($i->post('nama_kategori'),'dash',TRUE);
			$data = array(	'slug_kategori'	=> $slug_kategori,
											'nama_kategori'	=> $i->post('nama_kategori'),
											'keterangan'			=> $i->post('keterangan'),
											'urutan'				=> $i->post('urutan'));
			$this->kategori_produk_model->tambah($data);
			$this->session->set_flashdata('sukses','Kategori produk telah ditambah');
			redirect(base_url('admin/kategori_produk'));
		}
		// End masuk database
	}

	// Edit
	public function edit($id_kategori) {
		$kategori_produk = $this->kategori_produk_model->detail($id_kategori);

		// Validasi
		$this->form_validation->set_rules('nama_kategori','Nama kategori','required',
																			array(	'required'	=> 'Nama kategori produk harus diisi'));

		if($this->form_validation->run() === FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Edit Kategori Produk',
										'kategori_produk'	=> $kategori_produk,
										'isi'				=> 'admin/kategori_produk/edit');
		$this->load->view('admin/layout/file',$data);
		// Masuk database
		}else{
			$i 				= $this->input;
			$data = array(	'id_kategori'	=> $id_kategori,
											'nama_kategori'	=> $i->post('nama_kategori'),
											'keterangan'			=> $i->post('keterangan'),
											'urutan'				=> $i->post('urutan'));
			$this->kategori_produk_model->edit($data);
			$this->session->set_flashdata('sukses','Kategori produk telah diedit');
			redirect(base_url('admin/kategori_produk'));
		}
		// End masuk database
	}

	// Delete
	public function delete($id_kategori) {
		$this->simple_login->cek_login();
		$data = array('id_kategori'	=> $id_kategori);
		$this->kategori_produk_model->delete($data);
		$this->session->set_flashdata('sukses','Kategori produk telah didelete');
		redirect(base_url('admin/kategori_produk'));
	}
}
