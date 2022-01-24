@extends('fontend.master')
@section('body')
<!-- Begin Header Bottom Area -->

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">Product </li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
            @if($categoryproducts->count())

                <!-- Begin Li's Banner Area -->
                <!-- Begin Li's Static Home Area -->
                <div class="container-fluid">
                    
                    <div class="row">

                        <div class="col-lg-12">
                            @foreach($banersliders as $key => $product)
                            <div class="li-static-home-image" style="  background-image: url('{{ asset($product->image) }}'); height: 300px;">

                                <!-- Begin Li's Static Home Image Area -->

                                <?php
                                $p = ($product->discount_Price) / 100;
                                $y = ($product->Product_Price) * ($p);
                                $new = ($product->Product_Price - $y);
                                ?>
                                <!-- Li's Static Home Image Area End Here -->
                                <!-- Begin Li's Static Home Content Area -->
                                <div class="li-static-home-content">
                                    <p>Sale Offer<span>-{{ $product->discount_Price}}% Off</span>This Week</p>
                                    <h2>Featured Product</h2>
                                    <h2>{{ substr($product->Product_name, 0,50) }}</h2>
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
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->

                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">

                    <div class="tab-content">

                        <div class="product-area shop-product-area mt-50">

                            <div class="row">

                                @foreach($categoryproducts as $key => $product)
                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">

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

                            </div>
                        </div>


                        <div class="paginatoin-area">
                            {{ $categoryproducts->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                
                @else
               <h4 class="text-center mt-5 "> No products found</h4>
                
                @endif
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                    <div class="sidebar-title">
                        <h2>All</h2>
                    </div>
                    <!-- category-sub-menu start -->
                    <div class="category-sub-menu">
                        <ul>
                            <li class="has-sub"><a href="# ">Category</a>
                                <ul>
                                    @foreach($categories as $key => $category)

                                    <li><a href="{{route('category-page',['slug' =>$category->slug])}}">{{ $category->name}}</a>
                                    </li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#">Brands</a>
                                <ul>
                                    @foreach($brand1 as $key => $brand)

                                    <li><a href="{{route('brand-page',['slug' =>$brand->slug])}}">{{ $brand->name}}</a>
                                    </li>


                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- category-sub-menu end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Filter By</h2>
                    </div>
                    <!-- btn-clear-all start -->
                    <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                    <!-- btn-clear-all end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Brand</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    @foreach($categories as $key => $category)

                                    <li><input type="checkbox" name="{{ $category->id}}"><a href="#">{{ $category->name}} (13)</a></li>



                                    @endforeach

                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Categories</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    @foreach($brand1 as $key => $brand)

                                    <li><input type="checkbox" name="{{ $brand->id}}"><a href="#">{{ $brand->name}} (13)</a></li>



                                    @endforeach
                                </ul>

                            </form>
                        </div>
                    </div>
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Price range:</h5>
                        <div class="categori-checkbox">
                            <form action="#">

                                <input type="range" name="range" step="1" min="1" max="10000" value="" onchange="rangePrimary.value=value">
                                <input type="text" id="rangePrimary" />
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area start -->

                    <!-- filter-sub-area end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!-- category-sub-menu start -->


            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->
  <!-- Begin Footer Area -->

@endsection