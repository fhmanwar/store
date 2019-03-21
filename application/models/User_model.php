<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		// $this->db->select('users.*, home.namaweb');
		// $this->db->from('users');
		// //relasi dengan table home
		// $this->db->join('home','home.id_home = users.id_home','LEFT');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// detail
	public function detail($id){
		$query = $this->db->get_where('users',array('id'  => $id));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('users',$data);
	}

	// Edit
	public function edit ($data) {
		$this->db->where('id',$data['id']);
		$this->db->update('users',$data);
	}

	// Delete
	public function delete ($data){
		$this->db->where('id',$data['id']);
		$this->db->delete('users',$data);
	}

	// login
	public function login($username,$password){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username'		=> $username,
													 'password'  	=> md5($password)

										));
		$this->db->order_by('id','ASC');
		$query = $this->db->get();
		return $query->row();
	}

}
