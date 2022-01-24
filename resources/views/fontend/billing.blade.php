@extends('fontend.master')
@section('body')

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    @if($customar_id = Session::get('customar_id'))

                    @else
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input class="mb-0" type="email" required name="email" placeholder="Email Address">
                                </p>
                                <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input class="mb-0" required type="password" name="password" placeholder="Password">
                                </p>
                                <p class="form-row">
                                    <input class="btn btn-primary btn-lg btn-block mt-3" value="Login" type="submit">
                            </form>
                        </div>
                    </div>
                    @endif
                    <!--Accordion End-->

                </div>
            </div>
        </div>
        @if($message = Session::get('message'))
        <div class="alert alert-warning alert-dismissible text-center">
            <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $message}}
        </div>
        @endif
        @if($customar_id = Session::get('customar_id'))
        <div class="row">
            <div class="col-lg-6 col-12">
                <form action="{{route('billinginfo')}}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" name="fname" value="{{$customar->fname}}" required type="text">
                                    <input name="id" value="{{Session::get('customar_id')}}" required type="hidden">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" name="lname" value="{{$customar->lname}}" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" value="{{$customar->email}}" required name="email" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input placeholder="" value="{{$customar->mobile}}" required name="mobile" type="number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="country-select clearfix">
                                    <label>Division <span class="required">*</span></label>
                                    <select required name="division" required class="nice-select wide">
                                        <option data-display="Dhaka">Dhaka</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Sylhet">Sylhet</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="Uttara(1230)" name="postcode" required type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" name="address" required type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="order-button-payment">
                                    <input value="Submit" type="submit">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="{{route('billinginfo')}}" method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" name="fname" value="" required type="text">
                                        <input name="id" value="{{Session::get('customar_id')}}" required type="hidden">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" name="lname" value="" required type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" value="" required name="email" type="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input placeholder="" value="}" required name="mobile" type="number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="country-select clearfix">
                                        <label>Division <span class="required">*</span></label>
                                        <select required name="division" required class="nice-select wide">
                                            <option data-display="Dhaka">Dhaka</option>
                                            <option value="Barishal">Barishal</option>
                                            <option value="Chattogram">Chattogram</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="Uttara(1230)" name="postcode" required type="text">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" name="address" required type="text">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="order-button-payment">
                                        <input value="Submit" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Image</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartproducts as $key => $cartproduct)
                                    <tr class="cart_item">
                                        <td>
                                            <div style="max-width: 70px; max-height:60px;overflow:hidden">
                                                <img src="{{ asset($cartproduct->options->image)}}" class="img-fluid img-rounded" alt="">
                                            </div>
                                        </td>
                                        <td class="cart-product-name">{{substr($cartproduct->name,0 ,15)}} <strong class="product-quantity">X {{$cartproduct->qty}}</strong></td>
                                        <?php

                                        $price = ($cartproduct->qty) * ($cartproduct->price);
                                        ?>
                                        <td class="cart-product-total"><span class="amount">{{number_format($price )}} tk</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">

                                        <th></th>
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">{{number_format (Session::get('sub_total'))}} tk</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">

                                        <th></th>
                                        <th>Vat</th>
                                        <td><span class="amount">{{number_format (Session::get('vat'))}} tk</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th></th>
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">{{number_format (Session::get('grand_total'))}} tk</span></strong></td>

                                    </tr>
                                    <tr class="cart-subtotal">

                                        <th></th>
                                        @foreach($cost as $key => $c)
                                        <th>Delivery costs(Dhaka)</th>
                                        <td><strong><span class="amount">{{$c->dhaka}} tk</span></strong></td>

                                    </tr>
                                    <tr class="cart-subtotal">

                                        <th></th>
                                        <th>Delivery costs( Other)</th>
                                        <td><strong><span class="amount">{{$c->other}} tk</span></strong></td>
                                        @endforeach
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 style="cursor: pointer; font-size:16px; color:#343a40;">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Product delivery information.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 style="cursor: pointer; font-size:16px; color:#343a40;">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Delivery costs.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 style="cursor: pointer; font-size:16px; color:#343a40;">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Terms of return of Product.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
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
    <!--Checkout Area End-->
    @endsection