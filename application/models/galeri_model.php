<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		$this->db->select('galeri.*, users.nama');
		$this->db->from('galeri');
		// Relasi dengan table kategori_galeri dan Users
		$this->db->join('users','users.id = galeri.id_user','LEFT');
		// End join
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//slide
	public function slide() {
		$this->db->select('galeri.*, users.nama');
		$this->db->from('galeri');
		// Join
		$this->db->join('users','users.id = galeri.id_user','LEFT');
		// End join
		$this->db->where('galeri.posisi_galeri','Slide');
		$this->db->order_by('id_galeri','DESC');
		//dibatasi jumlah galeri yang tampil
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// detail pergaleri
	public function detail($id_galeri){
		$query = $this->db->get_where('galeri',array('id_galeri'  => $id_galeri));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('galeri',$data);
	}

	// Edit
	public function edit ($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
	}

	// Delete
	public function delete ($data){
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->delete('galeri',$data);
	}
}
