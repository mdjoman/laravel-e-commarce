@extends('fontend.master')
@section('body')

<div class="row">
    <div class="col-sm-12 container">
        <div class="card card-body rounded-0">
            @if($message = Session::get('message'))
            <div class="alert alert-warning alert-dismissible text-center">
                <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
                {{ $message}}
            </div>
            @endif
            <h1 class="text-center text-gray-100 text-capitalize p-4">All cart product info in here.</h1>
            <div class="table-responsive ">
                <table class="table table-bordered ">
                    <tr>
                        <th>SL.NO</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Id</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    <?php

                    use Illuminate\Support\Facades\Session;

                    $sum = 0;
                    $qnty = 0;
                    ?>
                    @foreach($cartproducts as $key => $cartproduct)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration}}</td>
                        <td class="align-middle"><img src="{{ asset($cartproduct->options->image)}}" alt="" height="80px"></td>
                        <td class="align-middle">{{$cartproduct->name}}</td>
                        <td class="align-middle">{{$cartproduct->id}}</td>
                        <td class="align-middle">
                                                   <form action="{{route('update')}}" method="POST">
                                @csrf
                                <input class=" form-control border border-info" type="number" name="qty" value="{{$cartproduct->qty}}" max="{{$cartproduct->weight}}" min="1">
                                <input type="hidden" name="rowId" value="{{$cartproduct->rowId}}">
                                <button type="submit" class="btn btn-success form-control mt-2">Update</button>
                            </form>
                        <td class="align-middle">{{$cartproduct->price}}</td>
                        </td>
                        <td class="align-middle">{{$cartproduct->qty * $cartproduct->price}} </td>
                        <td class="align-middle text-center">
                            <a href="{{route('remove-cart', ['rowId' => $cartproduct->rowId])}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php $sum = $sum + ($cartproduct->qty * $cartproduct->price);
                    $qnty = $qnty + $cartproduct->qty;
                    Session::put('product_no', $qnty);
                    ?>

                    @endforeach

                </table>
                <table class="table table-bordered ">
                    <tr>

                        <th>Sub Total</th>
                        <td class=" mr-2" style="text-align: right;">{{number_format($sum)}}
                            <?php
                            Session::put('sub_total', $sum);
                            ?>

                        </td>
                    </tr>
                    <tr>

                        <th>Vat/ Taxs</th>
                        <td class=" mr-2" style="text-align: right;">
                            <?php
                            $vat = ($sum * 5) / 100;
                            echo number_format($vat);
                            Session::put('vat', $vat);
                            ?></td>
                    </tr>

                    <tr>
                         @foreach($cost as $key => $c)
                        <th>Shiping coust(Dhaka/other)</th>
                        <td class=" mr-2" style="text-align: right;">{{$c->dhaka}}/{{$c->other}}tk</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Grand Price</th>
                        <td class=" mr-2" style="text-align: right;">

                            {{number_format( $grandtotal = $sum + $vat)}}

                            <?php
                            Session::put('grand_total', $grandtotal);
                            ?>

                        </td>
                    </tr>

                </table>
            </div>
            <div class="mt-5">
                <a href="{{route('/')}}" class="btn btn-success ">Continue Shoping</a>
                <a href="{{route('login-resistration')}}" class="btn btn-success float-right ">Continue Shoping</a>
                
            </div>
        </div>
    </div>
</div>


@endsection
@section('ssl')
@endsection