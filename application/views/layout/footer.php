<?php
  $this->load->model('home_model');
  $site = $this->home_model->listing();
?>
<footer id="colorlib-footer" role="contentinfo">
  <div class="container">
    <div class="row row-pb-md">
      <div class="col-md-4 colorlib-widget">
        <h4>About Store</h4>
        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
        <p>
          <ul class="colorlib-social-icons">
            <li><a href="#"><i class="icon-twitter"></i></a></li>
            <li><a href="#"><i class="icon-facebook"></i></a></li>
            <li><a href="#"><i class="icon-linkedin"></i></a></li>
            <li><a href="#"><i class="icon-dribbble"></i></a></li>
          </ul>
        </p>
      </div>
      <div class="col-md-1 colorlib-widget"></div>
      <div class="col-md-2 colorlib-widget">
        <h4>Customer Care</h4>
        <p>
          <ul class="colorlib-footer-links">
            <li><a href="<?php echo base_url('home/contact') ?>">Contact</a></li>
            <li><a href="#">Returns/Exchange</a></li>
            <li><a href="#">Gift Voucher</a></li>
            <li><a href="<?php echo base_url('produk/wishlist') ?>">Wishlist</a></li>
            <li><a href="#">Special</a></li>
            <li><a href="#">Customer Services</a></li>
            <li><a href="#">Site maps</a></li>
          </ul>
        </p>
      </div>
      <div class="col-md-2 colorlib-widget">
        <h4>Information</h4>
        <p>
          <ul class="colorlib-footer-links">
            <li><a href="<?php echo base_url('home/about') ?>">About us</a></li>
            <li><a href="#">Delivery Information</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Order Tracking</a></li>
          </ul>
        </p>
      </div>
<!--
      <div class="col-md-2">
        <h4>News</h4>
        <ul class="colorlib-footer-links">
          <li><a href="<?php echo base_url('berita/read') ?>">Blog</a></li>blog.html
          <li><a href="#">Press</a></li>
          <li><a href="#">Exhibitions</a></li>
        </ul>
      </div> -->

      <div class="col-md-3">
        <h4>Contact Information</h4>
        <ul class="colorlib-footer-links">
          <li><?php echo $site['alamat'] ?>, <br> Suite 721 New York NY 10016</li>
          <li><a href="tel:<?php echo $site['tlp'] ?>"><?php echo $site['tlp'] ?></a></li>
          <li><a href="mailto:<?php echo $site['email'] ?>"><?php echo $site['email'] ?></a></li>
          <li><a href="#">yoursite.com</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="copy">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          <span class="block">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            &copy;
            <script>document.write(new Date().getFullYear());</script> <!-- echo date('Y') -->
            <?php echo $site['namaweb'].' ~ '.$site['tagline'] ?> &middot;
            <!-- <a href="<?php //echo $judul ?>" target="_blank"><?php //echo $judul ?></a> -->
          </span>
        </p>
      </div>
    </div>
  </div>
</footer>
</div>

<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/front/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?php echo base_url()?>assets/front/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>assets/front/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?php echo base_url()?>assets/front/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="<?php echo base_url()?>assets/front/js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="<?php echo base_url()?>assets/front/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url()?>assets/front/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url()?>assets/front/js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="<?php echo base_url()?>assets/front/js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="<?php echo base_url()?>assets/front/js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="<?php echo base_url()?>assets/front/js/main.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="<?php echo base_url()?>assets/front/js/google_map.js"></script>
<!-- quantity -->
<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){

		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
	</script>

</body>
</html>
