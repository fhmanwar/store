<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('produk_model');
		$this->load->model('berita_model');
		$this->load->model('galeri_model');
		$this->load->helper('text');
	}

  //index
  public function index(){
		$site = $this->home_model->listing();
		$produk	= $this->produk_model->home();
		$new	= $this->produk_model->new();
		$berita = $this->berita_model->home();
		$slide = $this->galeri_model->slide();

    $data = array('title'  			=> $site['namaweb'].' | '.$site['tagline'],
									'produk'			=> $produk,
									'new'					=> $new,
									'berita'  		=> $berita,
									'slide'  			=> $slide,
                  'isi'    			=> 'home/list');

    $this->load->view('layout/file',$data);
  }

	//main page contact
  public function contact(){

		$site = $this->home_model->listing();

    $data = array('title'  => 'Contact Us | '.$site['namaweb'],
									'judul'  => 'Contact Us',
                  'isi'    => 'home/contact'
								);

    $this->load->view('layout/file',$data);
  }

	//main page about
  public function about(){
		$site = $this->home_model->listing();

    $data = array('title'  => 'About Us | '.$site['namaweb'],
									'judul'  => 'About Us',
                  'isi'    => 'home/about'
								);

    $this->load->view('layout/file',$data);
  }

	//login
  public function login(){
		$site = $this->home_model->listing();

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
    $data = array('title'  => 'Login | '.$site['namaweb'],
									'judul'  => 'Login',
                  'isi'    => 'home/login'
								);

    $this->load->view('layout/file',$data);
  }

	//register
  public function register(){
		$site = $this->home_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('fname','First Name','required', array( 'required' => '%s harus diisi'));
		$valid->set_rules('lname','Last Name','required', array( 'required' => '%s harus diisi'));

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



		if($valid->run() === FALSE) {
			$data = array('title'  => 'Register | '.$site['namaweb'],
										'judul'  => 'Register',
	                  'isi'    => 'home/register'
									);

	    $this->load->view('layout/file',$data);
		}else {
			$i = $this->input;
			$data = array( 	'nama'				=> 	$i->post('nama'),
											'email'				=>	$i->post('email'),
											'username'		=>	$i->post('username'),
											'password'		=>	md5($i->post('password')), //enkripsi md5
											'id_home'			=>  $i->post('id_home'),
											'akses_level'	=>  $i->post('akses_level'));
			$this->user_model->tambah($data);
			$this->session->set_flashdata('success','Created successfully');
			redirect(base_url('home/login'));
		}
		// End validasi
    $data = array('title'  => 'Register | '.$site['namaweb'],
									'judul'  => 'Register',
                  'isi'    => 'home/register'
								);

    $this->load->view('layout/file',$data);

  }

	//logout
  public function logout(){
		$this->simple_login->logout();
  }

}
