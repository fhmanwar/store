<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
	}

	// Index
	public function index() {
		$berita = $this->berita_model->listing();

		$data = array(	'title'		=> 'Data berita',
										'berita'	=> $berita,
										'isi'			=> 'admin/berita/list');
		$this->load->view('admin/layout/file', $data);
	}

	// Tambah
	public function tambah() {
		$kategori	= $this->kategori_berita_model->listing();
		$akhir	= $this->berita_model->akhir();

		// Validasi
		$v = $this->form_validation;

		$v->set_rules('judul','Judul Berita','required|is_unique[berita.judul]',
									array(	'required'		=> 'Judul Berita harus diisi',
													'is_unique'		=> 'Judul Berita: <strong>'.$this->input->post('judul').
													   							 '</strong> sudah ada. Buat nama yang berbeda'));

		$v->set_rules('isi','Isi','required',
									array(	'required'		=> 'Keterangan berita harus diisi'));

		if($v->run()) {
			$config['upload_path'] 		= './assets/images/news/'; //lokasi folder upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']				= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		// End validasi

				$data = array(	'title'			=> 'Add News',
												'kategori'	=> $kategori,
												'error'			=> $this->upload->display_errors(),
												'isi'				=> 'admin/berita/tambah');
				$this->load->view('admin/layout/file', $data);
				// Masuk database
				}else{
					$upload_data								= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']		= 'gd2';
					$config['source_image'] 		= './assets/images/news/'.$upload_data['uploads']['file_name'];
					$config['new_image'] 				= './assets/images/news/thumbs/';
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
					$url_akhir 		= $akhir->id_berita+1;
					$slug					= $url_akhir.'-'.url_title($i->post('judul'),'dash',TRUE);
					$data 				= array(	'slug_berita'					=> $slug,
																	'id_user'							=> $this->session->userdata('id'),
																	'id_kategori'					=> $i->post('id_kategori'),
																	'judul'								=> $i->post('judul'),
																	'isi'									=> $i->post('isi'),
																	'jenis_berita'				=> $i->post('jenis_berita'),
																	'status_berita'				=> $i->post('status_berita'),
																	'gambar'							=> $upload_data['uploads']['file_name'],
																	'tanggal_post'				=> date('Y-m-d H:i:s')
																);
					$this->berita_model->tambah($data);
					$this->session->set_flashdata('sukses','News created successfully');
					redirect(base_url('admin/berita'));
				}}
		// End masuk database
		$data = array(	'title'			=> 'Add berita',
										'kategori'	=> $kategori,
										'isi'				=> 'admin/berita/tambah');
		$this->load->view('admin/layout/file', $data);
	}

	// Edit
	public function edit($id_berita) {
		$kategori	= $this->kategori_berita_model->listing();
		$akhir	= $this->berita_model->akhir();
		$berita	= $this->berita_model->detail($id_berita);

		// Validasi
		$v = $this->form_validation;

		$v->set_rules('judul','Judul Berita','required',
									array(	'required'		=> 'Judul Berita harus diisi'
								 ));

		$v->set_rules('isi','Isi','required',
									array(	'required'		=> 'Keterangan berita harus diisi'));

		if($v->run()) {
			//jika tidak ada gambar
			if(!empty($_FILES['gambar']['name'])) {
				$config['upload_path'] 		= './assets/images/news/'; //lokasi folder upload
				$config['allowed_types'] 	= 'gif|jpg|png|svg';
				$config['max_size']				= '12000'; // KB
				$this->load->library('upload', $config);
				if(! $this->upload->do_upload('gambar')) {
			// End validasi

					$data = array(	'title'			=> 'Edit News',
													'kategori'	=> $kategori,
													'berita'		=> $berita,
													'error'			=> $this->upload->display_errors(),
													'isi'				=> 'admin/berita/edit');
					$this->load->view('admin/layout/file', $data);
					// Masuk database
				}
				else{
					$upload_data								= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']		= 'gd2';
					$config['source_image'] 		= './assets/images/news/'.$upload_data['uploads']['file_name'];
					$config['new_image'] 				= './assets/images/news/thumbs/';
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
					if($berita->gambar != ""){
						unlink('./assets/images/news/'.$berita->gambar);
						unlink('./assets/images/news/thumbs/'.$berita->gambar);
					}
					//end hapus gambar

					// Proses ke database
					$i 						= $this->input;
					$data 				= array(	'id_berita'						=> $id_berita,
																	'id_user'							=> $this->session->userdata('id'),
																	'id_kategori'					=> $i->post('id_kategori'),
																	'judul'								=> $i->post('judul'),
																	'isi'									=> $i->post('isi'),
																	'jenis_berita'				=> $i->post('jenis_berita'),
																	'status_berita'				=> $i->post('status_berita'),
																	'gambar'							=> $upload_data['uploads']['file_name']
																);
					$this->berita_model->edit($data);
					$this->session->set_flashdata('sukses','News Edit successfully');
					redirect(base_url('admin/berita'));
			 }
			}
			//update tanpa gambar
			else{
					// Proses ke database
					$i 						= $this->input;
					$data 				= array(	'id_berita'						=> $id_berita,
																	'id_user'							=> $this->session->userdata('id'),
																	'id_kategori'					=> $i->post('id_kategori'),
																	'judul'								=> $i->post('judul'),
																	'isi'									=> $i->post('isi'),
																	'jenis_berita'				=> $i->post('jenis_berita'),
																	'status_berita'				=> $i->post('status_berita')
																);
					$this->berita_model->edit($data);
					$this->session->set_flashdata('sukses','News Edit successfully');
					redirect(base_url('admin/berita'));
			}
		}
		// End masuk database
		$data = array(	'title'			=> 'Edit berita',
										'kategori'	=> $kategori,
										'berita'		=> $berita,
										'isi'				=> 'admin/berita/edit');
		$this->load->view('admin/layout/file', $data);
	}

	// Delete
	public function delete($id_berita) {
		$this->simple_login->cek_login();
		$berita = $this->berita_model->detail($id_berita);
		//hapus gambar
		if($berita->gambar != ""){
			unlink('./assets/images/news/'.$berita->gambar);
			unlink('./assets/images/news/thumbs/'.$berita->gambar);
		}
		//end hapus gambar
		$data = array('id_berita'	=> $id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses','Data telah didelete');
		redirect(base_url('admin/berita'));
	}
}
