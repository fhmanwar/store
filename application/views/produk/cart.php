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
                  <span><a href="<?php echo base_url('produk') ?>">Product</a></span>
                  <span><?php echo $judul ?></span>
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
    <div class="row row-pb-md">
      <div class="col-md-10 col-md-offset-1">
        <div class="process-wrap">
          <div class="process text-center active">
            <p><span>01</span></p>
            <h3>Shopping Cart</h3>
          </div>
          <div class="process text-center">
            <p><span>02</span></p>
            <h3>Checkout</h3>
          </div>
          <div class="process text-center">
            <p><span>03</span></p>
            <h3>Order Complete</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-pb-md">
      <div class="col-md-10 col-md-offset-1">
        <div class="product-name">
          <div class="one-forth text-center">
            <span>Product Details</span>
          </div>
          <div class="one-eight text-center">
            <span>Price</span>
          </div>
          <div class="one-eight text-center">
            <span>Quantity</span>
          </div>
          <div class="one-eight text-center">
            <span>Total</span>
          </div>
          <div class="one-eight text-center">
            <span>Remove</span>
          </div>
        </div>
        <form action="<?php echo base_url('produk/update')?>" method="post" enctype="multipart/form-data">
        <?php
          $total = 0;
          $discount = 200000;
          $shipping = 12000;
          if($this->cart->total_items()>0){
            foreach($cart as $item){
              $total += $item['subtotal'];
        ?>
        <div class="product-cart">
          <div class="one-forth">
            <div class="product-img" style="background-image: url(<?php echo base_url('assets/images/produk/'.$item['gambar'])?>);">
            </div>
            <div class="display-tc">
              <h3><?php echo $item['name']; ?></h3>
            </div>
          </div>
          <div class="one-eight text-center">
            <div class="display-tc">
              <span class="price">Rp. <?php echo number_format($item['price'],'0',',','.'); ?></span>
            </div>
          </div>
          <div class="one-eight text-center">
            <div class="display-tc">
              <input type="hidden" name="cart[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][name]" value="<?php echo $item['name'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][price]" value="<?php echo $item['price'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][gambar]" value="<?php echo $item['gambar'];?>" />
              <input type="text" id="quantity" name="cart[<?php echo $item['id'];?>][qty]" value="<?php echo $item['qty'];?>" class="form-control input-number text-center" min="1" max="100">
            </div>
          </div>
          <div class="one-eight text-center">
            <div class="display-tc">
              <span class="price">Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></span>
            </div>
          </div>
          <div class="one-eight text-center">
            <div class="display-tc">
              <a href="<?php echo base_url('produk/delete/'.$item['rowid']);?>" class="closed" ></a>
            </div>
          </div>
        </div>
        <?php
      }}
          else{
            echo ' <div class="col-md-12 text-center">
                    <div class="display-tc">
                      <h3>Keranjang Belanja Kosong.</h3>
                    </div>
                  </div>';
          }
        ?>
        <div class="col-md-2 ">
          <div class="display-tc">
            <button href="<?php echo base_url('produk/delete/all') ?>"  class="btn btn-primary"><i class="icon-trash"></i>  all</button>
          </div>
        </div>
      </div>
    </div>
    </form>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="total-wrap">
          <div class="row">

            <div class="col-md-8">
              <form action="#">
                <div class="row form-group">
                  <div class="col-md-9">
                    <input type="text" name="quantity" class="form-control input-number" placeholder="Your Coupon Number...">
                  </div>
                  <div class="col-md-3">
                    <input type="submit" value="Apply Coupon" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>

            <div class="col-md-3 col-md-push-1 text-center">
              <div class="total">
                <div class="sub">
                  <p><span>Subtotal:</span> <span>Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?></span></p>
                  <p><span>Shipping:</span> <span>Rp. <?php echo number_format($shipping,0,',','.'); ?></span></p>
                  <p><span>Discount:</span> <span>Rp. <?php echo number_format($discount,0,',','.'); ?></span></p>
                </div>
                <div class="grand-total">
                  <p><span><strong>Total:</strong></span> <span>Rp. <?php echo number_format($total=($total+$shipping)-$discount,0,',','.'); ?></span></p>
                </div>
              </div>
            </div>

          </div>
        </div>
        <hr>
        <div class="col-md-6 text-left">
          <div class="display-tc">
            <a href="<?php echo base_url('produk') ?>"  class="btn btn-primary"><i class="icon-chevron-left"> Continue Shopping</i></a>
          </div>
        </div>
        <div class="col-md-6  text-right">
          <div class="display-tc">
            <a href="<?php echo base_url('produk/checkout') ?>"  class="btn btn-primary">Checkout <i class="icon-credit-card"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="colorlib-shop">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
        <h2><span>Recommended Products</span></h2>
        <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">

      <div class="col-md-3 text-center">
        <div class="product-entry">
          <div class="product-img" style="background-image: url(images/item-5.jpg);">
            <p class="tag"><span class="new">New</span></p>
            <div class="cart">
              <p>
                <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                <span><a href="product-detail.html"><i class="icon-eye"></i></a></span>
                <span><a href="#"><i class="icon-heart3"></i></a></span>
                <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
              </p>
            </div>
          </div>
          <div class="desc">
            <h3><a href="shop.html">Floral Dress</a></h3>
            <p class="price"><span>$300.00</span></p>
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
