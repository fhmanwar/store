<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('user_model');
	}

	// Index login
	public function index() {
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required', array(	'required'	=> 'Username harus diisi'));
		$valid->set_rules('password','Password','required', array(	'required'	=> 'Password harus diisi'));



		if($valid->run()) {
			$username	= $this->input->post('username');
			$password	= $this->input->post('password');
			//$passmd5 = md5($password);//this change $password into md5 form

			//compare dengan database
			$cek_login = $this->user_model->login($username,$password);
			// jika cocok maka create session
			 if(count($cek_login) == 1){
				 $this->session->set_userdata('id',$cek_login->id);
				 $this->session->set_userdata('username',$cek_login->username);
				 $this->session->set_userdata('nama',$cek_login->nama);
				 $this->session->set_userdata('akses_level',$cek_login->akses_level);
				 $this->session->set_flashdata('sukses','Login Success');
				 	if ($this->session->userdata('akses_level')=='Admin') {
 						redirect(base_url('admin/dasbor'),'refresh');
	 				}
	 				elseif ($this->session->userdata('akses_level')=='User') {
	 					redirect(base_url('home'),'refresh');
	 				}
			 }
			 else {
					$this->session->set_flashdata('sukses','Username or Password is wrong');
	 				redirect(base_url('home/login'),'refresh');
			 }
		}
		// End validasi

		$data = array( 'title' => 'Login Administrator');
		$this->load->view('home/login',$data);
	}

	// Logout
	public function logout() {
		$this->simple_login->logout();
	}
}
