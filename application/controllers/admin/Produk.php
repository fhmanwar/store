<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
	}

	// Index
	public function index() {
		$produk = $this->produk_model->listing();

		$data = array(	'title'				=> 'Data produk',
										'produk'	=> $produk,
										'isi'					=> 'admin/produk/list');
		$this->load->view('admin/layout/file', $data);
	}

	// Tambah
	public function tambah() {
		$kategori	= $this->kategori_produk_model->listing();
		$akhir	= $this->produk_model->akhir();

		// Validasi
		$v = $this->form_validation;

		$v->set_rules('nama_produk','Nama produk','required|is_unique[tbl_produk.nama_produk]',
									array(	'required'		=> 'Nama produk harus diisi',
													'is_unique'		=> 'Nama produk: <strong>'.$this->input->post('nama_produk').
													   							 '</strong> sudah ada. Buat nama yang berbeda'));

		$v->set_rules('harga','Harga','required',
									array(	'required'		=> 'Harga produk harus diisi'));

		$v->set_rules('stok','Stok','required',
									array(	'required'		=> 'Stok produk harus diisi'));

		$v->set_rules('satuan','Satuan','required',
									array(	'required'		=> 'Satuan produk harus diisi'));
		if($v->run()) {
			$config['upload_path'] 		= './assets/images/produk/'; //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']				= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		// End validasi

				$data = array(	'title'					=> 'Add produk',
												'kategori'	=> $kategori,
												'error'					=> $this->upload->display_errors(),
												'isi'						=> 'admin/produk/tambah');
				$this->load->view('admin/layout/file', $data);
				// Masuk database
				}else{
					$upload_data								= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']		= 'gd2';
					$config['source_image'] 		= './assets/images/produk/'.$upload_data['uploads']['file_name'];
					$config['new_image'] 				= './assets/images/produk/thumbs/';
					$config['create_thumb'] 		= TRUE;
					$config['quality'] 					= "100%";
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 						= 360; // Pixel
					$config['height'] 					= 200; // Pixel
					$config['x_axis'] 					= 0;
					$config['y_axis'] 					= 0;
					$config['thumb_marker'] 		= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					// Proses ke database
					$i 						= $this->input;
					$url_akhir 		= $akhir->id_produk+1;
					$slug					= $url_akhir.'-'.url_title($i->post('nama_produk'),'dash',TRUE);
					$data 				= array(	'slug_produk'					=> $slug,
																	'id_user'							=> $this->session->userdata('id'),
																	'id_kategori'					=> $i->post('id_kategori'),
																	'nama_produk'					=> $i->post('nama_produk'),
																	'harga'								=> $i->post('harga'),
																	'stok'								=> $i->post('stok'),
																	'satuan'							=> $i->post('satuan'),
																	'deskripsi'						=> $i->post('deskripsi'),
																	'status_produk'				=> $i->post('status_produk'),
																	'gambar'							=> $upload_data['uploads']['file_name'],
																	'tanggal_post'				=> date('Y-m-d H:i:s')
																);
					$this->produk_model->tambah($data);
					$this->session->set_flashdata('sukses','produk created successfully');
					redirect(base_url('admin/produk'));
				}}
		// End masuk database
		$data = array(	'title'					=> 'Add produk',
										'kategori'	=> $kategori,
										'isi'						=> 'admin/produk/tambah');
		$this->load->view('admin/layout/file', $data);
	}

	// Edit
	public function edit($id_produk) {
		$kategori	= $this->kategori_produk_model->listing();
		$akhir	= $this->produk_model->akhir();
		$produk	= $this->produk_model->detail($id_produk);

		// Validasi
		$v = $this->form_validation;

		$v->set_rules('nama_produk','Nama produk','required',
									array(	'required'		=> 'Nama produk harus diisi'));

		$v->set_rules('harga','Harga produk','required',
									array(	'required'		=> 'Harga produk harus diisi'));

		$v->set_rules('stok','Stok produk','required',
									array(	'required'		=> 'Stok produk harus diisi'));

		$v->set_rules('deskripsi','Deskripsi produk','required',
									array(	'required'		=> 'Deskripsi produk harus diisi'));

		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/images/produk/'; //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']				= '12000'; // KB
				$this->load->library('upload', $config);
				if(! $this->upload->do_upload('gambar')) {
			// End validasi

					$data = array(	'title'			=> 'Edit Product',
													'kategori'	=> $kategori,
													'produk'		=> $produk,
													'error'			=> $this->upload->display_errors(),
													'isi'				=> 'admin/produk/edit');
					$this->load->view('admin/layout/file', $data);
					// Masuk database
					}

				else{
					$upload_data								= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']		= 'gd2';
					$config['source_image'] 		= './assets/images/produk/'.$upload_data['uploads']['file_name'];
					$config['new_image'] 				= './assets/images/produk/thumbs/';
					$config['create_thumb'] 		= TRUE;
					$config['quality'] 					= "100%";
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 						= 360; // Pixel
					$config['height'] 					= 200; // Pixel
					$config['x_axis'] 					= 0;
					$config['y_axis'] 					= 0;
					$config['thumb_marker'] 		= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					//hapus gambar
					if($produk->gambar != ""){
						unlink('./assets/images/produk/'.$produk->gambar);
						unlink('./assets/images/produk/thumbs/'.$produk->gambar);
					}
					//end hapus gambar

					// Proses ke database
					$i 						= $this->input;
					$data 				= array(	'id_produk'						=> $id_produk,
																	'id_user'							=> $this->session->userdata('id'),
																	'id_kategori'					=> $i->post('id_kategori'),
																	'nama_produk'					=> $i->post('nama_produk'),
																	'harga'								=> $i->post('harga'),
																	'stok'								=> $i->post('stok'),
																	'satuan'							=> $i->post('satuan'),
																	'deskripsi'						=> $i->post('deskripsi'),
																	'status_produk'				=> $i->post('status_produk'),
																	'gambar'							=> $upload_data['uploads']['file_name']
																);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses','Product Edit successfully');
					redirect(base_url('admin/produk'));
			 }
			}
			else{
					// Proses ke database
					$i 						= $this->input;
					$data 				= array(	'id_produk'						=> $id_produk,
																	'id_user'							=> $this->session->userdata('id'),
																	'id_kategori'					=> $i->post('id_kategori'),
																	'nama_produk'					=> $i->post('nama_produk'),
																	'harga'								=> $i->post('harga'),
																	'stok'								=> $i->post('stok'),
																	'satuan'							=> $i->post('satuan'),
																	'deskripsi'						=> $i->post('deskripsi'),
																	'status_produk'				=> $i->post('status_produk')
																);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses','Product Edit successfully');
					redirect(base_url('admin/produk'));
				}
			}
		// End masuk database
		$data = array(	'title'			=> 'Edit product',
										'kategori'	=> $kategori,
										'produk'		=> $produk,
										'isi'				=> 'admin/produk/edit');
		$this->load->view('admin/layout/file', $data);
	}

	// Delete
	public function delete($id_produk) {
		$this->simple_login->cek_login();
		$tbl_produk		= $this->produk_model->detail($id_produk);
		//hapus gambar
		if($produk->gambar != ""){
			unlink('./assets/images/produk/'.$tbl_produk->gambar);
			unlink('./assets/images/produk/thumbs/'.$tbl_produk->gambar);
		}
		//end hapus gambar
		$data = array('id_produk'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses','Data Delete successfully');
		redirect(base_url('admin/produk'));
	}
}
