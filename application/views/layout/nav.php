<div class="colorlib-loader"></div>
<?php
	$cart = $this->cart->contents()
 ?>

<div id="page">
  <nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-xs-2">
            <div id="colorlib-logo"><a href="<?php echo base_url() ?>">Store</a></div>
          </div>
          <div class="col-xs-10 text-right menu-1">
            <ul>
              <li class="<?=($this->uri->segment(1)=='')?'active':'';?>"><a href="<?php echo base_url() ?>">Home</a></li>
							<?php
								if(isset($_SESSION['username']) == ''){
										?>
										<li class="<?=($this->uri->segment(1)=='produk')?'active':'';?>"><a href="<?php echo base_url('produk') ?>">Shop</a></li>
										<li class="<?=($this->uri->segment(1)=='about')?'active':'';?>"><a href="<?php echo base_url('home/login') ?>"><i class="icon-user4"></i> Login Or Register</a></li>
										<?php
								}

								if(isset($_SESSION['username'])){
										if(!$_SESSION['username'] == ''){
												?>
												<li class="<?=($this->uri->segment(1)=='produk')?'active':'';?>"><a href="<?php echo base_url('produk') ?>">Shop</a></li>
					              <li class="<?=($this->uri->segment(1)=='berita')?'active':'';?>" ><a href="<?php echo base_url('berita') ?>">News</a></li>
					              <li class="<?=($this->uri->segment(2)=='about')?'active':'';?>"><a href="<?php echo base_url('home/about') ?>">About</a></li>
					              <li class="<?=($this->uri->segment(2)=='contact')?'active':'';?>"><a href="<?php echo base_url('home/contact') ?>">Contact</a></li>
												<li class="<?=($this->uri->segment(2)=='cart')?'active':'';?>">
													<?php
														// $text_cart_url =  '<i class="icon-shopping-cart"></i>'
														// $text_cart_url .= '['. $this->cart->total_items() .']';
													?>
													<!-- <? //anchor('produk/cart',$text_cart_url) ?> -->
													<a href="<?php echo base_url('produk/cart') ?>">
														<i class="icon-shopping-cart"></i> [<?= $this->cart->total_items() ?>]
													</a>
												</li>
												<li> | </li>
												<li class="has-dropdown"> <!--  <?=($this->uri->segment(1)=='produk')?'active':'';?> -->
													<a href="#"><i class="icon-user4"></i> <?php echo $_SESSION['username'] ?></a></a>
													<ul class="dropdown">
					                  <li class="<?=($this->uri->segment(2)=='cart')?'active':'';?>"><a href="<?php echo base_url('produk/cart') ?>">Purchase</a></li>
					                  <li class="<?=($this->uri->segment(2)=='checkout')?'active':'';?>"><a href="<?php echo base_url('produk/checkout') ?>">Checkout</a></li>
					                  <li class="<?=($this->uri->segment(2)=='afterOder')?'active':'';?>"><a href="<?php echo base_url('produk/afterOder') ?>">Order Complete</a></li>
														<li class="<?=($this->uri->segment(2)=='wishlist')?'active':'';?>"><a href="<?php echo base_url('produk/wishlist') ?>">Wishlist</a></li> <!-- add-to-wishlist.html -->
														<li class="<?=($this->uri->segment(2)=='logout')?'active':'';?>"><a href="<?php echo base_url('home/logout') ?>">Log Out</a></li>
													</ul>
				              	</li>
												<?php
										}
								}
							?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
