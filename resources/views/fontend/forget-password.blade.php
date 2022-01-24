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
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-20 mt-20 ml-200">
                <!-- Login Form s-->
                <form action="{{route('update-pasward')}}" method="POST">
                    @csrf
                    <div class="login-form">
                        @if($message = Session::get('message'))
                        <div class="alert alert-warning alert-dismissible text-center">
                            <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $message}}
                        </div>
                        @endif

                        <h4 class="login-title text-center">Update Password</h4>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0" type="email" required name="email" placeholder="Email Address">
                            </div>
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0" required type="password" name="Password" placeholder="Password">
                            </div>
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                               
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Password</button>
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