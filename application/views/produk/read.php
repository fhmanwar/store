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
                  <span>Product Detail</span></h2>
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
    <div class="row row-pb-lg">
      <div class="col-md-10 col-md-offset-1">
        <div class="product-detail-wrap">
          <div class="row">
            <div class="col-md-5">
              <div class="product-entry">
                <div class="product-img" style="background-image: url(<?php echo base_url('assets/images/produk/'.$produk->gambar)?>);">
                  <p class="tag"><span class="sale">Sale</span></p>
                </div>
                <div class="thumb-nail">
                  <a href="#" class="thumb-img" style="background-image: url(images/cart-11.jpg);"></a>
                  <a href="#" class="thumb-img" style="background-image: url(images/cart-12.jpg);"></a>
                  <a href="#" class="thumb-img" style="background-image: url(images/cart-16.jpg);"></a>
                </div>
              </div>
            </div>

            <div class="col-md-7">
              <div class="desc">
                <h3><?php echo $produk->nama_produk ?></h3>
                <p class="price">
                  <span>Rp. <?php echo number_format($produk->harga,'0',',','.').'/'.$produk->satuan ?></span>
                  <span class="rate text-right">
                    <i class="icon-star-full"></i>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-half"></i>
                    (74 Rating)
                  </span>
                </p>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                <div class="color-wrap">
                  <p class="color-desc">
                    Color:
                    <a href="#" class="color color-1"></a>
                    <a href="#" class="color color-2"></a>
                    <a href="#" class="color color-3"></a>
                    <a href="#" class="color color-4"></a>
                    <a href="#" class="color color-5"></a>
                  </p>
                </div>
                <div class="size-wrap">
                  <p class="size-desc">
                    Size:
                    <a href="#" class="size size-1">xs</a>
                    <a href="#" class="size size-2">s</a>
                    <a href="#" class="size size-3">m</a>
                    <a href="#" class="size size-4">l</a>
                    <a href="#" class="size size-5">xl</a>
                    <a href="#" class="size size-5">xxl</a>
                  </p>
                </div>

                <form action="<?php echo base_url('produk/update')?>" method="post" enctype="multipart/form-data">
                  <div class="row row-pb-sm">
                    <div class="col-md-4">
                      <div class="input-group">
                        <span class="input-group-btn">
                          <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                            <i class="icon-minus2"></i>
                          </button>
                        </span>
                         <!-- <input type="hidden" name="cart[<?php echo $cart['id'];?>][id]" value="<?php echo $cart['id'];?>" />
                         <input type="hidden" name="cart[<?php echo $cart['id'];?>][rowid]" value="<?php echo $cart['rowid'];?>" />
                        <input type="hidden" name="cart[<?php echo $cart['id'];?>][name]" value="<?php echo $cart['name'];?>" />
                        <input type="hidden" name="cart[<?php echo $cart['id'];?>][price]" value="<?php echo $cart['price'];?>" />
                        <input type="hidden" name="cart[<?php echo $cart['id'];?>][gambar]" value="<?php echo $cart['gambar'];?>" /> -->
                        <input type="text" id="quantity" name="cart[qty]" class="form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn">
                          <button type="button" class="quantity-right-plus btn" data-type="plus" data-field=""> <i class="icon-plus2"></i>
                          </button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <p><a href="<?php echo base_url('produk/add/'.$produk->id_produk) ?>"  class="btn btn-primary btn-addtocart"><i class="icon-shopping-cart"></i> Buy</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-12 tabulation">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
              <li><a data-toggle="tab" href="#manufacturer">Manufacturer</a></li>
              <li><a data-toggle="tab" href="#review">Reviews</a></li>
            </ul>
            <div class="tab-content">
              <div id="description" class="tab-pane fade in active">
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                <ul>
                  <li>The Big Oxmox advised her not to do so</li>
                  <li>Because there were thousands of bad Commas</li>
                  <li>Wild Question Marks and devious Semikoli</li>
                  <li>She packed her seven versalia</li>
                  <li>tial into the belt and made herself on the way.</li>
                </ul>
                 </div>
                 <div id="manufacturer" class="tab-pane fade">
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>

               </div>
               <div id="review" class="tab-pane fade">
                <div class="row">
                  <div class="col-md-7">
                    <h3>23 Reviews</h3>
                    <div class="review">
                      <div class="user-img" style="background-image: url(images/person1.jpg)"></div>
                      <div class="desc">
                        <h4>
                          <span class="text-left">Jacob Webb</span>
                          <span class="text-right">14 March 2018</span>
                        </h4>
                        <p class="star">
                          <span>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-half"></i>
                            <i class="icon-star-empty"></i>
                          </span>
                          <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                        </p>
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                      </div>
                    </div>
                    <div class="review">
                      <div class="user-img" style="background-image: url(images/person2.jpg)"></div>
                      <div class="desc">
                        <h4>
                          <span class="text-left">Jacob Webb</span>
                          <span class="text-right">14 March 2018</span>
                        </h4>
                        <p class="star">
                          <span>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-half"></i>
                            <i class="icon-star-empty"></i>
                          </span>
                          <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                        </p>
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                      </div>
                    </div>
                    <div class="review">
                      <div class="user-img" style="background-image: url(images/person3.jpg)"></div>
                      <div class="desc">
                        <h4>
                          <span class="text-left">Jacob Webb</span>
                          <span class="text-right">14 March 2018</span>
                        </h4>
                        <p class="star">
                          <span>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-full"></i>
                            <i class="icon-star-half"></i>
                            <i class="icon-star-empty"></i>
                          </span>
                          <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                        </p>
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-md-push-1">
                    <div class="rating-wrap">
                      <h3>Give a Review</h3>
                      <p class="star">
                        <span>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          (98%)
                        </span>
                        <span>20 Reviews</span>
                      </p>
                      <p class="star">
                        <span>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-empty"></i>
                          (85%)
                        </span>
                        <span>10 Reviews</span>
                      </p>
                      <p class="star">
                        <span>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-empty"></i>
                          <i class="icon-star-empty"></i>
                          (98%)
                        </span>
                        <span>5 Reviews</span>
                      </p>
                      <p class="star">
                        <span>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-empty"></i>
                          <i class="icon-star-empty"></i>
                          <i class="icon-star-empty"></i>
                          (98%)
                        </span>
                        <span>0 Reviews</span>
                      </p>
                      <p class="star">
                        <span>
                          <i class="icon-star-full"></i>
                          <i class="icon-star-empty"></i>
                          <i class="icon-star-empty"></i>
                          <i class="icon-star-empty"></i>
                          <i class="icon-star-empty"></i>
                          (98%)
                        </span>
                        <span>0 Reviews</span>
                      </p>
                    </div>
                  </div>
                </div>
               </div>
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
        <h2><span>Similar Products</span></h2>
        <p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">
      <?php foreach($new as $prod) { ?>
      <div class="col-md-3 text-center">
        <div class="product-entry">
          <div class="product-img" style="background-image: url(<?php echo base_url('assets/images/produk/'.$prod->gambar)?>);">
            <p class="tag"><span class="new">New</span></p>
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
            <h3><a href="<?php echo base_url('produk/read/'.$prod->slug_produk) ?>"><?php echo $prod->nama_produk ?></a></h3>
            <p class="price"><span>Rp. <?php echo number_format($prod->harga,'0',',','.').'/'.$prod->satuan ?></span></p>
          </div>
        </div>
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
