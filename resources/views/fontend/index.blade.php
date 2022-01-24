@extends('fontend.master')
@section('body')
<!-- Begin Slider With Banner Area -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        @foreach($banersliders as $key => $product)
                        <!-- Begin Single Slide Area -->
                        <?php
                        $p = ($product->discount_Price) / 100;
                        $y = ($product->Product_Price) * ($p);
                        $new = ($product->Product_Price - $y);
                        ?>
                        <div class="single-slide align-center-left animation-style-01 bg-1" style=" background-image: url('{{ asset($product->image) }}')">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-{{ $product->discount_Price}}% Off</span> This Week</h5>
                                <h2>{{ substr($product->Product_name, 0,10) }}</h2>
                                <h3>Starting at <span>{{ $new}} tk</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="{{route('product-details',['slug' =>$product->slug])}}">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Slide Area End Here -->

                        <!-- Single Slide Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-sm-30 pt-xs-30">
                <div class="li-banner">
                    @foreach($banersliders as $key => $product)
                    <!-- Begin Single Slide Area -->
                    <div class="single-slide align-center-left animation-style-01 bg-1 mb-3" style=" background-image: url('{{ asset($product->image) }}'); min-height: 230px;">
                        <div class="slider-progress"></div>
                        <div class="slider-content">

                            <h5>Sale Offer <span>-{{ $product->discount_Price}}% Off</span> This Week</h5>
                            <h4>{{ substr($product->Product_name, 0,10) }}</h2>

                                <div class="default-btn slide-btn">
                                    <a class="links" href="{{route('product-details',['slug' =>$product->slug])}}">Shopping Now</a>
                                </div>
                        </div>
                    </div>
                    @if($loop->iteration == 2)
                    @break

                    @endif

                    @endforeach
                </div>

            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Banner Area End Here -->
<!-- Begin Static Top Area -->

<!-- product-area start -->
<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a></li>
                        <li><a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a></li>
                      
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($NewArrival as $key => $product)
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
            <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($bestsaller as $key => $product)
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
                <div id="li-featured-product" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($NewArrival as $key => $product)
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
                                                    <a href="product-details.html">{{ substr($product->category->name, 0,15) }}</a>
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
                                            <h4><a class="product_name" href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->Product_name, 0,10) }}</a></h4>
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
                                                <li class="add-cart active"><a href="{{route('product-details',['slug' =>$product->slug])}}">Add to cart</a></li>
                                                <li><a class="links-details" href="{{route('product-details',['slug' =>$product->slug])}}"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
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
            </div>
            <div id="li-featured-product" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($NewArrival as $key => $product)
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
                <div id="li-featured-product" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($NewArrival as $key => $product)
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
                                                    <a href="product-details.html">{{ substr($product->category->name, 0,15) }}</a>
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
                                            <h4><a class="product_name" href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->Product_name, 0,10) }}</a></h4>
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
                                                <li class="add-cart active"><a href="{{route('product-details',['slug' =>$product->slug])}}">Add to cart</a></li>
                                                <li><a class="links-details" href="{{route('product-details',['slug' =>$product->slug])}}"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i></a></li>
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
            </div>
        </div>
        <!-- product-area end -->

        <!-- Li's Static Banner Area End Here -->
        <!-- Begin Li's Laptop Product Area -->
        <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>New Brands</span>
                            </h2>

                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach($brands as $key => $product)
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
                                                        <a href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->category->name, 0,40) }}</a>
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
                                <!-- single-product-wrap start -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
    </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->
    <!-- Begin Li's TV & Audio Product Area -->
    <section class="product-area li-laptop-product li-tv-audio-product pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Affordable</span>
                        </h2>

                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($Affordable as $key => $product)
                            <div class="col-lg-12">

                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{route('product-details',['slug' =>$product->slug])}}">
                                            <img src="{{ asset($product->image) }}" max-height="280px" min-height="280px" alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->category->name, 0,40) }}</a>
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
    <!-- Li's TV & Audio Product Area End Here -->
    <!-- Begin Li's Static Home Area -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach($banersliders as $key => $product)
                <div class="li-static-home-image" style="  background-image: url('{{ asset($product->image) }}');">

                    <!-- Begin Li's Static Home Image Area -->

                    <!-- Li's Static Home Image Area End Here -->
                    <!-- Begin Li's Static Home Content Area -->
                    <?php
                    $p = ($product->discount_Price) / 100;
                    $y = ($product->Product_Price) * ($p);
                    $new = ($product->Product_Price - $y);
                    ?>
                    <div class="li-static-home-content">
                        <p>Sale Offer<span>-{{ $product->discount_Price}}% Off</span>This Week</p>
                        <h2>Featured Product</h2>
                        <h2>{{ substr($product->Product_name, 0,30) }}</h2>
                        <p class="schedule">
                            Starting at
                            <span> ${{ $new}} tk</span>
                        </p>
                        <div class="default-btn">
                            <a href="{{route('product-details',['slug' =>$product->slug])}}" class="links">Shopping Now</a>
                        </div>
                    </div>
                    <!-- Li's Static Home Content Area End Here -->
                </div>
                @if($loop->iteration == 1)
                @break

                @endif

                @endforeach
            </div>
        </div>
    </div>

    <!-- Li's Static Home Area End Here -->
    <!-- Begin Group Featured Product Area -->
    <div class="group-featured-product pt-60 pb-40 pb-xs-25">
        <div class="container">
            <div class="row">
                <!-- Begin Featured Product Area -->
                <div class="col-lg-4">
                    <div class="featured-product">
                        <div class="li-section-title">
                            <h2>
                                <span>Chamcham</span>
                            </h2>
                        </div>
                        <div class="featured-product-active-2 owl-carousel">
                            <div class="featured-product-bundle">
                                @foreach($Affordable as $key => $product)
                                <div class="row">
                                    <div class="group-featured-pro-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('product-details',['slug' =>$product->slug])}}">
                                                <img alt="" src="{{ asset($product->image) }}">
                                            </a>
                                        </div>
                                        <div class="featured-pro-content">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->category->name, 0,40) }}</a>
                                                </h5>
                                            </div>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <h4><a class="featured-product-name" href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->Product_name, 0,50) }}</a></h4>
                                            <div class="featured-price-box">
                                                <?php
                                                $p = ($product->discount_Price) / 100;
                                                $y = ($product->Product_Price) * ($p);
                                                $new = ($product->Product_Price - $y);
                                                ?>
                                                <span class="new-price">${{ $new}} tk</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($loop->iteration == 4)
                                @break

                                @endif

                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Featured Product Area End Here -->
                <!-- Begin Featured Product Area -->
                <div class="col-lg-4">
                    <div class="featured-product pt-sm-10 pt-xs-25">
                        <div class="li-section-title">
                            <h2>
                                <span>Meito</span>
                            </h2>
                        </div>
                        <div class="featured-product-active-2 owl-carousel">
                            <div class="featured-product-bundle">
                                @foreach($horizontal as $key => $product)
                                <div class="row">
                                    <div class="group-featured-pro-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('product-details',['slug' =>$product->slug])}}">
                                                <img alt="" src="{{ asset($product->image) }}">
                                            </a>
                                        </div>
                                        <div class="featured-pro-content">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->category->name, 0,40) }}</a>
                                                </h5>
                                            </div>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <h4><a class="featured-product-name" href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->Product_name, 0,50) }}</a></h4>
                                            <div class="featured-price-box">
                                            <?php
                                                $p = ($product->discount_Price) / 100;
                                                $y = ($product->Product_Price) * ($p);
                                                $new = ($product->Product_Price - $y);
                                                ?>
                                                <span class="new-price">${{ $new}} tk</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($loop->iteration == 4)
                                @break

                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Product Area End Here -->
                <!-- Begin Featured Product Area -->
                <div class="col-lg-4">
                    <div class="featured-product pt-sm-10 pt-xs-25">
                        <div class="li-section-title">
                            <h2>
                                <span>Sanai</span>
                            </h2>
                        </div>
                        <div class="featured-product-active-2 owl-carousel">
                            <div class="featured-product-bundle">
                                @foreach($horizontal1 as $key => $product)
                                <div class="row">
                                    <div class="group-featured-pro-wrapper">
                                        <div class="product-img">
                                            <a href="{{route('product-details',['slug' =>$product->slug])}}">
                                                <img alt="" src="{{ asset($product->image) }}">
                                            </a>
                                        </div>
                                        <div class="featured-pro-content">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->category->name, 0,40) }}</a>
                                                </h5>
                                            </div>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <h4><a class="featured-product-name" href="{{route('product-details',['slug' =>$product->slug])}}">{{ substr($product->Product_name, 0,50) }}</a></h4>
                                            <div class="featured-price-box">
                                            <?php
                                                $p = ($product->discount_Price) / 100;
                                                $y = ($product->Product_Price) * ($p);
                                                $new = ($product->Product_Price - $y);
                                                ?>
                                                <span class="new-price">${{ $new}} tk</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($loop->iteration == 4)
                                @break

                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Featured Product Area End Here -->
            </div>
        </div>
    </div>
    <!-- Group Featured Product Area End Here -->
    <!-- Begin Quick View | Modal Area -->
     

    @endsection