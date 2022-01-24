@extends('fontend.master')
@section('body')
<?php
 use Illuminate\Support\Facades\Session;
 ?>
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
            @if($message = Session::get('message'))
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ $message}}
            </div>
            @endif
            <div class="col-lg-6 col-12">

                <form action="{{route('shipinginfo')}}" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3> <span> <a href="{{route('billing')}}" class="btn btn-success mr-5">Back to Change</a></span>Shiping/Billing Details</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" name="fname" value="{{$customar->fname}}" required type="text">
                                    <input disabled name="id" value="{{Session::get('customar_id')}}" required type="hidden">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input   placeholder="" name="lname" value="{{$customar->lname}}" required type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input  placeholder="" value="{{$customar->email}}" required name="email" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input  placeholder="017xxxxxxxxx" value="{{$customar->mobile}}" required name="mobile" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="country-select clearfix">
                                    <label>Division <span class="required">*</span></label>
                                    <select  required name="division" required  class="nice-select wide">
                                        <option data-display="{{$customar->division}}">{{$customar->division}}</option>
                                        <option value="Dhaka">Dhaka</option>
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
                                    <label>Postcode / Zip  <span class="required">*</span></label>
                                    <input   placeholder="Uttara(1230)" value="{{$customar->postcode}}" name="postcode" required type="text">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input  placeholder="Street address" value="{{$customar->address}}" name="address" required type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="" style="margin-top: 0px;">
                                    <label style="color: #333; font-size:16px">Choose your payment type <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="form-check" style="padding-left: 3.25rem;">
                            <input  style="margin-top: 0.1rem; margin-left: -2rem;height: 21px;
                                  width: 21px;" class="form-check-input" type="radio" name="payment" value="online" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="2">
                                Bank/Bikash/Other
                                </label>
                            </div>
                            <div class="form-check" style="    margin-left: 10px;padding-left: 2.25rem;">
                            <input style="margin-top: 0.1rem; margin-left: -2rem;height: 21px;
                                  width: 21px;" class="form-check-input" type="radio" value="cash" name="payment" id="flexRadioDefault1">
                          
                                <label class="form-check-label" for="1">
                                Cash On Delivery
                                </label>
                            </div>
                            <div class="col-md-12">
                                <div class="order-button-payment">
                                    <input value="Place order" type="submit">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

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

                                        $price =( $cartproduct->qty)*($cartproduct->price);
                                        ?>
                                        <td class="cart-product-total"><span class="amount">{{number_format($price )}} tk</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                    @foreach($cost as $key => $c)
                                        <th></th>
                                        <th>Delivery costs({{$customar->division}} )</th>
                                        <td><span class="amount">  <?php
                                        if( $customar->division == 'Dhaka' ){
                                            $cost = $c->dhaka;
                                        }
                                      
                                        else{
                                            $cost = $c->other;
                                        }
                                        
                                        ?>{{$cost}} tk</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                       
                                       <th></th>
                                       <th>Vat</th>
                                       <td><span class="amount">{{number_format (Session::get('vat'))}}  tk</span></td>
                                   </tr>
                                    <tr class="order-total">
                                    <th></th>
                                        <th>Order Total</th>
                                        <?php
                                        if( $customar->division == 'Dhaka' ){
                                            $total = Session::get('grand_total') + ($c->dhaka);
                                        }
                                      
                                        else{
                                            $total = Session::get('grand_total') + ($c->other); 
                                        }

                                        ?>
                                        <td><strong><span class="amount">{{number_format ($total)}} tk</span></strong></td>
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