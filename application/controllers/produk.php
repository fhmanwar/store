<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->load->model('home_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_produk_model');
		// $this->load->library('cart');
	}

	// Index
	public function index() {
		$site	= $this->home_model->listing();
		$kategori = ($this->uri->segment(3))?$this->uri->segment(3):0;
		$produk	= $this->produk_model->kategori($kategori);
		$cart = $this->cart->contents();

		$data	= array( 'title'	      => 'Product | '.$site['namaweb'],
									 'cart'	  			=> $cart,
						 		 	 'produk'	  		=> $produk,
									 'kategori'			=> $this->kategori_produk_model->listing(),
									 'judul'				=> 'Product',
						 		 	 'isi'	      	=> 'produk/list');
		$this->load->view('layout/file',$data);
	}

	// Read
	public function read($slug_produk) {
		$site	= $this->home_model->listing();
		$produk	= $this->produk_model->read($slug_produk);
		$cart = $this->cart->contents();
		$new	= $this->produk_model->new();

		$data	= array( 'title'			=> $produk->nama_produk.' | '.$site['namaweb'],
									 'produk'			=> $produk,
									 'cart'				=> $cart,
									 'new'				=> $new,
									 'judul'			=> 'Product Detail',
									 'isi'				=> 'produk/read');
		$this->load->view('layout/file',$data);
	}

	public function cart(){
		//display
		// var_dump($this->cart->contents());
		// print_r($this->cart->contents());
		// $this->load->view('produk/cart');
    $cart = $this->cart->contents();
		$site	= $this->home_model->listing();

		$data	= array( 'title'	      => 'Shopping Cart | '.$site['namaweb'],
						 		 	 'cart'	  			=> $cart,
									 'judul'				=> 'Shopping Cart',
						 		 	 'isi'	      	=> 'produk/cart');
    $this->load->view('layout/file',$data);
  }

	public function checkout(){
		$site	= $this->home_model->listing();
		$cart = $this->cart->contents();

		$data	= array( 'title'	      => 'Checkout | '.$site['namaweb'],
									 'cart'	  			=> $cart,
									 'judul'				=> 'Checkout',
									 'isi'	      	=> 'produk/checkout');
		$this->load->view('layout/file',$data);
	}

	public function add($id){
		$produk = $this->produk_model->detail($id);
    $data = array( 	'id' 					=> $id,
						        'name' 				=> $produk->nama_produk,
						        'price' 			=> $produk->harga,
										'qty' 				=> 1,
						        'gambar' 			=> $produk->gambar
      					);
  	$this->cart->insert($data);
    redirect(base_url('produk'));
  }

	function update()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect(base_url('produk/cart'));
	}

	//delete all Item
	public function delete($rowid){
		if ($rowid =="all"){
      $this->cart->destroy();
    }else{
      // $data = array('rowid' => $rowid,
      //           		'qty' 	=> 0);
			// $this->cart->update($data);
      $this->cart->remove($rowid);
    }
    redirect(base_url('produk/cart'));
  }

	public function proses(){
		$site	= $this->home_model->listing();
		$cart = $this->cart->contents();

		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array('fname' => $this->input->post('fname'),
														'lname' => $this->input->post('lname'),
														'email' => $this->input->post('email'),
														'alamat' => $this->input->post('alamat'),
														'city' => $this->input->post('city'),
														'telp' => $this->input->post('telp'));
		$id_pelanggan = $this->produk_model->pelanggan($data_pelanggan);

		//-------------------------Input data order------------------------------
		$data_order = array('tanggal' => date('Y-m-d'),
					   						'pelanggan' => $id_pelanggan);
		$id_order = $this->produk_model->order($data_order);

		//-------------------------Input data detail order-----------------------
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array(	'order_id' =>$id_order,
																	'produk' => $item['id'],
																	'qty' => $item['qty'],
																	'harga' => $item['price']);
						$proses = $this->produk_model->detail_order($data_detail);
					}
			}
		//-------------------------Hapus shopping cart--------------------------
		$this->cart->destroy();

		$data	= array( 'title'	      => 'Order Complete | '.$site['namaweb'],
									 'cart'	  			=> $cart,
									 'judul'				=> 'Order Complete',
									 'isi'	      	=> 'produk/afterOrder');
		$this->load->view('layout/file',$data);
	}

}
