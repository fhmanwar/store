<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_produk_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Read
	public function read($slug_kategori) {
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('slug_kategori',$slug_kategori);
		$this->db->order_by('id_kategori','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// detail perkategori_berita
	public function detail($id_kategori){
		$query = $this->db->get_where('tbl_kategori',array('id_kategori'  => $id_kategori));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_kategori',$data);
	}

	// Edit
	public function edit ($data) {
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->update('tbl_kategori',$data);
	}

	// Delete
	public function delete ($data){
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->delete('tbl_kategori',$data);
	}
}
