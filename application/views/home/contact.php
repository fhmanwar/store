<?php
  $this->load->model('home_model');
  $site = $this->home_model->listing();
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
                  <span><a href="<?php echo base_url('contact') ?>">Contact</a></span>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </li>
      </ul>
    </div>
</aside>

<div id="colorlib-contact">
  <div class="container">
    <div class="col-md-12">
      <h1 class="text-center"><b>Contact Information</b></h1></br></br></br>
      <div class="row contact-info-wrap">
        <div class="col-lg-3">
          <p><span><i class="icon-location"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
        </div>
        <div class="col-lg-3">
          <p><span><i class="icon-phone3"></i></span> <a href="tel://<?php echo $site['tlp'] ?>"><?php echo $site['tlp'] ?></a></p>
        </div>
        <div class="col-lg-3">
          <p><span><i class="icon-paperplane"></i></span> <a href="mailto:<?php echo $site['email'] ?>"><?php echo $site['email'] ?></a></p>
        </div>
        <div class="col-lg-3">
          <p><span><i class="icon-globe"></i></span> <a href="#">yoursite.com</a></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <p><b>Coffee Kibo</b> adalah company-based comunity pecinta kopi yang sudah lama berlalu lintang di dunia coffee Indonesia.
  			Berbekal tekat untuk memberikan kemudahan akses bagi pecinta Coffee di Indonesia yang mencari Coffee premium yang di inginkan.
  			Terbentuklah toko Coffee Kibo.</p>
  		<p>Tanyakanlah hal yang anda ingin tanyakan seputar produk atau layanan, dan profesional kami siap menjawab.</p>
    </div>

    <div class="col-lg-6">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-wrap">
            <h3>Get In Touch</h3>
            <form action="#">
              <div class="row form-group">
                <div class="col-md-6 padding-bottom">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control" placeholder="Your firstname">
                </div>
                <div class="col-md-6">
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control" placeholder="Your lastname">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label for="email">Email</label>
                  <input type="text" id="email" class="form-control" placeholder="Your email address">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label for="subject">Subject</label>
                  <input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label for="message">Message</label>
                  <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                </div>
              </div>
              <div class="form-group text-center">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="map" class="colorlib-map"></div>
</div>
