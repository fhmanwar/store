<aside id="colorlib-hero" class="breadcrumbs">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(<?php echo base_url()?>assets/front/images/cover-img-1.jpg);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
							<div class="slider-text-inner text-center">
								<h1><?php echo $judul ?></h1>
								<h2 class="bread">
									<span><a href="<?php echo base_url() ?>">Home</a></span>
									<span>Shop</span>
								</h2>
							</div>
						</div>
					</div>
				</div>
			</li>
			</ul>
		</div>
</aside>
<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-push-2">
				<div class="row row-pb-lg">
					<?php foreach($produk as $prod) { ?>
						<div class="col-md-4 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url(<?php echo base_url('assets/images/produk/'.$prod->gambar)?>);">
									<p class="tag"><span class="sale">Sale</span></p>
									<div class="cart">
										<p>
				              <span class="addtocart">
												<a href="<?php echo base_url('produk/add/'.$prod->id_produk) ?>"><i class="icon-shopping-cart"></i></a>
											</span>
											<span><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><i class="icon-eye"></i></a></span>
											<span><a href="#"><i class="icon-heart3"></i></a></span>
											<span><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><i class="icon-bar-chart"></i></a></span> <!-- add-to-wishlist.html -->
										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><?php echo $prod->nama_produk ?></a></h3>
									<p class="price"><span>Rp. <?php echo number_format($prod->harga,'0',',','.').'/'.$prod->satuan ?></span> <!-- <span class="sale">$300.00</span> --></p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>

				<div class="row">
					<div class="col-md-12">
						<ul class="pagination">
							<li class="disabled"><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-2 col-md-pull-10">
				<div class="sidebar">
					<div class="side">
						<h2>Categories</h2>
						<div class="fancy-collapse-panel">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Coffee
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<ul>
												<li><a href="<?php echo base_url('produk/index')?>">All</a></li>
												<?php	foreach ($kategori as $row) { ?>
											<li><a href="<?php echo base_url('produk/index/'.$row->id_kategori)?>"><?php echo $row->nama_kategori ?></a></li>
											<?php } ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						 </div>
					</div>

					<div class="side">
						<h2>Price Range</h2>
						<form method="post" class="colorlib-form-2">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="guests">Price from:</label>
										<div class="form-field">
											<i class="icon icon-arrow-down3"></i>
											<select name="people" id="people" class="form-control">
												<option value="#">1</option>
												<option value="#">200</option>
												<option value="#">300</option>
												<option value="#">400</option>
												<option value="#">1000</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="guests">Price to:</label>
										<div class="form-field">
											<i class="icon icon-arrow-down3"></i>
											<select name="people" id="people" class="form-control">
												<option value="#">2000</option>
												<option value="#">4000</option>
												<option value="#">6000</option>
												<option value="#">8000</option>
												<option value="#">10000</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="side">
						<h2>Color</h2>
						<div class="color-wrap">
							<p class="color-desc">
								<a href="#" class="color color-1"></a>
								<a href="#" class="color color-2"></a>
								<a href="#" class="color color-3"></a>
								<a href="#" class="color color-4"></a>
								<a href="#" class="color color-5"></a>
							</p>
						</div>
					</div>

					<div class="side">
						<h2>Size</h2>
						<div class="size-wrap">
							<p class="size-desc">
								<a href="#" class="size size-1">xs</a>
								<a href="#" class="size size-2">s</a>
								<a href="#" class="size size-3">m</a>
								<a href="#" class="size size-4">l</a>
								<a href="#" class="size size-5">xl</a>
								<a href="#" class="size size-5">xxl</a>
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div id="colorlib-subscribe">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="col-md-6 text-center">
					<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
				</div>
				<div class="col-md-6">
					<form class="form-inline qbstp-header-subscribe">
						<div class="row">
							<div class="col-md-12 col-md-offset-0">
								<div class="form-group">
									<input type="text" class="form-control" id="email" placeholder="Enter your email">
									<button type="submit" class="btn btn-primary">Subscribe</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
