<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class berita extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->load->model('home_model');
		$this->load->model('berita_model');
		$this->load->model('kategori_berita_model');
		$this->load->helper('text');
	}

  //main page berita
  public function index(){
		$site = $this->home_model->listing();
		$berita = $this->berita_model->listing();

    $data = array('title'  => 'News | '.$site['namaweb'],
									'berita'  => $berita,
									'judul'  => 'Our News',
                  'isi'    => 'berita/list'
								);

    $this->load->view('layout/file',$data);
  }

	//Detail page berita
	public function read($slug_berita){
		$site = $this->home_model->listing();
		$berita = $this->berita_model->read($slug_berita);

    $data = array('title'  => $berita->judul.' | '.$site['namaweb'],
									'berita' => $berita,
									'judul'  => 'Detail News',
                  'isi'    => 'berita/read'
								);

    $this->load->view('layout/file',$data);
  }

}
