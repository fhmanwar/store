<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk_model extends CI_Model {

	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing() {
		$this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, users.nama');
		$this->db->from('tbl_produk');
		// Join
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori', 'LEFT');
		$this->db->join('users','users.id = tbl_produk.id_user','LEFT');
		// End join
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Home
	public function home() {
		$this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, users.nama');
		$this->db->from('tbl_produk');
		// Join
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori', 'LEFT');
		$this->db->join('users','users.id = tbl_produk.id_user','LEFT');
		// End join
		$this->db->where('tbl_produk.status_produk','Publish');
		$this->db->order_by('id_produk','ASC');
		//dibatasi jumlah yang tampil
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result();
	}

  //new
	public function new() {
		$this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, users.nama');
		$this->db->from('tbl_produk');
		// Join
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori', 'LEFT');
		$this->db->join('users','users.id = tbl_produk.id_user','LEFT');
		// End join
		$this->db->where('tbl_produk.status_produk','Publish');
		$this->db->order_by('id_produk','ASC');
		//dibatasi jumlah yang tampil
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result();
	}

	//Kategori
	public function kategori($id_kategori) {
		$this->db->select('tbl_produk.*, tbl_kategori.nama_kategori, users.nama');
		$this->db->from('tbl_produk');
		// Join
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori', 'LEFT');
		$this->db->join('users','users.id = tbl_produk.id_user','LEFT');
		// End join
		if($id_kategori>0){
		$this->db->where(array( 'tbl_produk.id_kategori'   => $id_kategori,
													 	'tbl_produk.status_produk' => 'Publish'
                           ));
		}
		$this->db->order_by('id_produk','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Read
	public function read($slug_produk) {
		$query = $this->db->get_where('tbl_produk',
														array('slug_produk'  => $slug_produk,
																	'tbl_produk.status_produk' => 'Publish'
																));
		return $query->row();
	}

	// detail perproduk
	public function detail($id_produk){
		$query = $this->db->get_where('tbl_produk',array('id_produk'  => $id_produk));
		return $query->row();
	}

	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_produk',$data);
	}

	// Edit
	public function edit ($data) {
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->update('tbl_produk',$data);
	}

	// Delete
	public function delete ($data){
		$this->db->where('id_produk',$data['id_produk']);
		$this->db->delete('tbl_produk',$data);
	}

	//Akhir
	public function akhir(){
		$query = $this->db->query('select * FROM tbl_produk ORDER BY id_produk DESC');
		return $query->row();
	}

	public function pelanggan($data){
		$this->db->insert('tbl_pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function order($data){
		$this->db->insert('tbl_order', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function detail_order($data){
		$this->db->insert('tbl_detail_order', $data);
	}

}
