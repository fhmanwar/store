<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('galeri_model');
	}

	// Index
	public function index() {
		$galeri = $this->galeri_model->listing();

		$data = array(	'title'		=> 'Data galeri',
										'galeri'	=> $galeri,
										'isi'			=> 'admin/galeri/list');
		$this->load->view('admin/layout/file', $data);
	}

	// Tambah
	public function tambah() {

		// Validasi
		$v = $this->form_validation;

		$v->set_rules('judul_galeri','Judul Galeri','required',
									array(	'required'		=> '%s harus diisi'));

		$v->set_rules('isi_galeri','Isi Galeri','required',
									array(	'required'		=> '%s harus diisi'));

		if($v->run()) {
			$config['upload_path'] 		= './assets/images/galeri/'; //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg|jpeg';
			$config['max_size']				= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		// End validasi

				$data = array(	'title'			=> 'Add Galeri',
												'error'			=> $this->upload->display_errors(),
												'isi'				=> 'admin/galeri/tambah');
				$this->load->view('admin/layout/file', $data);
				// Masuk database
				}else{
					$upload_data								= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']		= 'gd2';
					$config['source_image'] 		= './assets/images/galeri/'.$upload_data['uploads']['file_name'];
					$config['new_image'] 				= './assets/images/galeri/thumbs/';
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
					$data 				= array(	'id_user'							=> $this->session->userdata('id'),
																	'judul_galeri'				=> $i->post('judul_galeri'),
																	'isi_galeri'					=> $i->post('isi_galeri'),
																	'website'							=> $i->post('website'),
																	'posisi_galeri'				=> $i->post('posisi_galeri'),
																	'gambar'							=> $upload_data['uploads']['file_name'],
																	'tanggal_post'				=> date('Y-m-d H:i:s')
																);
					$this->galeri_model->tambah($data);
					$this->session->set_flashdata('sukses','Galeri created successfully');
					redirect(base_url('admin/galeri'));
				}}
		// End masuk database
		$data = array(	'title'			=> 'Add galeri',
										'isi'				=> 'admin/galeri/tambah');
		$this->load->view('admin/layout/file', $data);
	}

	// Edit
	public function edit($id_galeri) {
		$galeri	= $this->galeri_model->detail($id_galeri);

		// Validasi
		$v = $this->form_validation;

		$v->set_rules('judul_galeri','Judul Galeri','required',
									array(	'required'		=> '%s harus diisi'
								 ));

		$v->set_rules('isi_galeri','Isi Galeri','required',
									array(	'required'		=> '%s galeri harus diisi'));

		if($v->run()) {
			//jika tidak ada gambar
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/images/galeri/'; //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']				= '12000'; // KB
				$this->load->library('upload', $config);
				if(! $this->upload->do_upload('gambar')) {
			// End validasi

					$data = array(	'title'			=> 'Edit Galeri',
													'galeri'		=> $galeri,
													'error'			=> $this->upload->display_errors(),
													'isi'				=> 'admin/galeri/edit');
					$this->load->view('admin/layout/file', $data);
					// Masuk database
				}
				else{
					$upload_data								= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']		= 'gd2';
					$config['source_image'] 		= './assets/images/galeri/'.$upload_data['uploads']['file_name'];
					$config['new_image'] 				= './assets/images/galeri/thumbs/';
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
					if($galeri->gambar != ""){
						unlink('./assets/images/galeri/'.$galeri->gambar);
						unlink('./assets/images/galeri/thumbs/'.$galeri->gambar);
					}
					//end hapus gambar

					// Proses ke database
					$i 						= $this->input;
					$data 				= array(	'id_galeri'						=> $id_galeri,
																	'id_user'							=> $this->session->userdata('id'),
																	'judul_galeri'				=> $i->post('judul_galeri'),
																	'isi_galeri'					=> $i->post('isi_galeri'),
																	'website'							=> $i->post('website'),
																	'posisi_galeri'				=> $i->post('posisi_galeri'),
																	'gambar'							=> $upload_data['uploads']['file_name'],
																);
					$this->galeri_model->edit($data);
					$this->session->set_flashdata('sukses','Galeri Edit successfully');
					redirect(base_url('admin/galeri'));
			 }
			}
			//update tanpa gambar
			else{
					// Proses ke database
					$i 						= $this->input;
					$data 				= array(	'id_galeri'						=> $id_galeri,
																	'id_user'							=> $this->session->userdata('id'),
																	'judul_galeri'				=> $i->post('judul_galeri'),
																	'isi_galeri'					=> $i->post('isi_galeri'),
																	'website'							=> $i->post('website'),
																	'posisi_galeri'				=> $i->post('posisi_galeri'),
																);
					$this->galeri_model->edit($data);
					$this->session->set_flashdata('sukses','Galeri Edit successfully');
					redirect(base_url('admin/galeri'));
			}
		}
		// End masuk database
		$data = array(	'title'			=> 'Edit galeri',
										'galeri'		=> $galeri,
										'isi'				=> 'admin/galeri/edit');
		$this->load->view('admin/layout/file', $data);
	}

	// Delete
	public function delete($id_galeri) {
		$this->simple_login->cek_login();
		$galeri = $this->galeri_model->detail($id_galeri);
		//hapus gambar
		if($galeri->gambar != ""){
			unlink('./assets/images/galeri/'.$galeri->gambar);
			unlink('./assets/images/galeri/thumbs/'.$galeri->gambar);
		}
		//end hapus gambar
		$data = array('id_galeri'	=> $id_galeri);
		$this->galeri_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah didelete');
		redirect(base_url('admin/galeri'));
	}
}
