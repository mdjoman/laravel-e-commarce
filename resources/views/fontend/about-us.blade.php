@extends('fontend.master')
@section('body')
        <!-- 
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{route('/')}}">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!-- about wrapper start -->
          {!!$settingabout->About!!}
         
            <!-- team area wrapper end -->
       
@endsection
        <!-- 