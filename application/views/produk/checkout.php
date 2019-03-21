<?php
// // Session
// if($this->session->flashdata('success')) {
// 	echo '<div class="alert alert-success">';
// 	echo $this->session->flashdata('success');
// 	echo '</div>';
// }

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning">','</div>');
?>
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
                  <span><a href="<?php echo base_url('produk/cart') ?>">Shopping Cart</a></span>
                  <span>Checkout</span>
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
          <div class="process text-center active">
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
    <?php
      $discount = 200000;
      $shipping = 12000;
      $total = 0;
      if($cart){
        foreach($cart as $item){
          $total += $item['subtotal'];
        }
        $total = ($total+$shipping)-$discount;
    ?>
    <div class="row">
      <div class="col-md-7">
        <?php
        echo form_open('produk/proses','class="colorlib-form"')
        ?>
          <h2>Billing Details</h2>
          <div class="row">
             <div class="form-group">
              <div class="col-md-6">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname" required="">
              </div>
              <div class="col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <label for="email">E-mail Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="E - mail" required="">
              </div>
              <div class="col-md-6">
                <label for="Phone">Phone Number</label>
                <input type="number" id="zippostalcode" name="telp" class="form-control" placeholder="" required="">
              </div>
            </div>
             <div class="col-md-12">
                <div class="form-group">
                  <label for="country">Select Country</label>
                   <div class="form-field">
                    <i class="icon icon-arrow-down3"></i>
                      <select name="people" id="people" class="form-control">
                        <option value="#">Select country</option>
                        <option value="#">Alaska</option>
                        <option value="#">China</option>
                        <option value="#">Japan</option>
                        <option value="#">Korea</option>
                        <option value="#">Philippines</option>
                      </select>
                   </div>
                </div>
             </div>
             <div class="col-md-12">
              <div class="form-group">
                <label for="fname">Address</label>
                <textarea type="text" id="address" name="alamat" class="form-control" placeholder="Enter Your Address" required=""></textarea>
              </div>
             </div>
             <div class="col-md-12">
              <div class="form-group">
                <label for="companyname">Town/City</label>
                  <input type="text" id="towncity" name="city" class="form-control" placeholder="Town or City" required="">
              </div>
             </div>
             <div class="form-group">
              <div class="col-md-6">
                <label for="stateprovince">State/Province</label>
                <input type="text" id="fname" class="form-control" placeholder="State Province" required="">
              </div>
              <div class="col-md-6">
                <label for="lname">Zip/Postal Code</label>
                <input type="number" id="zippostalcode" class="form-control" placeholder="Zip / Postal" required="">
              </div>
            </div>
          </div>
      </div>

      <div class="col-md-5">
        <div class="cart-detail">
          <h2>Cart Total</h2>
          <ul>
            <ul>
              <?php
                  foreach($cart as $item){
              ?>
              <li>
                <span><?php echo $item['qty'];?> x <?php echo $item['name'];?></span>
                <span>Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></span>
              </li>
              <?php } ?>
            </ul>
            <li><span>Subtotal</span> <span>Rp <?php echo number_format($this->cart->total(),0,',','.'); ?></span></li>
            <li><span>Shipping</span> <span>Rp <?php echo number_format($shipping,0,',','.'); ?></span></li>
            <li><span>Discount</span> <span>Rp <?php echo number_format($discount,0,',','.'); ?></span></li>
            <li><span>Order Total</span> <span>Rp <?php echo number_format($total,0,',','.'); ?></span></li>
          </ul>
        </div>
        <div class="cart-detail">
          <h2>Payment Method</h2>
          <div class="form-group">
            <div class="col-md-12">
              <div class="radio">
                 <label><input type="radio" name="optradio">Direct Bank Tranfer</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <div class="radio">
                 <label><input type="radio" name="optradio">Check Payment</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <div class="radio">
                 <label><input type="radio" name="optradio">Paypal</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <div class="checkbox">
                 <label><input type="checkbox" value="">I have read and accept the terms and conditions</label>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p><input type="submit" class="btn btn-primary" value="Place an order"/></p>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
</div>

<?php
}
  else{
    echo ' <div class="col-md-12 text-center">
            <div class="display-tc">
              <h3>Keranjang Belanja Kosong.</h3>
            </div>
          </div>';
  }
?>

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
<?php echo form_close() ?>
