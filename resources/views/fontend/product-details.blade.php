  @extends('fontend.master')
  @section('body')

  <!-- Begin Li's Breadcrumb Area -->
  <div class="breadcrumb-area">
      <div class="container">
          <div class="breadcrumb-content">
              <ul>
                  <li><a href="{{route('/')}}">Home</a></li>
                  <li class="active">Single Product</li>
              </ul>
          </div>
      </div>
  </div>
  <!-- Li's Breadcrumb Area End Here -->
  <!-- content-wraper start -->
  <div class="content-wraper">
      <div class="container">
          <div class="row single-product-area mt-5">
              <div class="col-lg-5 col-md-6">
                  <!-- Product Details Left -->
                  <div class="product-details-left">
                      <div class="product-details-images slider-navigation-1">
                          <div class="lg-image">
                              <a class="popup-img venobox vbox-item" href="{{ asset($product->image) }}" data-gall="myGallery">
                                  <img src="{{ asset($product->image) }}" alt="product image">
                              </a>
                          </div>
                          @foreach($subimages as $key => $subimage)

                          <div class="lg-image">

                              <a class="popup-img venobox vbox-item" href="{{ asset($subimage->subimage) }}" data-gall="myGallery">
                                  <img src="{{ asset($subimage->subimage) }}" alt="product image">
                              </a>
                          </div>
                          @endforeach


                      </div>
                      <div class="product-details-thumbs slider-thumbs-1 mt-3 " style="margin-left: -9rem;">
                          @foreach($subimages as $key => $subimage)
                          <div class="sm-image rounded mr-1 "><img src="{{ asset($subimage->subimage) }}" alt="product image thumb"></div>

                          @endforeach
                      </div>
                  </div>
                  <!--// Product Details Left -->
              </div>

              <div class="col-lg-7 col-md-6">
                  <div class="product-details-view-content pt-60">
                      <div class="product-info">
                          <h2>{{ $product->Product_name }}</h2>

                          <div class="rating-box pt-20">
                              <ul class="rating rating-with-review-item">
                                  <li><i class="fa fa-star-o"></i></li>
                                  <li><i class="fa fa-star-o"></i></li>
                                  <li><i class="fa fa-star-o"></i></li>
                                  <li class="no-star"><i class="fa fa-star-o"></i></li>
                                  <li class="no-star"><i class="fa fa-star-o"></i></li>
                                  <li class="review-item"><a href="#">Read Review</a></li>
                                  <li class="review-item"><a href="#">Write Review</a></li>
                              </ul>
                          </div>
                          <h3 class="product-details-ref mb-1 mt-5">Product Code: {{ $product->id }}</h3>

                          @if( $product->Product_Amount)
                          <div class="form-check-inline">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" checked>IN STOCK
                              </label>
                          </div>
                          @else
                          <div class="form-check-inline">
                              <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" value="" checked>NOT IN STOCK
                              </label>
                          </div>
                          @endif
                          <div class="price-box pt-20">
                              <?php
                                $p = ($product->discount_Price) / 100;
                                $y = ($product->Product_Price) * ($p);
                                $new = ($product->Product_Price - $y);
                                ?>
                              <span class="new-price new-price-2"> {{ $new }}tk</span>
                          </div>
                          <div class="product-desc">
                              <p>
                                  <span>{{ $product->sDescription}} </span>
                              </p>
                          </div>
                          <div class="single-add-to-cart">
                              <form action="{{route('addcart')}}" method="POST" min="1" max="10" class="cart-quantity">
                                  @csrf
                                  <div class="quantity">

                                      <label class="form-label h5 mr-3" for="">Quantity: </label>
                                      <input name="qnty" class="form-control  d-inline " style="width: 80px;" type="number" max="{{$product->Product_Amount}}" value="1" min="1">
                                      <input type="hidden" name="id" value="{{$product->id}}">
                                 
                                  <button class="add-to-cart" type="submit">Add to cart</button>
                                  </div>
                              </form>
                          </div>

                          <!--
                          <div class="single-add-to-cart">
                              <form action="{{route('addcart')}}" method="POST" enctype="multipart/form-data" class="cart-quantity">
                                  @csrf
                                  <div class="quantity">
                                      <label>Quantity</label>
                                      <div class="cart-plus-minus">
                                          <input name="id" value="{{$product->id}}" type="hidden">
                                          <input class="cart-plus-minus-box" name="qnty" min="1" max="{{$product->Product_Amount}}" type="number">
                                          <input name="image" value="{{ asset($product->image) }}" type="hidden">
                                          <input name="Product_Amount" value="{{$product->Product_Amount}}" type="hidden">
                                          <input name="Product_name" value="{{ $product->Product_name }}" type="hidden">
                                          <input name="Product_Price" value="{{ $new }}" type="hidden">

                                          <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                          <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                      </div>
                                  </div>
                                  <button class="add-to-cart" type="submit">Add to cart</button>
                              </form>
                          </div> -!-->
                          <div class="product-additional-info pt-25">
                              <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                              <div class="product-social-sharing pt-25">
                                  <ul>
                                      <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                      <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                      <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="block-reassurance">
                              <ul>
                                  <li>
                                      <div class="reassurance-item">
                                          <div class="reassurance-icon">
                                              <i class="fa fa-check-square-o"></i>
                                          </div>
                                          <p>Security policy </p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="reassurance-item">
                                          <div class="reassurance-icon">
                                              <i class="fa fa-truck"></i>
                                          </div>
                                          <p>Delivery policy </p>
                                      </div>
                                  </li>
                                  <li>
                                      <div class="reassurance-item">
                                          <div class="reassurance-icon">
                                              <i class="fa fa-exchange"></i>
                                          </div>
                                          <p> Return policy </p>
                                      </div>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- content-wraper end -->
  <!-- Begin Product Area -->
  <div class="product-area pt-35">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="li-product-tab">
                      <ul class="nav li-product-menu">
                          <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                          <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                          <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                      </ul>
                  </div>
                  <!-- Begin Li's Tab Menu Content Area -->
              </div>
          </div>
          <div class="tab-content">
              <div id="description" class="tab-pane active show" role="tabpanel">
                  <div class="product-description">
                      <span>{{ $product->sDescription}} </span>
                  </div>
              </div>
              <div id="product-details" class="tab-pane" role="tabpanel">
                  <div class="product-details-manufacturer">
                      <span>{{ $product->lDescription}} </span>
                  </div>
              </div>
              <div id="reviews" class="tab-pane" role="tabpanel">
                  <div class="product-reviews">
                      <div class="product-details-comment-block">
                          <div class="comment-review">
                              <span>Grade</span>
                              <ul class="rating">
                                  <li><i class="fa fa-star-o"></i></li>
                                  <li><i class="fa fa-star-o"></i></li>
                                  <li><i class="fa fa-star-o"></i></li>
                                  <li class="no-star"><i class="fa fa-star-o"></i></li>
                                  <li class="no-star"><i class="fa fa-star-o"></i></li>
                              </ul>
                          </div>
                          <div class="review-btn">
                              <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                          </div>
                          <!-- Begin Quick View | Modal Area -->
                          <div class="modal fade modal-wrapper" id="mymodal">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-body">
                                          <h3 class="review-page-title">Write Your Review</h3>
                                          <div class="modal-inner-area row">
                                              <div class="col-lg-6">
                                                  <div class="li-review-product">
                                                      <img src="{{ asset('/') }}fontend-style/images/product/large-size/3.jpg" alt="Li's Product">
                                                      <div class="li-review-product-desc">
                                                          <p class="li-product-name">Today is a good day Framed poster</p>
                                                          <p>
                                                              <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                          </p>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="li-review-content">
                                                      <!-- Begin Feedback Area -->
                                                      <div class="feedback-area">
                                                          <div class="feedback">
                                                              <h3 class="feedback-title">Our Feedback</h3>
                                                              <form action="#">
                                                                  <p class="your-opinion">
                                                                      <label>Your Rating</label>
                                                                      <span>
                                                                          <select class="star-rating">
                                                                              <option value="1">1</option>
                                                                              <option value="2">2</option>
                                                                              <option value="3">3</option>
                                                                              <option value="4">4</option>
                                                                              <option value="5">5</option>
                                                                          </select>
                                                                      </span>
                                                                  </p>
                                                                  <p class="feedback-form">
                                                                      <label for="feedback">Your Review</label>
                                                                      <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                  </p>
                                                                  <div class="feedback-input">
                                                                      <p class="feedback-form-author">
                                                                          <label for="author">Name<span class="required">*</span>
                                                                          </label>
                                                                          <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                      </p>
                                                                      <p class="feedback-form-author feedback-form-email">
                                                                          <label for="email">Email<span class="required">*</span>
                                                                          </label>
                                                                          <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                          <span class="required"><sub>*</sub> Required fields</span>
                                                                      </p>
                                                                      <div class="feedback-btn pb-15">
                                                                          <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                          <a href="#">Submit</a>
                                                                      </div>
                                                                  </div>
                                                              </form>
                                                          </div>
                                                      </div>
                                                      <!-- Feedback Area End Here -->
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Quick View | Modal Area End Here -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Product Area End Here -->
  <!-- Begin Li's Laptop Product Area -->
  <section class="product-area li-laptop-product pt-30 pb-50">
      <div class="container">
          <div class="row">
              <!-- Begin Li's Section Area -->
              <div class="col-lg-12">
                  <div class="li-section-title">
                      <h2>
                          <span>Related category products in here:</span>
                      </h2>
                  </div>
                  <div class="row">
                      <div class="product-active owl-carousel">
                          @foreach($related_products as $key => $product)
                          <div class="col-lg-12">

                              <!-- single-product-wrap start -->
                              <div class="single-product-wrap">
                                  <div class="product-image">
                                      <a href="{{route('product-details',['slug' =>$product->slug])}}">
                                          <img src="{{ asset($product->image) }}" alt="Li's Product Image">
                                      </a>
                                      <span class="sticker">New</span>
                                  </div>
                                  <div class="product_desc">
                                      <div class="product_desc_info">
                                          <div class="product-review">
                                              <h5 class="manufacturer">
                                                  <a href="product-details.html">{{ substr($product->category->name, 0,40) }}</a>
                                              </h5>
                                              <div class="rating-box">
                                                  <ul class="rating">
                                                      <li><i class="fa fa-star-o"></i></li>
                                                      <li><i class="fa fa-star-o"></i></li>
                                                      <li><i class="fa fa-star-o"></i></li>
                                                      <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                      <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                  </ul>
                                              </div>
                                          </div>
                                          <h4><a class="product_name" href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->Product_name, 0,50) }}</a></h4>
                                          <div class="price-box">
                                              <?php
                                                $p = ($product->discount_Price) / 100;
                                                $y = ($product->Product_Price) * ($p);
                                                $new = ($product->Product_Price - $y);
                                                ?>
                                              <span class="new-price">{{$new}} tk</span>
                                              @if($product->discount_Price)
                                              <span class="old-price">{{ $product->Product_Price}} tk</span>
                                              <span class="discount-percentage">{{ $product->discount_Price}}%</span>

                                              @endif

                                          </div>
                                      </div>
                                      <div class="add-actions">
                                          <ul class="add-actions-link">
                                              <li class="add-cart active"><a href="{{route('add-to-cart',['id' =>$product->id , 'price' =>  $new])}}">Add to cart</a></li>
                                              <li><a class="links-details" href="{{route('product-details',['slug' =>$product->slug])}}"><i class="fa fa-eye"></i></a></li>

                                          </ul>
                                      </div>
                                  </div>
                              </div>

                              <!-- single-product-wrap end -->
                          </div>
                          @endforeach

                      </div>
                  </div>
              </div>
              <!-- Li's Section Area End Here -->
          </div>
      </div>
  </section>

  @endsection