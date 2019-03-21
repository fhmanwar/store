<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
	}

	// Index
	public function index() {
		$this->simple_login->cek_login();
		$user = $this->user_model->listing();

		$data = array( 	'title' => 'Administrator',
										'user'	=> 	$user,
										'isi'  	=> 'admin/user/list');
		$this->load->view('admin/layout/file',$data);
	}

	// Tambah User
	public function tambah() {
		$this->simple_login->cek_login();
		$home = $this->home_model->listing();

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
		 									array( 'required' 		=> '%s harus diisi',
														 'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('username','Username','required|is_unique[users.username]',
											array( 'required' 	=> '%s harus diisi',
														 'is_unique'	=> '%s: <strong>'.$this->input->post('username').
						   							 '</strong> sudah digunakan. Buat username baru!'));

		$valid->set_rules('password','Password','required|max_length[32]|min_length[8]',
											array( 'required' 		=> 'Password harus diisi',
														 'min_length'		=> 'password min 6 character',
													 	 'max_length'		=> 'password max 32 character'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array( 'title' => 'Create User/Administrator',
									 'home'  => $home,
									 'isi'  => 'admin/user/tambah');
		$this->load->view('admin/layout/file',$data);

		// masuk database
		}else{
			$i = $this->input;
			$data = array( 	'nama'				=> 	$i->post('nama'),
											'email'				=>	$i->post('email'),
											'username'		=>	$i->post('username'),
											'password'		=>	md5($i->post('password')), //enkripsi md5
											'id_home'			=>  $i->post('id_home'),
											'akses_level'	=>  $i->post('akses_level'));
			$this->user_model->tambah($data);
			$this->session->set_flashdata('success','User/Administrator created successfully');
			redirect(base_url('admin/user'));
		}
		// End masuk database
	}

	// Edit User
	public function edit($id) {
		$home = $this->home_model->listing();
		$user = $this->user_model->detail($id);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));

	  $valid->set_rules('email','Email','required|valid_email',
 												array( 'required' 		=> 'email harus diisi',
	 												 		 'valid_email'	=> 'Email tidak valid'));

	  $valid->set_rules('password','Password','required|max_length[32]|min_length[8]',
											array( 'required' 		=> 'Password harus diisi',
														 'min_length'		=> 'password min 6 character',
													 	 'max_length'		=> 'password max 32 character'));

		if($valid->run()===FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Edit User/Administrator',
											'home'		=> $home,
											'user'		=> $user,
											'isi' 		=> 'admin/user/edit');
			$this->load->view('admin/layout/file',$data);
		// masuk database
		}else{
			$i = $this->input;
			if(strlen($i->post('password')) < 6 || strlen($i->post('password')) > 32 ){
				$data = array( 	'id'					=> 	$id,
												'nama'				=> 	$i->post('nama'),
												'email'				=>	$i->post('email'),
												'username'		=>	$i->post('username'),
												//'password'		=>	md5($i->post('password')), //enkripsi md5
												'id_home'			=>	$i->post('id_home'),
												'akses_level'	=> $i->post('akses_level'));
			}else {
				$data = array( 	'id'					=> 	$id,
												'nama'				=> 	$i->post('nama'),
												'email'				=>	$i->post('email'),
												'username'		=>	$i->post('username'),
												'password'		=>	md5($i->post('password')), //enkripsi md5
												'id_home'			=>	$i->post('id_home'),
												'akses_level'	=>  $i->post('akses_level'));
			}
			$this->user_model->edit($data);
			$this->session->set_flashdata('success','User/Administrator updated successfully');
			redirect(base_url('admin/user'));
		}
		// End masuk database
	}

	// Delete User
	public function delete($id) {
		$this->simple_login->cek_login();
		$data = array('id'=> $id);
		$this->user_model->delete($data);
		$this->session->set_flashdata('success','User/Administrator Deleted successfully');
		redirect (base_url('admin/user'));
	}
}
