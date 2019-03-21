<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		$this->db->select('berita.*, kategori_berita.nama_kategori, users.nama');
		$this->db->from('berita');
		// Relasi dengan table kategori_berita dan Users
		$this->db->join('kategori_berita','kategori_berita.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('users','users.id = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Home
	public function home() {
		$this->db->select('berita.*, kategori_berita.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join
		$this->db->join('kategori_berita','kategori_berita.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('users','users.id = berita.id_user','LEFT');
		// End join
		$this->db->where(array( 'berita.status_berita' => 'Publish',
														'berita.jenis_berita'	 => 'Berita'));
		$this->db->order_by('id_berita','DESC');
		//dibatasi jumlah berita yang tampil
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	//Kategori
	public function kategori($id_kategori) {
		$this->db->select('berita.*, kategori_berita.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join
		$this->db->join('kategori_berita','kategori_berita.id_kategori = berita.id_kategori', 'LEFT');
		$this->db->join('users','users.id = berita.id_user','LEFT');
		// End join
		$this->db->where('berita.id_kategori',$id_kategori);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Read
	public function read($slug_berita) {
		$query = $this->db->get_where('berita',
												array('slug_berita'  => $slug_berita,
															'berita.status_berita' => 'Publish'
												));
		return $query->row();
	}

	// detail perberita
	public function detail($id_berita){
		$query = $this->db->get_where('berita',array('id_berita'  => $id_berita));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('berita',$data);
	}

	// Edit
	public function edit ($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	// Delete
	public function delete ($data){
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}

	//Akhir
	public function akhir(){
		$query = $this->db->query('select * FROM berita ORDER BY id_berita DESC');
		return $query->row();
	}
}
