<aside id="colorlib-hero">
  <div class="flexslider">
    <ul class="slides">
      <?php $i=1; foreach($slide as $slide) { ?>
      <li style="background-image: url(<?php echo base_url('assets/images/galeri/'.$slide->gambar)?>);" class="<?php if($i==1){ echo 'active'; } ?>">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
              <div class="slider-text-inner">
                <div class="desc">
                  <h1 class="head-1">Coffee</h1>
                  <h2 class="head-2"><?php echo $slide->judul_galeri ?></h2>
                  <h2 class="head-3">Collection</h2>
                  <p class="category"><span><?php echo strip_tags($slide->isi_galeri) ?></span></p>
                  <p><a href="<?php echo $slide->website ?>" class="btn btn-primary">Shop Collection</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <?php $i++; } ?>
      </ul>
    </div>
</aside>
<div id="colorlib-featured-product">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <a href="shop.html" class="f-product-1" style="background-image: url(<?php echo base_url()?>assets/front/images/item-1.jpg);">
          <div class="desc">
            <h2>Fahion <br>for <br>men</h2>
          </div>
        </a>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <a href="" class="f-product-2" style="background-image: url(<?php echo base_url()?>assets/front/images/item-2.jpg);">
              <div class="desc">
                <h2>New <br>Arrival <br>Dress</h2>
              </div>
            </a>
          </div>
          <div class="col-md-6">
            <a href="" class="f-product-2" style="background-image: url(<?php echo base_url()?>assets/front/images/item-4.jpg);">
              <div class="desc">
                <h2>Sale <br>20% <br>off</h2>
              </div>
            </a>
          </div>
          <div class="col-md-12">
            <a href="" class="f-product-2" style="background-image: url(<?php echo base_url()?>assets/front/images/item-3.jpg);">
              <div class="desc">
                <h2>Shoes <br>for <br>men</h2>
              </div>
            </a>
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
        <h2><span>New Arrival</span></h2>
        <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">
      <?php foreach($produk as $prod) { ?>
        <div class="col-md-3 text-center">
          <div class="product-entry">
            <div class="product-img" style="background-image: url(<?php echo base_url('assets/images/produk/'.$prod->gambar)?>);">
              <p class="tag"><span class="new">New</span></p>
              <div class="cart">
                <p>
                  <span class="addtocart"><a href="<?php echo base_url('produk/add/'.$prod->id_produk) ?>"><i class="icon-shopping-cart"></i></a></span>
                  <span><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><i class="icon-eye"></i></a></span>
                  <span><a href="#"><i class="icon-heart3"></i></a></span>
                  <span><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><i class="icon-bar-chart"></i></a></span> <!-- add-to-wishlist.html -->
                </p>
              </div>
            </div>
            <div class="desc">
              <h3><a href="shop.html"><?php echo $prod->nama_produk ?></a></h3>
              <p class="price"><span>Rp. <?php echo number_format($prod->harga,'0',',','.').'/'.$prod->satuan ?></span></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(<?php echo base_url('assets/images/produk/'.$prod->gambar)?>);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="intro-desc">
          <div class="text-salebox">
            <div class="text-lefts">
              <div class="sale-box">
                <div class="sale-box-top">
                  <h2 class="number">45</h2>
                  <span class="sup-1">%</span>
                  <span class="sup-2">Off</span>
                </div>
                <h2 class="text-sale">Sale</h2>
              </div>
            </div>
            <div class="text-rights">
              <h3 class="title">Just hurry up limited offer!</h3>
              <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
              <p><a href="shop.html" class="btn btn-primary">Shop Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
            </div>
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
        <h2><span>Our Products</span></h2>
        <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>

    <div class="row">
      <?php foreach($new as $prod) { ?>
        <div class="col-md-3 text-center">
          <div class="product-entry">
            <div class="product-img" style="background-image: url(<?php echo base_url('assets/images/produk/'.$prod->gambar)?>);">
              <p class="tag"><span class="sale">Sale</span></p>
              <div class="cart">
                <p>
                  <span class="addtocart"><a href="<?php echo base_url('produk/add/'.$prod->id_produk) ?>"><i class="icon-shopping-cart"></i></a></span>
                  <span><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><i class="icon-eye"></i></a></span>
                  <span><a href="#"><i class="icon-heart3"></i></a></span>
                  <span><a href="add-to-wishlist.html"><i class="icon-bar-chart"></i></a></span>
                </p>
              </div>
            </div>
            <div class="desc">
              <h3><a href="shop.html"><?php echo $prod->nama_produk ?></a></h3>
              <p class="price"><span>Rp. <?php echo number_format($prod->harga,'0',',','.').'/'.$prod->satuan ?></span> <!-- <span class="sale">$300.00</span> --> </p>
            </div>
          </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>


<div id="colorlib-testimony" class="colorlib-light-grey">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
        <h2><span>Our Satisfied Customer says</span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="owl-carousel2">
          <div class="item">
            <div class="testimony text-center">
              <span class="img-user" style="background-image: url(<?php echo base_url()?>assets/front/images/person1.jpg);"></span>
              <span class="user">Alysha Myers</span>
              <small>Miami Florida, USA</small>
              <blockquote>
                <p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </blockquote>
            </div>
          </div>
          <div class="item">
            <div class="testimony text-center">
              <span class="img-user" style="background-image: url(<?php echo base_url()?>assets/front/images/person2.jpg);"></span>
              <span class="user">James Fisher</span>
              <small>New York, USA</small>
              <blockquote>
                <p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
              </blockquote>
            </div>
          </div>
          <div class="item">
            <div class="testimony text-center">
              <span class="img-user" style="background-image: url(<?php echo base_url()?>assets/front/images/person3.jpg);"></span>
              <span class="user">Jacob Webb</span>
              <small>Athens, Greece</small>
              <blockquote>
                <p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="colorlib-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
        <h2>Latest News</h2>
        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
      </div>
    </div>
    <div class="row">
      <?php foreach($berita as $news) { ?>
        <div class="col-md-4">
          <article class="article-entry">
            <a href="<?php echo base_url('berita/read/'.$news->slug_berita) ?>" class="blog-img" style="background-image: url(<?php echo base_url('assets/images/news/thumbs/'.$news->gambar)?>);"></a>
            <div class="desc">
              <p class="meta"><span class="day"><?php echo date('d') ?></span><span class="month"><?php echo date('M') ?></span></p>
              <p class="admin"><span>Posted by:</span> <span><?php echo $news->post ?></span></p>
              <h2><a href="<?php echo base_url('berita/read/'.$news->slug_berita) ?>"><?php echo $news->judul ?></a></h2>
              <p><?php echo character_limiter($news->isi,35)?></p>
              <p><a href="<?php echo base_url('berita/read/'.$news->slug_berita) ?>" class="float : right;">Read more...</a></p>
            </div>
          </article>
        </div>
      <?php } ?>
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
