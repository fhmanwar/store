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
                  <span><a href="<?php echo base_url('berita') ?>">News</a></span>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </li>
      </ul>
    </div>
</aside>

<div class="colorlib-blog">
  <div class="container">
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
