<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		// $this->load->model('contact_model');
		// $this->load->model('kategori_contact_model');
	}

  //main page contact
  public function index(){
		$site = $this->home_model->listing();
		// $contact = $this->contact_model->home();

    $data = array('title'  => 'Contact Us | '.$site['namaweb'],
									'keywords'  => $site['namaweb'].' | '.$site['keywords'],
									'deskripsi'  => $site['deskripsi'],
									'author'  => $site['namaweb'],
									'footer'  => $site['namaweb'].' ~ '.$site['tagline'],
									'email'  => $site['email'],
									'alamat'  => $site['alamat'],
									'tlp'  => $site['tlp'],
									// 'contact'  => $contact,
									'judul'  => 'Contact Us',
                  'isi'    => 'contact/list'
								);

    $this->load->view('layout/file',$data);
  }

}
