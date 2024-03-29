<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->order_by('id_kategori','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Read
	public function read($slug_kategori) {
		$this->db->select('*');
		$this->db->from('kategori_berita');
		$this->db->where('slug_kategori',$slug_kategori);
		$this->db->order_by('id_kategori','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// detail perkategori_berita
	public function detail($id_kategori){
		$query = $this->db->get_where('kategori_berita',array('id_kategori'  => $id_kategori));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('kategori_berita',$data);
	}

	// Edit
	public function edit ($data) {
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->update('kategori_berita',$data);
	}

	// Delete
	public function delete ($data){
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->delete('kategori_berita',$data);
	}
}
