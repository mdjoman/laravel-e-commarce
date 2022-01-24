@extends('fontend.master')
@section('body')

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">Login Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form action="{{route('logincustomar')}}" method="POST">
                    @csrf
                    <div class="login-form">
                        @if($message = Session::get('message'))
                        <div class="alert alert-warning alert-dismissible text-center">
                            <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $message}}
                        </div>
                        @endif

                        <h4 class="login-title">Login</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" required name="email" placeholder="Email Address">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" required type="password" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                 <a href="{{route('Forgotten-pasward')}}"> Forgotten pasward?</a>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
                            <div class="col-md-12">
                                <a href="{{route('billing')}}" class="btn btn-secondary btn-lg btn-block mt-5">Shoping as a guest</a>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form action="{{ route('resistration')}}" method="POST">
                    @csrf
                    <div class="login-form">
                       
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name*</label>
                                <input class="mb-0" type="text" name="fname"value="{{ old('fname') }}" required placeholder="First Name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name*</label>
                                <input class="mb-0" type="text" name="lname"value="{{ old('lname') }}" required placeholder="Last Name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="text" name="email"value="{{ old('email') }}" required placeholder="Email Address*">
                                <span class="text-light mt-1 badge badge-danger text-wrap h4 ">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>

                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Mobile Number*</label>
                                <input class="mb-0" type="number" name="mobile" value="{{ old('mobile') }}" required placeholder="Last Name">
                            </div>

                            <div class="col-md-12 mb-20">
                                <label>Password*</label>
                                <input class="mb-0" type="password" name="Password"value="{{ old('Product_Price') }} required placeholder="Password">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login Content Area End Here -->

@endsection