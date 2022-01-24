<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-431:41-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @foreach($setting as $key => $setting)
    <title>{{$setting->Site_name}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}fontend-style/images/favicon.png">
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend-style/css/responsive.css">
    <!-- Modernizr js -->
    <script src="{{ asset('/') }}fontend-style/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header class="li-header-4">
            <!-- Begin Header Top Area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Phone:</span><a href="#">{{$setting->phone}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Left Area End Here -->
                        <!-- Begin Header Top Right Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <!-- Begin Setting Area -->
                                    <!-- Setting Area End Here -->
                                    <!-- Begin Currency Area -->
                                    <li>
                                        <div class="ht-setting-trigger text-uppercase"><span>My Account</span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list text-uppercase">

                                                @if($customar_id = Session::get('customar_id'))
                                                <li><a href="{{route('billing')}}">CHECKOUT</a></li>
                                                <li><a href="" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">LOGOUT</a></li>
                                                <form action="{{ route('customar-logout')}}" method="POST" id="logoutform">
                                                    @csrf
                                                </form>
                                                @else
                                                <li><a href="{{route('login-resistration')}}">LOGIN</a></li>
                                                <li><a href="{{route('login-resistration')}}">SIGN IN</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    @if($customar_id = Session::get('customar_id'))

                                    <li><a href="" class="text-light" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">LOGOUT</a></li>
                                    <form action="{{ route('customar-logout')}}" method="POST" id="logoutform">
                                        @csrf
                                    </form>


                                    @else
                                    <li>
                                        <div class=""><span><a class="text-light" href="{{route('login-resistration')}}">SIGN IN</a></span></div>
                                    </li>
                                    <li>
                                        <div class=""><span><a class="text-light" href="{{route('login-resistration')}}">LOGIN</a></span></div>
                                    </li>
                                    @endif
                                    <li>
                                        <div class=""><span><a class="text-light" href="{{route('show-cart')}}">SHOW CART</a></span></div>
                                    </li>
                                    <!-- Currency Area End Here -->
                                    <!-- Begin Language Area -->

                                    <!-- Language Area End Here -->
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="index.html">
                                    <img src="{{ asset($setting->logo) }}" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                            <!-- Begin Header Middle Searchbox Area -->
                            <form action="{{route('search-product')}}" method="POST" class="hm-searchbox"autocomplete="off" >
                                @csrf
                                <input type="text" name="slug" id="slug" required placeholder="Enter your search key ...">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                                <div class="col-md-12 list-group float-left" style="float: left!important; margin-right: -8px; margin-left: -389px; z-index: 99; margin-top: 52px;" id="productStatus"></div>
                            </form>
                      
                            <!-- Header Middle Searchbox Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <!-- Begin Header Middle Wishlist Area -->

                                    <!-- Header Middle Wishlist Area End Here -->
                                    <!-- Begin Header Mini Cart Area -->
                                    <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text"> @if($grand_total = Session::get('grand_total'))
                                                {{ $grand_total}}
                                                @else
                                                0
                                                @endif
                                                <span class="cart-item-count"> @if($product_no = Session::get('product_no'))
                                                    {{ $product_no}}
                                                    @else
                                                    0
                                                    @endif</span>
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <div class="minicart-button">
                                                <a href="{{route('show-cart')}}" class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                                    <span>View Full Cart</span>
                                                </a>
                                                <a href="{{route('billing')}}" class="li-button li-button-fullwidth li-button-sm">
                                                    <span>Checkout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                        <!-- Header Middle Right Area End Here -->
                    </div>
                </div>
            </div>
            @if($message = Session::get('message'))
                        <div class="alert alert-light alert-dismissible text-center container">
                            <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $message}}
                        </div>
                        @endif
            <!-- Header Middle Area End Here -->
            <!-- Begin Header Bottom Area -->
            <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Header Bottom Menu Area -->
                            <div class="hb-menu">
                                <nav>
                                    <ul>
                                        <li class="dropdown-holder"><a href="{{route('/')}}">Home</a>
                                        </li>
                                        <li class="megamenu-holder "><a class="b" href="#">Category</a>
                                            <ul class="megamenu hb-megamenu">

                                                <li>
                                                    <ul>
                                                        @foreach($categories as $key => $category)

                                                        <li><a href="{{route('category-page',['slug' =>$category->slug])}}">{{ $category->name}}</a>
                                                        </li>

                                                        @if($loop->iteration == 8)
                                                        @break

                                                        @endif

                                                        @endforeach

                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul>
                                                        @foreach($categories as $key => $category)
                                                        @if ($loop->iteration < 9) @continue @endif <li><a href="{{route('category-page',['slug' =>$category->slug])}}">{{ $category->name}}</a>
                                                </li>
                                                @if($loop->iteration == 18)
                                                @break
                                                @endif

                                                @endforeach
                                            </ul>
                                        </li>


                                    </ul>
                                    </li>

                                    <li class="megamenu-holder "><a class="b" href="#">Brands</a>
                                        <ul class="megamenu hb-megamenu">

                                            <li>
                                                <ul>
                                                    @foreach($brand1 as $key => $brand)

                                                    <li><a href="{{route('brand-page',['slug' =>$brand->slug])}}">{{ $brand->name}}</a>
                                                    </li>

                                                    @if($loop->iteration == 8)
                                                    @break

                                                    @endif

                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    @foreach($brand1 as $key => $brand)
                                                    @if ($loop->iteration < 9) @continue @endif <li><a href="{{route('brand-page',['slug' =>$brand->slug])}}">{{ $brand->name}}</a>
                                            </li>


                                            @endforeach
                                        </ul>
                                    </li>



                                    </ul>
                                    </li>

                                    <li><a href="{{route('about-us')}}">About Us</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                    <li><a href="{{route('accessories')}}"">Accessories</a></li>
                                    
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Bottom Menu Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Bottom Area End Here -->
            <!-- Begin Mobile Menu Area -->
            <div class=" mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="mobile-menu">
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                            <!-- Mobile Menu Area End Here -->
        </header>
        <!-- Header Area End Here -->


        @yield('body')

        <!-- Begin Footer Area -->
        <div class="footer">
            <!-- Begin Footer Static Top Area -->
            <div class="footer-static-top">
                <div class="container">
                    <!-- Begin Footer Shipping Area -->
                    <div class="footer-shipping pt-60 pb-25">
                        <div class="row">
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="{{ asset('/') }}fontend-style/images/shipping-icon/1.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>Free Delivery</h2>
                                        <p>And free returns. See checkout for delivery dates.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="{{ asset('/') }}fontend-style/images/shipping-icon/2.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>Safe Payment</h2>
                                        <p>Pay with most popular and secure payment methods.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="{{ asset('/') }}fontend-style/images/shipping-icon/3.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>Shop with Confidence</h2>
                                        <p>Our Buyer Protection covers your purchasefrom click to delivery.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="{{ asset('/') }}fontend-style/images/shipping-icon/4.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>24/7 Help Center</h2>
                                        <p>Have a question? Call a Specialist or chat online.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                        </div>
                    </div>
                    <!-- Footer Shipping Area End Here -->
                </div>
            </div>
            <!-- Footer Static Top Area End Here -->
            <!-- Begin Footer Static Middle Area -->
            <div class="footer-static-middle">
                <div class="container">
                    <div class="footer-logo-wrap pt-50 pb-35">
                        <div class="row">
                            <!-- Begin Footer Logo Area -->
                            <div class="col-lg-4 col-md-6">
                                <div class="footer-logo">
                                    <img src="{{ asset('/') }}fontend-style/images/menu/logo/1.jpg" alt="Footer Logo">

                                </div>
                                <p class="info">
                                    {{$setting->siteDescription}}
                                </p>

                                <li>
                                    <span>Phone: </span>
                                    <a href="#">{{$setting->phone}}</a>
                                </li>
                                <li>
                                    <span>Phone: </span>
                                    <a href="#">{{$setting->phone2}}</a>
                                </li>
                                <li>
                                    <span>Email: </span>
                                    <a href="mailto://info@yourdomain.com">{{$setting->Email}}</a>
                                </li>
                                </ul>
                            </div>
                            <!-- Footer Logo Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Product</h3>
                                    <ul>
                                        @foreach($brand1 as $key => $brand)

                                        <li><a href="{{route('brand-page',['slug' =>$brand->slug])}}">{{ $brand->name}}</a>
                                        </li>

                                        @if($loop->iteration == 4)
                                        @break

                                        @endif

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Block Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div class="col-lg-2 col-md-3 col-sm-6">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Our company</h3>
                                    <ul>
                                        <li class="dropdown-holder"><a href="{{route('/')}}">Home</a></li>

                                        <li><a href="{{route('about-us')}}">About Us</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                        <li><a href="{{route('privacy')}}"">Privacy policy</a></li>
                                    
                                    </ul>
                            </div>
                        </div>
                        <!-- Footer Block Area End Here -->
                        <!-- Begin Footer Block Area -->
                        <div class=" col-lg-4">
                                                <div class="footer-block">
                                                    <h3 class="footer-block-title">Follow Us</h3>
                                                    <ul class="social-link">
                                                        <li class="twitter">
                                                            <a href="https://{{$setting->twitter}}" data-toggle="tooltip" target="_blank" title="Twitter">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="instagram">
                                                            <a href="https://{{$setting->whatsapp}}" data-toggle="tooltip" target="_blank" title="whatsapp">
                                                                <i class="fa fa-whatsapp"></i>
                                                            </a>
                                                        </li>

                                                        <li class="facebook">
                                                            <a href="https://{{$setting->facebook}}" data-toggle="tooltip" target="_blank" title="Facebook">
                                                                <i class="fa fa-facebook"></i>
                                                            </a>
                                                        </li>

                                                        <li class="instagram">
                                                            <a href="https://{{$setting->instagram}}" data-toggle="tooltip" target="_blank" title="Instagram">
                                                                <i class="fa fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Begin Footer Newsletter Area -->

                                                <!-- Footer Newsletter Area End Here -->
                                </div>
                                <!-- Footer Block Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Static Middle Area End Here -->
                <!-- Footer -->
                <footer class="footer bg-white bottom p-2" style="z-index: 1;">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                @endforeach
                <!-- End of Footer -->

                <!-- Footer Area End Here -->

                <!-- Body Wrapper End Here -->
                <!-- jQuery-V1.12.4 -->
                <script src="{{ asset('/') }}fontend-style/js/vendor/jquery-1.12.4.min.js"></script>
                <!-- Popper js -->
                <script src="{{ asset('/') }}fontend-style/js/vendor/popper.min.js"></script>
                <!-- Bootstrap V4.1.3 Fremwork js -->
                <script src="{{ asset('/') }}fontend-style/js/bootstrap.min.js"></script>
                <!-- Ajax Mail js -->
                <script src="{{ asset('/') }}fontend-style/js/ajax-mail.js"></script>
                <!-- Meanmenu js -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.meanmenu.min.js"></script>
                <!-- Wow.min js -->
                <script src="{{ asset('/') }}fontend-style/js/wow.min.js"></script>
                <!-- Slick Carousel js -->
                <script src="{{ asset('/') }}fontend-style/js/slick.min.js"></script>
                <!-- Owl Carousel-2 js -->
                <script src="{{ asset('/') }}fontend-style/js/owl.carousel.min.js"></script>
                <!-- Magnific popup js -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.magnific-popup.min.js"></script>
                <!-- Isotope js -->
                <script src="{{ asset('/') }}fontend-style/js/isotope.pkgd.min.js"></script>
                <!-- Imagesloaded js -->
                <script src="{{ asset('/') }}fontend-style/js/imagesloaded.pkgd.min.js"></script>
                <!-- Mixitup js -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.mixitup.min.js"></script>
                <!-- Countdown -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.countdown.min.js"></script>
                <!-- Counterup -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.counterup.min.js"></script>
                <!-- Waypoints -->
                <script src="{{ asset('/') }}fontend-style/js/waypoints.min.js"></script>
                <!-- Barrating -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.barrating.min.js"></script>
                <!-- Jquery-ui -->
                <script src="{{ asset('/') }}fontend-style/js/jquery-ui.min.js"></script>
                <!-- Venobox -->
                <script src="{{ asset('/') }}fontend-style/js/venobox.min.js"></script>
                <!-- Nice Select js -->
                <script src="{{ asset('/') }}fontend-style/js/jquery.nice-select.min.js"></script>
                <!-- ScrollUp js -->
                <script src="{{ asset('/') }}fontend-style/js/scrollUp.min.js"></script>
                <!-- Main/Activator js -->
                <script src="{{ asset('/') }}fontend-style/js/main.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#slug').keyup(function() {
                            var slug = $(this).val();
                            if (slug != '') {
                                $.ajax({
                                    url: "{{route('get.product')}}",
                                    type: "GET",
                                    data:{
                                        slug:slug
                                    },
                                    success: function(data) {
                                        $('#productStatus').fadeIn();
                                        $('#productStatus').html(data);

                                    }
                                });
                            }
                        });
                    });
                    $(document).on('click', 'li',function() {
                        $('#slug').val($(this).text());
                        $('#productStatus').fadeOut();
                    });
                </script>
                @yield('ssl')
</body>

<!-- index-431:47-->

</html>