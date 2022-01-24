@extends('fontend.master')
@section('body')
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li class="dropdown-holder"><a href="index.html">Home</a>
                                                <ul class="hb-dropdown">
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="index-4.html">Home Four</a></li>
                                                </ul>
                                            </li>
                                            <li class="catmenu-dropdown megamenu-holder"><a href="shop-left-sidebar.html">Shop</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li><a href="shop-left-sidebar.html">Shop Page Layout</a>
                                                        <ul>
                                                            <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                                            <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                                            <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                            <li><a href="shop-list.html">Shop List</a></li>
                                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="single-product-gallery-left.html">Single Product Style</a>
                                                        <ul>
                                                            <li><a href="single-product-carousel.html">Single Product Carousel</a></li>
                                                            <li><a href="single-product-gallery-left.html">Single Product Gallery Left</a></li>
                                                            <li><a href="single-product-gallery-right.html">Single Product Gallery Right</a></li>
                                                            <li><a href="single-product-tab-style-top.html">Single Product Tab Style Top</a></li>
                                                            <li><a href="single-product-tab-style-left.html">Single Product Tab Style Left</a></li>
                                                            <li><a href="single-product-tab-style-right.html">Single Product Tab Style Right</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="single-product.html">Single Products</a>
                                                        <ul>
                                                            <li><a href="single-product.html">Single Product</a></li>
                                                            <li><a href="single-product-sale.html">Single Product Sale</a></li>
                                                            <li><a href="single-product-group.html">Single Product Group</a></li>
                                                            <li><a href="single-product-normal.html">Single Product Normal</a></li>
                                                            <li><a href="single-product-affiliate.html">Single Product Affiliate</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-holder"><a href="blog-left-sidebar.html">Blog</a>
                                                <ul class="hb-dropdown">
                                                    <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">Blog Grid View</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                            <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                            <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                            <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder"><a href="blog-list-left-sidebar.html">Blog List View</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-list.html">Blog List</a></li>
                                                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder"><a href="blog-details-left-sidebar.html">Blog Details</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-holder"><a href="blog-gallery-format.html">Blog Format</a>
                                                        <ul class="hb-dropdown hb-sub-dropdown">
                                                            <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                            <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                            <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="catmenu-dropdown megamenu-static-holder"><a href="index.html">Pages</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li><a href="blog-left-sidebar.html">Blog Layouts</a>
                                                        <ul>
                                                            <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                            <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                            <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                            <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a></li>
                                                            <li><a href="blog-list.html">Blog List</a></li>
                                                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                                                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="blog-details-left-sidebar.html">Blog Details Pages</a>
                                                        <ul>
                                                            <li class="active"><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                            <li><a href="blog-details-right-sidebar.html">Right Sidebar</a></li>
                                                            <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                            <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                            <li><a href="blog-gallery-format.html">Blog Gallery Format</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index.html">Other Pages</a>
                                                        <ul>
                                                            <li><a href="login-register.html">My Account</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="compare.html">Compare</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index.html">Other Pages 2</a>
                                                        <ul>
                                                            <li><a href="contact.html">Contact</a></li>
                                                            <li><a href="about-us.html">About Us</a></li>
                                                            <li><a href="faq.html">FAQ</a></li>
                                                            <li><a href="404.html">404 Error</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="shop-left-sidebar.html">Smartwatch</a></li>
                                            <li><a href="shop-left-sidebar.html">Accessories</a></li>
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
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
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
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Blog Details Left Sidebar</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Li's Main Blog Page Area -->
            <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Blog Sidebar Area -->
                        <div class="col-lg-3 order-lg-1 order-2">
                            <div class="li-blog-sidebar-wrapper">
                                <div class="li-blog-sidebar">
                                    <div class="li-sidebar-search-form">
                                        <form action="#">
                                            <input type="text" class="li-search-field" placeholder="search here">
                                            <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="li-blog-sidebar pt-25">
                                    <h4 class="li-blog-sidebar-title">Categories</h4>
                                    <ul class="li-blog-archive">
                                        <li><a href="#">Laptops (10)</a></li>
                                        <li><a href="#">TV & Audio (08)</a></li>
                                        <li><a href="#">reach (07)</a></li>
                                        <li><a href="#">Smartphone (14)</a></li>
                                        <li><a href="#">Cameras (10)</a></li>
                                        <li><a href="#">Headphone (06)</a></li>
                                    </ul>
                                </div>
                                <div class="li-blog-sidebar">
                                    <h4 class="li-blog-sidebar-title">Blog Archives</h4>
                                    <ul class="li-blog-archive">
                                        <li><a href="#">January (10)</a></li>
                                        <li><a href="#">February (08)</a></li>
                                        <li><a href="#">March (07)</a></li>
                                        <li><a href="#">April (14)</a></li>
                                        <li><a href="#">May (10)</a></li>
                                        <li><a href="#">June (06)</a></li>
                                    </ul>
                                </div>
                                <div class="li-blog-sidebar">
                                    <h4 class="li-blog-sidebar-title">Recent Post</h4>
                                    <div class="li-recent-post pb-30">
                                        <div class="li-recent-post-thumb">
                                            <a href="blog-details.html">
                                                <img class="img-full" src="{{ asset('/') }}fontend-style/images/product/small-size/3.jpg" alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="blog-details.html">First Blog Post</a></span>
                                            <span class="li-post-date">25.11.2018</span>
                                        </div>
                                    </div>
                                    <div class="li-recent-post pb-30">
                                        <div class="li-recent-post-thumb">
                                            <a href="blog-details.html">
                                                <img class="img-full" src="{{ asset('/') }}fontend-style/images/product/small-size/2.jpg" alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="blog-details.html">First Blog Post</a></span>
                                            <span class="li-post-date">25.11.2018</span>
                                        </div>
                                    </div>
                                    <div class="li-recent-post pb-30">
                                        <div class="li-recent-post-thumb">
                                            <a href="blog-details.html">
                                                <img class="img-full" src="{{ asset('/') }}fontend-style/images/product/small-size/5.jpg" alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="blog-details.html">First Blog Post</a></span>
                                            <span class="li-post-date">25.11.2018</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-blog-sidebar">
                                    <h4 class="li-blog-sidebar-title">Tags</h4>
                                    <ul class="li-blog-tags">
                                        <li><a href="#">Gaming</a></li>
                                        <li><a href="#">Chromebook</a></li>
                                        <li><a href="#">Refurbished</a></li>
                                        <li><a href="#">Touchscreen</a></li>
                                        <li><a href="#">Ultrabooks</a></li>
                                        <li><a href="#">Sound Cards</a></li>  
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Blog Sidebar Area End Here -->
                        <!-- Begin Li's Main Content Area -->
                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="row li-main-content">
                                <div class="col-lg-12">
                                    <div class="li-blog-single-item pb-30">
                                        <div class="li-blog-banner">
                                            <a href="blog-details.html"><img class="img-full" src="{{ asset('/') }}fontend-style/images/blog-banner/bg-banner.jpg" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="#">The Biggest Collection For Digital Product</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>
                                                </div>
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>
                                                <!-- Begin Blog Blockquote Area -->
                                                <div class="li-blog-blockquote">
                                                    <blockquote>
                                                        <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
                                                    </blockquote>
                                                </div>
                                                <!-- Blog Blockquote Area End Here -->
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum laborum in labore Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum laborum in labore rerum Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum laborum in labore rerum </p>
                                                <div class="li-tag-line">
                                                    <h4>tag:</h4>
                                                    <a href="#">Headphones</a>,
                                                    <a href="#">Video Games</a>,
                                                    <a href="#">Wireless Speakers</a>
                                                </div>
                                                <div class="li-blog-sharing text-center pt-30">
                                                    <h4>share this post:</h4>
                                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Begin Li's Blog Comment Section -->
                                    <div class="li-comment-section">
                                        <h3>03 comment</h3>
                                        <ul>
                                            <li>
                                                <div class="author-avatar pt-15">
                                                    <img src="{{ asset('/') }}fontend-style/images/product-details/user.png" alt="User">
                                                </div>
                                                <div class="comment-body pl-15">
                                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                            <li class="comment-children">
                                                <div class="author-avatar pt-15">
                                                    <img src="{{ asset('/') }}fontend-style/images/product-details/admin.png" alt="Admin">
                                                </div>
                                                <div class="comment-body pl-15">
                                                        <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="author-avatar pt-15">
                                                    <img src="{{ asset('/') }}fontend-style/images/product-details/admin.png" alt="Admin">
                                                </div>
                                                <div class="comment-body pl-15">
                                                    <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                                    <h5 class="comment-author pt-15">admin</h5>
                                                    <div class="comment-post-date">
                                                        20 nov, 2018 at 9:30pm
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Li's Blog Comment Section End Here -->
                                    <!-- Begin Blog comment Box Area -->
                                    <div class="li-blog-comment-wrapper">
                                        <h3>leave a reply</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form action="#">
                                            <div class="comment-post-box">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label>comment</label>
                                                        <textarea name="commnet" placeholder="Write a comment"></textarea>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                        <label>Name</label>
                                                        <input type="text" class="coment-field" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                        <label>Email</label>
                                                        <input type="text" class="coment-field" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20">
                                                        <label>Website</label>
                                                        <input type="text" class="coment-field" placeholder="Website">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                                            <input class="li-btn-2" type="submit" name="submit" value="post comment">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Blog comment Box Area End Here -->
                                </div>
                            </div>
                        </div>
                        <!-- Li's Main Content Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Main Blog Page Area End Here -->
     @endsection