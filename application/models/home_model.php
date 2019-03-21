<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('home');
		$this->db->order_by('id_home','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	// Detail
	public function detail($id_home) {
		$this->db->select('*');
		$this->db->from('home');
		$this->db->where('id_home',$id_home);
		$this->db->order_by('id_home','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('home',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_home',$data['id_home']);
		$this->db->update('home',$data);
	}

	// Check delete
	public function check($id_home) {
		$query = $this->db->get_where('produk',array('id_home' => $id_home));
		return $query->num_rows();
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_home',$data['id_home']);
		$this->db->delete('home',$data);
	}
}
